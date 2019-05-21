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
      v-if="images.length > 0"
      class="container mt-5"
    >
      <div class="row">
        <div class="col-md-2">
          Test
        </div>
      </div>
    </div>
    <div
      v-if="images.length > 0"
      class="container mt-5"
    >
      <div class="row justify-content-center text-center mx-auto">
        <div class="col-md-6">
          <carousel
            :key="carouselUpdate"
          >
            <img
              v-for="(image, index) in images"
              :key="index"
              :src="`${image}`"
            >
          </carousel>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Carousel from '../components/Carousel'

export default {
    components: {
        Carousel,
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
            images: [],
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
            this.images = response.data.images
            this.carouselUpdate === 0 ? this.carouselUpdate = 1 : this.carouselUpdate = 0
        }
    }
}
</script>

