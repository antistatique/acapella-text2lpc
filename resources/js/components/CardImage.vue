<template>
  <div class="card">
    <img
      :src="image"
      class="card-img-top"
    >
    <div class="card-body">
      <div class="row">
        <div class="col-6 phoneme">
          {{ phoneme }}
        </div>
        <div class="col-6 number-paginator">
          {{ nbImage }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        image: {
            default: '',
            type: String
        },
        phoneme: {
            default: '',
            type: String
        },
        nbImage: {
            default: 0,
            type: Number
        }
    }
}
</script>

<style lang="scss" scoped>
    .card-body {
        padding: 0.3rem;

        .number-paginator {
          text-align: right;
        }
    }
</style>
