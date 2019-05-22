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
          <octicon
            name="arrow-left"
            scale="1.2"
          />
        </button>
      </div>
      <div class="col-4 dropup">
        <button
          id="dropdownSpeed"
          :disabled="!stopped"
          class="btn btn-secondary dropdown-toggle"
          type="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Vitesse
        </button>
        <div
          class="dropdown-menu"
          aria-labelledby="dropdownSpeed"
        >
          <a
            class="dropdown-item"
            @click="changeSpeed('slow')"
          >Lent</a>
          <a
            class="dropdown-item"
            @click="changeSpeed('normal')"
          >Normal</a>
          <a
            class="dropdown-item"
            @click="changeSpeed('fast')"
          >Rapide</a>
        </div>
      </div>
      <div class="col-4">
        <button
          v-if="!stopped"
          type="button"
          class="btn btn-secondary play-control"
          @click="stop"
        >
          <octicon
            name="primitive-square"
            scale="1.3"
          />
        </button>
        <button
          v-if="stopped"
          type="button"
          class="btn btn-secondary play-control"
          @click="start"
        >
          <octicon
            name="triangle-right"
            scale="1.3"
          />
        </button>
      </div>
      <div class="col-2">
        <button
          type="button"
          class="btn btn-secondary"
          @click="next"
        >
          <octicon
            name="arrow-right"
            scale="1.2"
          />
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
        changeSpeed(speed) {
            switch (speed) {
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
