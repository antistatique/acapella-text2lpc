<template>
  <section>
    <div class="container mt-5">
      <div class="page-header text-center">
        <h1>
          Mes bibliothèques
        </h1>
      </div>
      <div class="row justify-content-center mx-auto mt-5">
        <div
          v-for="library of JSON.parse(libraries_)"
          :key="library.id"
          class="col-md-4 col-sm-12"
        >
          <card-library
            :library="library"
            @deleted="deleteLibrary"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import CardLibrary from '../components/CardLibrary'

export default {
    components: {
        CardLibrary
    },
    props: {
        libraries: {
            default: '',
            type: String
        }
    },
    data() {
        return {
            libraries_: this.libraries
        }
    },
    methods: {
        deleteLibrary(library) {
            this.libraries_ = this.libraries_.filter(library_ => library_.id !== library.id)
        }
    }
}
</script>

<style>

</style>

