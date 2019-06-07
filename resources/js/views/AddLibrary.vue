<template>
  <section>
    <div class="container mt-5">
      <div class="page-header text-center">
        <h1>
          Ajout de bibliothèque
        </h1>
      </div>
      <div class="row justify-content-center mx-auto mt-5">
        <div class="col-md-4 col-sm-8 text-center">
          <div class="form-group">
            <label for="libraryName">Nom de la bibliothèque</label>
            <input
              id="libraryName"
              v-model="libraryName"
              type="text"
              class="form-control"
              :disabled="valid"
            >
          </div>
        </div>
        <div class="col-12 align-self-center text-center">
          <label>Visibilité de la bibliothèque</label>
          <div class="form-check">
            <input
              id="privateCheck"
              class="form-check-input"
              type="checkbox"
              :checked="!publicCheck"
              :disabled="valid"
              @change="changeAccess('private')"
            >
            <label
              class="form-check-label"
              for="privateCheck"
            >
              Privée
            </label>
          </div>
          <div class="form-check">
            <input
              id="publicCheck"
              class="form-check-input"
              type="checkbox"
              :checked="publicCheck"
              :disabled="valid"
              @change="changeAccess('public')"
            >
            <label
              class="form-check-label"
              for="publicCheck"
            >
              Publique
            </label>
          </div>
        </div>
      </div>
      <div
        v-if="!valid"
        class="row justify-content-center mx-auto mt-5"
      >
        <div class="col-12 text-center">
          <button
            type="button"
            class="btn btn-primary"
            :disabled="!validOptions"
            @click="createBaseLibrary"
          >
            <template v-if="!loading">
              Valider nom et accès
            </template>
            <div
              v-if="loading"
              class="spinner-border spinner-grow-sm"
              role="status"
            >
              <span class="sr-only">Loading...</span>
            </div>
          </button>
        </div>
      </div>
      <section v-if="valid">
        <div class="row text-center mt-5">
          <div class="col-4 offset-md-3 col-md-3">
            <h4>
              Clés LPC d'exemple
            </h4>
          </div>
          <div class="col-6 col-md-3">
            <h4>
              Images à importer
            </h4>
          </div>
        </div>
        <div
          v-for="(keyImage, index) in JSON.parse(keyImages)"
          :key="index"
          class="row text-center mt-3"
        >
          <div class="col-4 offset-md-3 col-md-3 align-self-center">
            <img :src="keyImage.image">
          </div>
          <div class="col-6 col-md-3 align-self-center">
            <div class="col-sm-12 col-md-12">
              <upload-modal
                :library-id="libraryId"
                :key-hand="keyImage.key"
                :position="keyImage.position"
                :index="index"
                @uploaded="addImagePath"
              />
            </div>
          </div>
        </div>
      </section>
      <div
        v-if="valid"
        class="row justify-content-center mx-auto mt-5"
      >
        <div class="col-12 text-center">
          <button
            type="button"
            class="btn btn-primary"
            :disabled="imagesInfos.length !== 40"
            @click="createLibrary"
          >
            <template v-if="!loading">
              Créer bibliothèque
            </template>
            <div
              v-if="loading"
              class="spinner-border spinner-grow-sm"
              role="status"
            >
              <span class="sr-only">Loading...</span>
            </div>
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import UploadModal from '../components/UploadModal'

export default {
    components: {
        UploadModal,
    },
    props: {
        keyImages: {
            default: '',
            type: String
        }
    },
    data() {
        return {
            libraryName: '',
            valid: false,
            publicCheck: false,
            libraryId: null,
            imagesInfos: [],
            loading: false
        }
    },
    computed: {
        validOptions() {
            return this.libraryName.length >= 2
        }
    },
    methods: {
        changeAccess(access) {
            if (access === 'private') {
                this.publicCheck = false
            } else if (access === 'public') {
                this.publicCheck = true
            }
        },
        async createBaseLibrary() {
            try {
              this.loading = true
                const response = await window.axios.post('/api/library/store', {
                    name: this.libraryName,
                    public: this.publicCheck, 
                })
                this.valid = true
                this.libraryId = response.data.library_id
                this.loading = false
            } catch (error) {
                this.loading = false
                console.log(error)
            }
        },
        addImagePath(imageInfo) {
            this.imagesInfos.push(imageInfo)
        },
        async createLibrary() {
            try {
              this.loading = true
              const response = await window.axios.post('/api/library/create', {
                libraryId: this.libraryId,
                imagesInfos: this.imagesInfos
              })
              this.loading = false
            } catch (error) {
              this.loading = false
              console.log(error)
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    img {
        width: 150px;
        height: auto;
        max-height: 100%;
        max-width: 100%;
    }
</style>
