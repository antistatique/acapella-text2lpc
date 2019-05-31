<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div class="col-md-4 text-center">
          <a
            role="button"
            class="btn btn-primary"
            href="/loginOAuth"
          >Se connecter depuis a-capella.ch</a>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row justify-content-center mx-auto">
        <div class="col-md-6 col-sm-12">
          <form
            method="post"
            action="/login"
          >
            <input
              type="hidden"
              name="_token"
              :value="csrf"
            >
            <div class="form-group">
              <label for="nomInput">Nom</label>
              <input
                id="nomInput"
                name="name"
                type="text"
                class="form-control"
                aria-describedby="nameHelp"
              >
              <small
                id="nameHelp"
                class="form-text text-muted"
              >
                Saisissez votre nom d'utilisateur.
              </small>
            </div>
            <div class="form-group">
              <label for="passwordInput">Mot de passe</label>
              <input
                id="passwordInput"
                name="password"
                type="password"
                class="form-control"
                aria-describedby="passwordHelp"
              >
              <small
                id="passwordHelp"
                class="form-text text-muted"
              >
                Saisissez le mot de passe correspondant à votre nom d'utilisateur.
              </small>
            </div>
            <div class="form-group">
              <button
                type="submit"
                class="btn btn-primary"
              >
                Se connecter
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row justify-content-center mx-auto">
        <div class="col-md-3 text-center">
          <a
            class="btn btn-link"
            href="/register"
          >Pas de compte ? S'enregistrer ici</a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>

<style lang="scss" scoped>
    input {
        background-color: #f5f3f1;

        &:focus {
            background-color: #f5f3f1;
        }
    }

    a {
        font-weight: bold;
    }
</style>
