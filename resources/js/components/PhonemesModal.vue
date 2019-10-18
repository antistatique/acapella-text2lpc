<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#phonemesModal"
    >
      <template v-if="!loading">
        Modifier le résultat
      </template>
      <div
        v-if="loading"
        class="spinner-border spinner-grow-sm"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
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
              @click="reset"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <textarea
                  id="phonemesInput"
                  ref="phonemesInput"
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
                  @click="addPhoneme(phoneme)"
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
              @click="reset"
            >
              Annuler
            </button>
            <button
              type="button"
              class="btn btn-primary"
              data-dismiss="modal"
              @click="modify"
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
    },
    loading: {
      Type: Boolean,
      default: false
    }
  },
  data() {
    return {
      phonemes_: this.phonemes,
      phonemesList_: phonemesList,
      caretPosition: {}
    }
  },
  mounted() {
    document.querySelector('#phonemesInput').addEventListener('keydown', this.getCaretPosition)
    document.querySelector('#phonemesInput').addEventListener('mouseup', this.getCaretPosition)
  },
  methods: {
    getCaretPosition() {
      this.caretPosition = {
        start: document.querySelector('#phonemesInput').selectionStart,
        end: document.querySelector('#phonemesInput').selectionEnd
      }
    },
    addPhoneme(phoneme) {
      const value = document.querySelector('#phonemesInput').value
      document.querySelector('#phonemesInput').value = value.slice(0, this.caretPosition.start) + phoneme + value.slice(this.caretPosition.end)
      this.caretPosition = {
        start: this.caretPosition.start + 1,
        end: this.caretPosition.end + 1
      }
    },
    reset() {
      document.querySelector('#phonemesInput').value = this.phonemes
    },
    modify() {
      this.$emit('modified', document.querySelector('#phonemesInput').value)
    }
  }
}
</script>