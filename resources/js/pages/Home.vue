<template>
    <main class="my_bg-dark">
        <div class="container">
            <div class="row">
                <div class="col my-3">
                    <h3 class="text-white">Home - Ristoranti</h3>
                </div>
            </div>

            <Loading v-if="loading" />

            <Main
                v-else
                :restaurants="restaurants"
                :pages="pages"
                @changePage="changePage($event)"
            />
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
            pages: {
                prev_page_url: null,
                next_page_url: null,
            },
        };
    },
    created() {
        this.loading = true;
        setTimeout(() => {
            this.getRestaurants(`${this.url}restaurants`);
        }, 200);
    },
    methods: {
        getRestaurants(url) {
            this.loading = true;
            Axios.get(url)
                .then((result) => {
                    this.restaurants = result.data.results.data;
                    this.pages.next_page_url = result.data.results.next_page_url;
                    this.pages.prev_page_url = result.data.results.prev_page_url;
                    this.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        changePage(varChangePage) {
            if (this.pages[varChangePage]) {
                this.getRestaurants(this.pages[varChangePage]);
            }
        },
    },
};
</script>

<style></style>
