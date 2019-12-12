<template>
  <section>
    <div class="container mt-5">
      <div class="page-header text-center">
        <h1>
          Edition de la bibliothèque : {{ libraryName }}
        </h1>
      </div>
      <div class="row justify-content-center mx-auto mt-5">
        <div class="col-md-4 col-sm-8 text-center">
          <div class="form-group">
            <label for="libraryName">Nom de la bibliothèque</label>
            <input
              id="libraryName"
              v-model="library_.name"
              type="text"
              class="form-control"
            >
          </div>
        </div>
      </div>
      <div class="row text-center mt-5">
        <div class="col-4 offset-md-3 col-md-3">
          <h4>
            Clés LPC présentes
          </h4>
        </div>
        <div class="col-8 col-md-3">
          <h4>
            Nouvelles images
          </h4>
        </div>
      </div>
      <div
        v-for="(keyImage, index) of library_.keys"
        :key="index"
        class="row text-center mt-3"
      >
        <div class="col-4 offset-md-3 col-md-3 align-self-center">
          <img :src="keyImage.image">
        </div>
        <div class="col-8 col-md-3 align-self-center text-center">
          <div class="col-sm-12 col-md-12">
            <upload-modal
              :library-id="library_.id"
              :key-hand="keyImage.key"
              :position="keyImage.position"
              :index="index"
              @uploaded="addImagePath"
              @remove="removeImagePath"
            />
          </div>
        </div>
      </div>
      <div
        class="row justify-content-center mx-auto mt-5"
      >
        <div class="col-12 text-center">
          <a
            role="button"
            class="btn btn-secondary"
            :href="`/libraries`"
          >Annuler</a>
          <button
            type="button"
            class="btn btn-primary"
            @click="editLibrary"
          >
            <template v-if="!loading">
              Éditer bibliothèque
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
    UploadModal
  },
  props: {
    library: {
      default: '',
      type: String
    }
  },
  data() {
    return {
      library_: {},
      libraryName: JSON.parse(this.library).name,
      imagesInfos: [],
      loading: false
    }
  },
  created() {
    this.library_ = JSON.parse(this.library)
  },
  methods: {
    addImagePath(imageInfo) {
      this.imagesInfos.push(imageInfo)
    },
    removeImagePath(index) {
      this.imagesInfos = this.imagesInfos.filter(imageInfo => {
        return imageInfo.index !== index
      })
    },
    async editLibrary() {
      this.loading = true
      try {
        await window.axios.put('/api/library/update', {
          libraryId: this.library_.id,
          name: this.library_.name
        })
        await window.axios.put('/api/library/updateImages', {
          libraryId: this.library_.id,
          imagesInfos: this.imagesInfos
        })
        this.loading = false
      } catch (error) {
        this.loading = false
        console.log(error)
      }
    },
  }
}
</script>

<style scoped>
  img {
      width: 150px;
      height: auto;
      max-height: 100%;
      max-width: 100%;
  }
</style>