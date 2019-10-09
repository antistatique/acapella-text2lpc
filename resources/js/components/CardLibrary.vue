<template>
  <div class="card">
    <img
      :src="library.keys[0].image"
      class="card-img-top"
    >
    <div class="card-body">
      <div class="row text-center">
        <div class="col-12">
          {{ library.name }}
        </div>
      </div>
      <div class="row mt-4 text-center">
        <div class="col-6">
          <a
            role="button"
            class="btn btn-primary"
            :href="`/libraries/edit/${library.id}`"
          >
            Editer
          </a>
        </div>
        <div class="col-6">
          <button
            class="btn btn-danger"
            @click="deleteLibrary"
          >
            Supprimer
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    library: {
      default: {},
      type: Object
    }
  },
  methods: {
    async deleteLibrary() {
      try {
        await window.axios.delete(`/api/library/delete/${this.library.id}`);
      } catch (error) {
        console.log(error)
      }
    }
  }
}
</script>

<style>

</style>