<template>
  <section>
    <div class="container mt-5">
      <div class="page-header text-center">
        <h1>
          Ajout de bibliothèque
        </h1>
      </div>
      <div class="row justify-content-center mx-auto mt-5">
        <div class="col-6">
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
        <div class="col-6 align-self-center text-center">
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
            @click="createLibrary"
          >
            Valider nom et accès
          </button>
        </div>
      </div>
      <section v-if="valid">
        <div
          v-for="(keyImage, index) in JSON.parse(keyImages)"
          :key="index"
          class="row text-center"
        >
          <div class="col-6 mt-3">
            <img :src="keyImage.image">
          </div>
          <div class="col-6 mt-3 align-self-center">
            <div class="col-12">
              <upload-modal
                :library-id="libraryId"
                :key-hand="keyImage.key"
                :position="keyImage.position"
                :index="index"
              />
            </div>
          </div>
        </div>
      </section>
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
            libraryId: null
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
        async createLibrary() {
            try {
                const response = await window.axios.post('/api/library/store', {
                    name: this.libraryName,
                    public: this.publicCheck, 
                })
                this.valid = true
                this.libraryId = response.data.library_id
            } catch (error) {
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
