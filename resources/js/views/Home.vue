<template>
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center mx-auto">
                <div class="col-md-5 col-sm-10">
                    <textarea v-model="userSentence" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="row justify-content-center mt-3 text-center mx-auto">
                <div class="col-md-2 col-sm-10">
                    <button type="button" class="btn btn-primary" @click="getLPCKeys">Encoder</button>
                </div>
            </div>
        </div>
        <div class="container mt-5" v-if="images.length > 0">
            <carousel :items="mediaQuery.matches ? 1 : 2" :margin="10" :key="carouselUpdate">
                <img :src="image" v-for="(image, index) in images" :key="index">
            </carousel>
        </div>
    </section>
</template>

<script>
import Carousel from 'vue-owl-carousel'

export default {
    props: {
        sentence: String,
    },
    components: {
        Carousel,
    },
    data() {
        return {
            userSentence: '',
            images: [],
            mediaQuery: window.matchMedia('(max-width: 600px)'),
            carouselUpdate: 0
        }
    },
    methods: {
        async getLPCKeys() {
            const response = await window.axios.get(`http://localhost:8181/api/encode?sentence=${this.userSentence}`)
            this.images = response.data.images
            this.carouselUpdate === 0 ? this.carouselUpdate = 1 : this.carouselUpdate = 0
        }
    },
    async created() {
        if (this.sentence !== '') {
            this.userSentence = decodeURI(this.sentence)
            await this.getLPCKeys()
        }
    }
}
</script>
