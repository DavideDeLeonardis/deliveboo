<template>
<main class="my_bg-dark">
    <div class="container">
        <div class="row">
            <div class="col my-3">
                <h3 class="text-white">Home - Ristoranti</h3>
            </div>
        </div>

        <Loading v-if="loading"/>

        <Main :restaurants="restaurants" />
    </div>
</main>
</template>

<script>
import Axios from "axios";

import Loading from "../components/Loading.vue";
import Main from "../components/Main.vue";

export default {
    name: "Home",
    components: {
        Loading,
        Main,
    },
    data() {
        return {
            loading: false,
            url: "http://127.0.0.1:8000/api/v1/",
            restaurants: null,
        };
    },
    created() {
        setTimeout(() => {
            this.getRestaurants(`${this.url}restaurants`);
        }, 1000);
    },
    methods: {
        getRestaurants(url) {
            this.loading = true;
            Axios.get(url)
                .then(result => {
                    this.restaurants = result.data.results;
                    this.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style></style>
