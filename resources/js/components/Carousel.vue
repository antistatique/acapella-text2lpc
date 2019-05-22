<template>
  <div>
    <div class="row">
      <div class="col-12">
        <div
          id="carousel"
          class="owl-carousel"
        >
          <slot />
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-2">
        <button
          type="button"
          class="btn btn-secondary"
          @click="previous"
        >
          <font-awesome-icon icon="arrow-left" />
        </button>
      </div>
      <div class="input-group col-8">
        <select
          :disabled="!stopped"
          class="custom-select"
          @change="changeSpeed"
        >
          <option value="slow">
            Lent
          </option>
          <option
            value="normal"
            selected
          >
            Normal
          </option>
          <option value="fast">
            Rapide
          </option>
        </select>
        <div class="input-group-append">
          <button
            v-if="!stopped"
            type="button"
            class="btn btn-secondary"
            @click="stop"
          >
            <font-awesome-icon icon="stop" />
          </button>
          <button
            v-if="stopped"
            type="button"
            class="btn btn-secondary"
            @click="start"
          >
            <font-awesome-icon icon="play" />
          </button>
        </div>
      </div>
      <div class="col-2">
        <button
          type="button"
          class="btn btn-secondary"
          @click="next"
        >
          <font-awesome-icon icon="arrow-right" />
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import 'owl.carousel/dist/assets/owl.carousel.css'
import 'owl.carousel'
import 'vue-octicon/icons/primitive-square'
import 'vue-octicon/icons/triangle-right'
import 'vue-octicon/icons/arrow-left'
import 'vue-octicon/icons/arrow-right'

export default {
    data() {
        return {
            owl: null,
            stopped: false,
            playSpeed: 2000
        }
    },
    mounted() {
        this.owl = $('#carousel').owlCarousel({
            items: 1,
            margin: 10,
            autoplay: true,
            dots: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: this.playSpeed,
            mouseDrag: false,
            touchDrag: false,
        })
    },
    methods: {
        stop() {
            this.owl.trigger('stop.owl.autoplay')
            this.stopped = true
        },

        start() {
            this.owl.trigger('play.owl.autoplay')
            this.stopped = false
        },
        previous() {
            this.owl.trigger('prev.owl.carousel')
        },
        next() {
            this.owl.trigger('next.owl.carousel')
        },
        changeSpeed(event) {
            switch (event.target.value) {
                case 'slow':
                    this.playSpeed = 3000
                    break
                case 'normal':
                    this.playSpeed = 2000
                    break
                case 'fast':
                    this.playSpeed = 1200
                    break
                default:
                    this.playSpeed = 2000
                    break
            }

            this.owl.data('owl.carousel').settings.autoplayTimeout = this.playSpeed
            this.owl.data('owl.carousel').options.autoplayTimeout = this.playSpeed
            this.owl.data('owl.carousel').settings.autoplay = false
            this.owl.data('owl.carousel').options.autoplay = false
            this.owl.trigger('refresh.owl.carousel')
        }
    }
}
</script>

<style lang="scss" scoped>
    .play-control {
        width: 50px;
    }
</style>
