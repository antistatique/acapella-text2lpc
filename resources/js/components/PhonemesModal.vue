<template>
  <div class="input-group">
    <input
      type="text"
      class="form-control"
      disabled
      :value="phonemes_"
    >
    <div class="input-group-append">
      <button
        type="button"
        class="btn btn-outline-primary"
        data-toggle="modal"
        data-target="#phonemesModal"
      >
        <template v-if="!loading">
          <font-awesome-icon icon="cog" />
          Modifier
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
                  autofocus
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
            <div class="row no-gutters row-footer">
              <div class="col-8 error-message">
                <template v-if="error">
                  {{ error }}
                </template>
              </div>
              <div class="col-1">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                  @click="reset"
                >
                  Annuler
                </button>
              </div>
              <div class="col-3">
                <button
                  type="button"
                  class="btn btn-primary"
                  @click="modify"
                >
                  Modifier le résultat
                </button>
              </div>
            </div>
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
    },
    selectedLibrary: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      phonemes_: this.phonemes,
      phonemesList_: phonemesList,
      caretPosition: {},
      error: null
    }
  },
  mounted() {
    document.querySelector('#phonemesInput').addEventListener('keydown', (e) => this.getCaretPosition(e))
    document.querySelector('#phonemesInput').addEventListener('mouseup', (e) => this.getCaretPosition(e))
    this.caretPosition = {
      start: document.querySelector('#phonemesInput').value.length,
      end: document.querySelector('#phonemesInput').value.length
    }
  },
  methods: {
    getCaretPosition(event) {
      this.caretPosition = {
        start: document.querySelector('#phonemesInput').selectionStart,
        end: document.querySelector('#phonemesInput').selectionEnd
      }

      if (event.key === 'Backspace') {
        this.caretPosition.start -= 1
        this.caretPosition.end -= 1
      }

      if (event.key === ' ') {
        this.caretPosition.start += 1
        this.caretPosition.end += 1
      }
    },
    addPhoneme(phoneme) {
      const value = document.querySelector('#phonemesInput').value
      document.querySelector('#phonemesInput').value = value.slice(0, this.caretPosition.start) + phoneme + value.slice(this.caretPosition.end)
      this.caretPosition = {
        start: this.caretPosition.start + 1,
        end: this.caretPosition.end + 1
      }
      this.$refs.phonemesInput.focus()
      document.querySelector('#phonemesInput').selectionStart = this.caretPosition.start
      document.querySelector('#phonemesInput').selectionEnd = this.caretPosition.end
    },
    reset() {
      document.querySelector('#phonemesInput').value = this.phonemes
    },
    async modify() {
      try {
        const response = await window.axios.get(`/api/encode?phonemes=${document.querySelector('#phonemesInput').value.split(' ').join('')}&library_id=${this.selectedLibrary}`)
        this.$emit('modified', response.data.lpcKeys, document.querySelector('#phonemesInput').value.split(' ').join(''))
        window.$('#phonemesModal').modal('hide')
      } catch (error) {
        this.error = err.response !== undefined ? err.response.data.message : err
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  textarea {
    font-size: 24px;
    letter-spacing: 3px;
  }

  .modal-footer {
    display: flex;
    justify-content: center;

    .row-footer {
      width: 100%;

      .error-message {
        vertical-align: middle;
        color: red;
      }
    }
  }
</style>