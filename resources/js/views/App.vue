<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
import Header from "../components/Header.vue";

export default {
    name: "App",
    components: {
        Header,
    },
};
</script>

<style lang="scss">
@import "~bootstrap/scss/bootstrap";
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@700;800&display=swap");
* {
    font-family: "Nunito", sans-serif;
}
</style>
