<template>
  <header class="container">
    <nav class="navbar navbar-expand-lg">
      <a
        class="navbar-brand"
        href="/"
      >
        <img
          id="logo"
          src="https://a-capella.ch/sites/all/themes/acapella/logo.png"
          alt=""
        >
      </a>
      <button
        class="navbar-toggler navbar-light"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>
      <div
        id="navbarSupportedContent"
        class="collapse navbar-collapse"
      >
        <ul class="navbar-nav ml-auto">
          <template v-if="!loggedin">
            <li class="nav-item">
              <a
                class="nav-link"
                href="/login"
              >Se connecter</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
              >S'enregistrer</a>
            </li>
          </template>
          <template v-else>
            <li class="nav-item dropdown">
              <a
                id="libraryDropdown"
                class="nav-link dropdown-toggle"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Bibliothèques
              </a>
              <div
                class="dropdown-menu"
                aria-labelledby="libraryDropdown"
              >
                <a
                  class="dropdown-item"
                  href="/library/create"
                >Créer une bibliothèque</a>
              </div>
            </li><li class="nav-item">
              <a
                class="nav-link"
                href="/logout"
              >Se déconnecter</a>
            </li>
          </template>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  props: {
    loggedin: {
      default: false,
      type: String,
    },
    username: {
      default: "",
      type: String,
    }
  }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables.scss';

    #logo {
        max-width: 140px;
    }

    .nav-link {
        color: $primary !important;

        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -moz-osx-font-smoothing: grayscale;
        position: relative;
        overflow: hidden;
        &:before {
            content: "";
            position: absolute;
            z-index: -1;
            left: 50%;
            right: 50%;
            bottom: 0;
            background: orange;
            height: 2px;
            -webkit-transition-property: left right;
            transition-property: left right;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }
        &:hover:before {
            left: 0;
            right: 0;
        }
    }
</style>
