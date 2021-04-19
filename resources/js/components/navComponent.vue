<template>

    <nav class="text-center" id="nav-menu">
        <span>
            <a id="logo-nav">
                <img src="img/logo.svg" id="logo-img">
            </a>
        </span>
        <span>
            <p id="nav-text">Teste - Programação Web</p>
        </span>
    </nav>

</template>

<script>
    export default {
        name: 'navComponente',
    }
</script>

<style>

    :root {
        --main-strong-blue: #08121e;
        --main-strong-red: #882d24;
    }

    #nav-menu {
        position: fixed;
        padding-left: 0;
        top: 0;
        left: 0;
        width: 100vw;
        height: 80px;
        z-index: 10;
        background-image: -webkit-linear-gradient(var(--main-strong-red), var(--light));
    }

    #nav-text {
        padding-top: 5px;
        color: var(--main-strong-blue);
        font-size: 25px;
    }

    #logo-nav {
        padding-right: 20px;
        alignment: left;
    }

    #logo-img {
        width: 20%;
        height: auto;
        padding: 1%;
        position: absolute;
        left: 0px;
    }

</style>
