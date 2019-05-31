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
                v-validate.initial="'required|min:2'"
                name="name"
                type="text"
                class="form-control"
                :class="{ 'is-valid': !errors.first('name'), 'is-invalid': errors.first('name') }"
                aria-describedby="nameHelp"
              >
              <small
                v-if="!nameError"
                id="nameHelp"
                class="form-text text-muted"
              >
                Saisissez votre nom d'utilisateur. (au moins 2 caractères)
              </small>
              <small
                v-else
                id="nameHelp"
                class="form-text validation-error"
              >
                {{ nameError }}
              </small>
            </div>
            <div class="form-group">
              <label for="passwordInput">Mot de passe</label>
              <input
                id="passwordInput"
                v-validate.initial="'required|min:6'"
                name="password"
                type="password"
                class="form-control"
                :class="{ 'is-valid': !errors.first('password'), 'is-invalid': errors.first('password') }"
                aria-describedby="passwordHelp"
              >
              <small
                v-if="!passwordError"
                id="passwordHelp"
                class="form-text text-muted"
              >
                Saisissez votre mot de passe. (au moins 6 caractères)
              </small>
              <small
                v-else
                id="passwordHelp"
                class="form-text validation-error"
              >
                {{ passwordError }}
              </small>
            </div>
            <div class="form-group">
              <button
                :disabled="errors.any()"
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
    props: {
        nameError: {
            default: null,
            type: String,
        },
        passwordError: {
            default: null,
            type: String,
        },
    },
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>

<style lang="scss" scoped>
    .validation-error {
        color: red;
    }

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
