<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div
          v-for="(keyImage, index) in JSON.parse(keyImages)"
          :key="index"
          class="col-md-6 col-sm-12 mt-3"
        >
          <img :src="keyImage.image">
          <div class="row justify-content-center mx-auto mt-3">
            <div class="col-12 text-center">
              <upload-modal :index="index" />
            </div>
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
    }
}
</script>

<style lang="scss" scoped>
    img {
        max-width: 100%;
    }
</style>
