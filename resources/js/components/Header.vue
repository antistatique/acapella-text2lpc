<template>
    <header class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/">
                <img id="logo" src="https://a-capella.ch/sites/all/themes/acapella/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        Hello
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    @import '../../sass/_variables.scss';

    #logo {
        max-width: 140px;
    }

    header {
        border-bottom: 2px solid $acapella-purple
    }
</style>
