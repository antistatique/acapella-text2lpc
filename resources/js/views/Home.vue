<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div class="col-md-5 col-sm-10">
          <textarea
            name="sentence"
            v-model="userSentence"
            class="form-control sentence"
            rows="3"
          />
        </div>
      </div>
      <div class="row justify-content-center mt-3 text-center mx-auto">
        <div class="col-md-2 col-sm-10">
          <button
            type="button"
            class="btn btn-primary"
            @click="getLPCKeys"
          >
            Encoder
          </button>
        </div>
      </div>
    </div>
    <div
      v-if="lpcKeys.length > 0"
      class="container-fluid mt-5 options-container"
    >
      <div class="row justify-content-center text-center">
        <div class="col-6 my-auto">
          <div class="form-check form-check-inline">
            <input
              id="phonemesCheckbox"
              class="form-check-input"
              type="checkbox"
              v-model="phonemeCheck"
            >
            <label
              class="form-check-label"
              for="phonemesCheckbox"
            >Phonèmes affichés sous l'image</label>
          </div>
        </div>
        <div class="col-6 my-auto">
          
        </div>
      </div>
    </div>
    <div
      v-if="lpcKeys.length > 0"
      class="container mt-5"
    >
      <div class="row justify-content-center text-center mx-auto">
        <div class="col-md-6">
          <carousel
            :key="carouselPhonemeUpdate"
            v-if="phonemeCheck"
          >
              <card-image
                v-for="(lpcKey, index) in lpcKeys"
                :key="index"
                :image="lpcKey.image"
                :phoneme="lpcKey.phoneme"
                :nb-image="index + 1"
              />
          </carousel>
          <carousel
            :key="carouselUpdate"
            v-if="!phonemeCheck"
          >
              <img v-for="(lpcKey, index) in lpcKeys" :key="index" :src="lpcKey.image">
          </carousel>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Carousel from '../components/Carousel'
import CardImage from '../components/CardImage'

export default {
    components: {
        Carousel,
        CardImage,
    },
    props: {
        sentence: {
          default: '',
          type: String
        }
    },
    data() {
        return {
            userSentence: '',
            lpcKeys: [],
            mediaQuery: window.matchMedia('(max-width: 600px)'),
            carouselUpdate: 0,
            carouselPhonemeUpdate: 0,
            phonemeCheck: true,
            layoutSwitch: true
        }
    },
    async created() {
        if (this.sentence !== '') {
            this.userSentence = decodeURI(this.sentence)
            await this.getLPCKeys()
        }
    },
    methods: {
        async getLPCKeys() {
            const response = await window.axios.get(`/api/encode?sentence=${this.userSentence}`)
            this.lpcKeys = response.data.lpcKeys
            this.phonemeCheck ? (this.carouselPhonemeUpdate === 0 ? this.carouselPhonemeUpdate = 1 : this.carouselPhonemeUpdate = 0) : (this.carouselUpdate === 0 ? this.carouselUpdate = 1 : this.carouselUpdate = 0)
        }
    }
}
</script>

<style lang="scss" scoped>
  .sentence {
    font-size: 24px;
    font-weight: bold;
  }

  .options-container {
    background-color: rgb(226, 226, 226);
    height: 50px;

    .row {
      height: 50px;
    }
  }
</style>



