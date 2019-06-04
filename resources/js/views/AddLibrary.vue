<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div class="col-6">
          <div class="form-group">
            <label for="libraryName">Nom de la bibliothèque</label>
            <input
              id="libraryName"
              v-model="libraryName"
              type="text"
              class="form-control"
            >
          </div>
        </div>
        <div class="col-6 align-middle">
          <div class="form-check">
            <input
              id="privateCheck"
              class="form-check-input"
              type="checkbox"
              value=""
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
              value=""
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
              :library-name="libraryName"
              :index="index"
            />
          </div>
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
            libraryName: ''
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
