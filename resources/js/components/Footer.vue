<template>
  <footer class="mt-5">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-md-4 col-sm-12 align-self-center">
          <a :href="`mailto:support@antistatique.net?subject=Problème sur text2lpc.a-capella.ch&body=Reproduction : ${location}'`">Signaler un problème</a>
        </div>
        <div class="col-md-4 col-sm-12 align-self-center">
          Site réalisé par <a
            href="http://antistatique.net/"
            target="_blank"
          >Antistatique</a>
        </div>
        <div class="col-md-4 col-sm-12 align-self-center">
          <a href="https://a-capella.ch/">Fondation A-Capella</a>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      location: new URL(window.location.href)
    }
  }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables.scss';
    
    footer {
        background-color: $primary;
        color: white;

        .row {
          height: 50px;

          @media (max-width: 600px) {
            height: 100px;
          }
        }

        a {
            color: white;
            text-decoration: underline;

            &:hover {
                color: $secondary;
            }
        }
    }
</style>
