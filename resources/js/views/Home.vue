<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div class="col-12 description text-center">
          <p>Introduire un mot ou une phrase et cliquer sur « Encoder » pour consulter le code LPC correspondant !</p>
          <a
            role="button"
            class="btn btn-link"
            href="https://a-capella.ch/le-lpc-quest-ce-que-cest"
            target="_blank"
          >En savoir plus</a>
        </div>
      </div>
      <div class="row justify-content-center mx-auto mt-4">
        <div class="col-md-5 col-sm-10">
          <label
            for="sentence"
            class="sentence-label"
          >Phrase à encoder</label>
          <textarea
            v-model="userSentence"
            name="sentence"
            class="form-control sentence"
            rows="3"
            placeholder="Saisissez votre phrase"
          />
          <select
            v-model="selectedLibrary"
            class="custom-select"
          >
            <option
              v-for="library in JSON.parse(libraries)"
              :key="library.id"
              :value="library.id"
            >
              <template v-if="library.public === 1">
                Bibliothèque : {{ library.name }}
              </template>
              <template v-else>
                Bibliothèque : {{ library.name }} (privée)
              </template>
            </option>
          </select>
        </div>
      </div>
      <div class="row justify-content-center mt-3 text-center mx-auto">
        <div class="col-md-2 col-sm-10">
          <button
            :disabled="disableEncodeButton"
            type="button"
            class="btn btn-primary"
            style="font-weight: bold;"
            @click="getLPCKeys"
          >
            <template v-if="!loading">
              Encoder
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
    <div
      v-if="lpcKeys.length > 0"
      class="container-fluid mt-5 options-container"
    >
      <div class="row justify-content-center text-center">
        <div class="col-7 col-md-6 my-auto">
          <div class="form-check">
            <input
              id="phonemesCheckbox"
              class="form-check-input"
              type="checkbox"
              :checked="phonemeCheck"
              @change="checkPhoneme"
            >
            <label
              class="form-check-label"
              for="phonemesCheckbox"
            >Phonèmes</label>
          </div>
          <div class="form-check">
            <input
              id="phoneticsCheckbox"
              class="form-check-input"
              type="checkbox"
              :checked="phoneticCheck"
              @change="checkPhonetic"
            >
            <label
              class="form-check-label"
              for="phoneticsCheckbox"
            >Conversion orthographique</label>
          </div>
        </div>
        <div class="col-5 col-md-6 my-auto">
          Vue : <button
            type="button"
            class="btn view-btn view-btn-active view-carousel"
            disabled
            @click="changeView('carousel')"
          >
            <font-awesome-icon icon="stop" />
          </button>
          <button
            type="button"
            class="btn view-btn view-grid"
            @click="changeView('grid')"
          >
            <font-awesome-icon icon="grip-horizontal" />
          </button>
        </div>
      </div>
    </div>
    <div
      v-if="lpcKeys.length > 0 && view === 'carousel'"
      class="container mt-5"
    >
      <div class="row justify-content-center mt-3 text-center mx-auto">
        <div class="col-md-4 col-sm-12">
          <phonemes-modal
            :phonemes="getAllPhonemes"
            :loading="loading"
            @modified="checkModified"
          />
        </div>
      </div>
      <div class="row justify-content-center text-center mx-auto mt-4">
        <div
          class="col-md-6"
        >
          <carousel
            v-if="phonemeCheck || phoneticCheck"
            :key="carouselPhonemeUpdate"
          >
            <card-image
              v-for="(lpcKey, index) in lpcKeys"
              :key="index"
              :image="lpcKey.image"
              :phoneme="lpcKey.phoneme"
              :phonetic="lpcKey.phonetic"
              :phoneme-check="phonemeCheck"
              :phonetic-check="phoneticCheck"
              :nb-image="index + 1"
            />
          </carousel>
          <carousel
            v-else
            :key="carouselUpdate"
          >
            <img
              v-for="(lpcKey, index) in lpcKeys"
              :key="index"
              :src="lpcKey.image"
            >
          </carousel>
        </div>
      </div>
    </div>
    <div
      v-if="lpcKeys.length > 0 && view === 'grid'"
      class="container-fluid mt-5"
    >
      <div class="row justify-content-center mt-3 text-center mx-auto">
        <div class="col-md-4 col-sm-12">
          <phonemes-modal
            :phonemes="getAllPhonemes"
            :loading="loading"
            @modified="checkModified"
          />
        </div>
      </div>
      <div class="row justify-content-center text-center mx-auto mt-4">
        <div
          v-for="(lpcKey, index) in lpcKeys"
          :key="index"
          class="col-md-3 col-sm-12 mt-2"
        >
          <card-image
            v-if="phonemeCheck || phoneticCheck"
            :image="lpcKey.image"
            :phoneme="lpcKey.phoneme"
            :phonetic="lpcKey.phonetic"
            :phoneme-check="phonemeCheck"
            :phonetic-check="phoneticCheck"
            :nb-image="index + 1"
          />
          <img
            v-if="!phonemeCheck && !phoneticCheck"
            :src="lpcKey.image"
            class="grid-image"
          >
        </div>
      </div>
    </div>
    <div
      v-if="lpcKeys.length > 0"
      class="container mt-5"
    >
      <div class="row justify-content-center text-center mx-auto">
        <a
          role="button"
          class="btn btn-primary"
          :href="`/print?sentence=${printSentence}&library_id=${selectedLibrary}`"
          target="_blank"
        >Imprimer</a>
      </div>
    </div>
    <div
      v-if="error"
      class="container mt-5"
    >
      <div
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
      >
        {{ error }}
        <button
          type="button"
          class="close"
          data-dismiss="alert"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import Carousel from '../components/Carousel'
import CardImage from '../components/CardImage'
import PhonemesModal from '../components/PhonemesModal'

export default {
    components: {
        Carousel,
        CardImage,
        PhonemesModal
    },
    props: {
        sentence: {
          default: '',
          type: String
        },
        phonemes: {
          default: '',
          type: String
        },
        libraries: {
          default: "",
          type: String
        },
    },
    data() {
        return {
            userSentence: '',
            selectedLibrary: 1,
            lpcKeys: [],
            mediaQuery: window.matchMedia('(max-width: 600px)'),
            carouselUpdate: 0,
            printSentence: '',
            carouselPhonemeUpdate: 2,
            phonemeCheck: true,
            phoneticCheck: false,
            view: 'carousel',
            loading: false,
            location: new URL(window.location.href),
            error: ""
        }
    },
    computed: {
      disableEncodeButton() {
        return this.userSentence === ''
      },
      getAllPhonemes() {
        return this.lpcKeys.map(lpcKey => lpcKey.phoneme).join('')
      }
    },
    async created() {
        if (this.sentence !== '') {
            this.userSentence = decodeURI(this.sentence)
            await this.getLPCKeys()
        } else if (this.phonemes !== '') {
          await this.checkModified(this.phonemes);
        }

        if (this.location.searchParams.has('view')) {
          if (this.location.searchParams.get('view') === 'carousel' || this.location.searchParams.get('view') === 'grid') {
            this.changeView(this.location.searchParams.get('view'))
          }
        }
        if (this.location.searchParams.has('displayPhonemes') && !this.location.searchParams.has('displayPhonetics')) {
          this.phoneticCheck = false
          if (this.location.searchParams.get('displayPhonemes') === 'true') {
            this.phonemeCheck = true
          } else if (this.location.searchParams.get('displayPhonemes') === 'false') {
            this.phonemeCheck = false
          }
        } else if (!this.location.searchParams.has('displayPhonemes') && this.location.searchParams.has('displayPhonetics')) {
          this.phonemeCheck = false
          if (this.location.searchParams.get('displayPhonetics') === 'true') {
            this.phoneticCheck = true
          } else if (this.location.searchParams.get('displayPhonetics') === 'false') {
            this.phoneticCheck = false
          }
        }
    },
    methods: {
        async getLPCKeys() {
          if (this.location.searchParams.has('phonemes')) {
            this.location.searchParams.delete('phonemes')
          }
          if (this.location.searchParams.has('sentence')) {
            this.location.searchParams.set('sentence', this.userSentence)
          } else {
            this.location.searchParams.append('sentence', this.userSentence)
          }
          try {
            this.error = ""
            this.loading = true
            const response = await window.axios.get(`/api/encode?sentence=${this.userSentence}&library_id=${this.selectedLibrary}`)
            this.lpcKeys = response.data.lpcKeys
            this.phonemeCheck || this.phoneticCheck ? (this.carouselPhonemeUpdate === 0 ? this.carouselPhonemeUpdate = 1 : this.carouselPhonemeUpdate = 0) : (this.carouselUpdate === 0 ? this.carouselUpdate = 1 : this.carouselUpdate = 0)
            this.loading = false
            this.printSentence = this.userSentence
            this.$ga(`Encodage de la phrase : ${this.userSentence}`, `/?sentence=${this.userSentence}`)
          } catch (err) {
            this.loading = false
            this.lpcKeys = []
            this.error = err.response !== undefined ? err.response.data.message : err
          }
          history.pushState({}, null, this.location.href)
        },
        changeView(view) {
          const carousel = document.querySelector('.view-carousel')
          const grid = document.querySelector('.view-grid')
          if (view === 'carousel') {
            if (!carousel.classList.contains('view-btn-active')) {
              carousel.classList.add('view-btn-active')
              carousel.disabled = true
              grid.classList.remove('view-btn-active')
              grid.disabled = false
            }
          } else if (view === 'grid') {
            if (!grid.classList.contains('view-btn-active')) {
              grid.classList.add('view-btn-active')
              grid.disabled = true
              carousel.classList.remove('view-btn-active')
              carousel.disabled = false
            }
          }
          if (this.location.searchParams.has('view')) {
            this.location.searchParams.set('view', view)
          } else {
            this.location.searchParams.append('view', view)
          }
          history.pushState({}, null, this.location.href)
          this.view = view
        },
        checkPhoneme() {
          this.phonemeCheck = !this.phonemeCheck
          this.phonemeCheck ? this.phoneticCheck = false : null
          this.location.searchParams.delete('displayPhonetics')
          if (this.location.searchParams.has('displayPhonemes')) {
            if (this.phonemeCheck) {
              this.location.searchParams.set('displayPhonemes', 'true')
            } else {
              this.location.searchParams.set('displayPhonemes', 'false')
            }
          } else {
            if (this.phonemeCheck) {
              this.location.searchParams.append('displayPhonemes', 'true')
            } else {
              this.location.searchParams.append('displayPhonemes', 'false')
            }
          }
          history.pushState({}, null, this.location.href)
        },
        checkPhonetic() {
          this.phoneticCheck = !this.phoneticCheck
          this.phoneticCheck ? this.phonemeCheck = false : null
          this.location.searchParams.delete('displayPhonemes')
          if (this.location.searchParams.has('displayPhonetics')) {
            if (this.phoneticCheck) {
              this.location.searchParams.set('displayPhonetics', 'true')
            } else {
              this.location.searchParams.set('displayPhonetics', 'false')
            }
          } else {
            if (this.phoneticCheck) {
              this.location.searchParams.append('displayPhonetics', 'true')
            } else {
              this.location.searchParams.append('displayPhonetics', 'false')
            }
          }
          history.pushState({}, null, this.location.href)
        },
        async checkModified(newPhonemes) {
          try {
            this.error = ""
            this.loading = true
            const response = await window.axios.get(`/api/encode-from-phonemes?phonemes=${newPhonemes}&library_id=${this.selectedLibrary}`)
            this.lpcKeys = response.data.lpcKeys
            this.phonemeCheck || this.phoneticCheck ? (this.carouselPhonemeUpdate === 0 ? this.carouselPhonemeUpdate = 1 : this.carouselPhonemeUpdate = 0) : (this.carouselUpdate === 0 ? this.carouselUpdate = 1 : this.carouselUpdate = 0)
            if (this.location.searchParams.has('sentence')) {
              this.location.searchParams.delete('sentence')
            }
            if (this.location.searchParams.has('phonemes')) {
              this.location.searchParams.set('phonemes', newPhonemes)
            } else {
              this.location.searchParams.append('phonemes', newPhonemes)
            }
            this.loading = false
            history.pushState({}, null, this.location.href)
          } catch (err) {
            this.loading = false
            this.error = err.response !== undefined ? err.response.data.message : err
          }
        }
    }
}
</script>

<style lang="scss" scoped>
  .description {
    font-weight: bold;
    font-size: 16px;
  }

  .sentence {
    font-size: 24px;
    font-weight: bold;

    &::placeholder {
      color: rgb(192, 191, 191);
    }
  }

  .sentence-label {
    font-size: 20px;
    font-weight: bold;
  }

  button > * {
    pointer-events: none;
  }

  .view-btn {
    &:hover {
      color: #f04894;
    }
  }

  .grid-image {
    max-width: 100%;
  }

  .view-btn-active {
    color: #f04894;
  }

  .options-container {
    background-color: rgb(226, 226, 226);
    height: 50px;

    @media (max-width: 600px) {
      height: 100px;
    }

    .row {
      height: 50px;

      @media (max-width: 600px) {
        height: 100px;
      }
    }
  }
</style>