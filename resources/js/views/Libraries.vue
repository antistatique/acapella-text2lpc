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
          v-for="library of JSON.parse(libraries)"
          :key="library.id"
          class="col-md-4 col-sm-12"
        >
          <card-library :library="library" />
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
    mounted() {
        console.log(JSON.parse(this.libraries))
    }
}
</script>

<style>

</style>

