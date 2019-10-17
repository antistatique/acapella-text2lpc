<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#phonemesModal"
    >
      Modifier résultat (phonèmes)
    </button>
    <div
      id="phonemesModal"
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Modification des phonèmes
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
                <textarea
                  v-model="phonemes_"
                  class="form-control"
                  cols="30"
                  rows="5"
                />
              </div>
            </div>
            <div class="row no-gutters mt-1">
              <div
                v-for="(phoneme, index) in phonemesList_"
                :key="index"
                class="col-2 col-md-1 p-1"
              >
                <button
                  type="button"
                  class="btn btn-primary col-12"
                >
                  {{ phoneme }}
                </button>
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
              Modifier le résultat
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { phonemesList } from '../constants/phonemes'

export default {
  props: {
    phonemes: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      phonemes_: this.phonemes,
      phonemesList_: phonemesList
    }
  }
}
</script>