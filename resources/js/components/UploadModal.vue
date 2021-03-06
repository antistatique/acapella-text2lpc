<template>
  <div>
    <button
      v-if="!uploaded"
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      :data-target="`#imageUploadModal${index}`"
    >
      Uploader image
    </button>
    <template v-else>
      <div class="row text-center">
        <div class="col-9">
          <img
            id="uploadedResult"
            :src="croppedImage"
          >
        </div>
        <div class="col-2 align-self-center">
          <button
            type="button"
            class="btn btn-danger"
            @click="removeUpload"
          >
            <font-awesome-icon icon="times" />
          </button>
        </div>
      </div>
    </template>
    <div
      :id="`imageUploadModal${index}`"
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Upload d'image
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="reset"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <input
                  :id="`fileInput${index}`"
                  type="file"
                  accept="image/*"
                  hidden
                  @change="getImage"
                >
                <label
                  class="btn btn-primary"
                  :for="`fileInput${index}`"
                ><template v-if="files === null">Choisissez l'image que vous désirez</template><template v-else>Remplacer l'image</template></label>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <div
                  :id="`imageGiven${index}`"
                  :hidden="files === null"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <img
                  :id="`preview${index}`"
                  style="width: 300px; height: 300px;"
                  :hidden="files === null"
                >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="reset"
            >
              Annuler
            </button>
            <button
              type="button"
              class="btn btn-primary"
              :disabled="croppedImage === null"
              @click="upload"
            >
              <template v-if="!loading">
                Uploader
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
    </div>
  </div>
</template>

<script>
import Croppie from 'croppie'

export default {
    props: {
        index: {
            default: 1,
            type: Number
        },
        libraryId: {
            default: null,
            type: Number
        },
        position: {
            default: '',
            type: String
        },
        keyHand: {
            default: '',
            type: String
        }
    },
    data() {
        return {
            croppieInstance: null,
            preview: false,
            files: null,
            croppedImage: null,
            uploaded: false,
            uploadedImagePath: null,
            loading: false
        }
    },
    mounted() {
        $(`#imageUploadModal${this.index}`).on('shown.bs.modal', () => {
            if (this.croppieInstance === null) {
                this.croppieInstance = new Croppie(document.querySelector(`#imageGiven${this.index}`), {
                    viewPort: { width: 500, height: 500 },
                    boundary: { width: 300, height: 300},
                    showZoomer: true,
                })

                document.querySelector(`#imageGiven${this.index}`).addEventListener('update', () => { this.previewImage() })
            }
        })
    },
    methods: {
        getImage(event) {
            const fileReader = new FileReader()
            this.files = event.target.files

            fileReader.onload = () => {
                this.croppieInstance.bind({
                    url: fileReader.result
                })
            }

            fileReader.readAsDataURL(this.files[0])
        },
        async previewImage() {
            this.preview = true
            const croppedImage = await this.croppieInstance.result({
                type: 'canvas',
                size: { width: 1000, height: 1000, type: 'square'},
                format: 'png',
                quality: 1
            })
            document.querySelector(`#preview${this.index}`).src = croppedImage
            this.croppedImage = croppedImage
        },
        async upload() {
            try {
                this.loading = true
                const response = await window.axios.post('/api/upload_image', { 
                    image: this.croppedImage,
                    libraryId: this.libraryId,
                    key: this.keyHand,
                    position: this.position
                })
                this.uploadedImagePath = response.data.imagePath
                this.$emit('uploaded', {
                    index: this.index,
                    key: this.keyHand,
                    position: this.position,
                    imagePath: response.data.imagePath,
                })
                this.loading = false
                $("[data-dismiss=modal]").trigger({ type: "click" });
                this.uploaded = true
            } catch (error) {
                this.loading = false
                console.log(error)
            }
        },
        removeUpload() {
            this.$emit('remove', this.index)
            this.uploaded = false
            this.croppedImage = null
        },
        reset() {
            this.preview = false
            this.files = null
        }
    }
}
</script>

<style lang="scss" scoped>
    @import '~croppie/croppie.css';

    img {
        width: 150px;
        height: auto;
        max-height: 100%;
        max-width: 100%;
    }
</style>
