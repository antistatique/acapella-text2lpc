<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      :data-target="`#imageUploadModal${index}`"
    >
      Uploader image correspondante
    </button>
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
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div
                  :id="`imageGiven${index}`"
                  :hidden="files === null"
                />
              </div>
            </div>
            <div class="row mt-3">
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
                >Choisissez l'image que vous désirez</label>
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
            >
              Annuler
            </button>
            <button
              type="button"
              class="btn btn-primary"
            >
              Uploader
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
    },
    data() {
        return {
            croppieInstance: null,
            preview: false,
            files: null
        }
    },
    mounted() {
        $(`#imageUploadModal${this.index}`).on('shown.bs.modal', () => {
            if (this.croppieInstance === null) {
                this.croppieInstance = new Croppie(document.querySelector(`#imageGiven${this.index}`), {
                    viewPort: { width: 500, height: 500 },
                    boundary: { width: 300, height: 300},
                    showZoomer: false,
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
                size: { width: 500, height: 500, type: 'square'},
                format: 'png',
                quality: 1
            })
            document.querySelector(`#preview${this.index}`).src = croppedImage
        }
    }
}
</script>

<style lang="scss" scoped>
    @import '~croppie/croppie.css';
</style>
