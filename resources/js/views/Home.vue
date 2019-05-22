<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div class="col-md-5 col-sm-10">
          <textarea
            id="exampleFormControlTextarea1"
            v-model="userSentence"
            class="form-control"
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
      class="container mt-5"
    >
      <div class="row">
        <div class="col-md-2">
          Test
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
            :key="carouselUpdate"
          >
            <card-image
              v-for="(lpcKey, index) in lpcKeys"
              :key="index"
              :image="lpcKey.image"
              :phoneme="lpcKey.phoneme"
              :nb-image="index + 1"
            />
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
            carouselUpdate: 0
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
            this.carouselUpdate === 0 ? this.carouselUpdate = 1 : this.carouselUpdate = 0
        }
    }
}
</script>

