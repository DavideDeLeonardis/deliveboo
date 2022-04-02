<template>
    <main class="my_bg-dark">
        <div class="container">
            <div class="row">
                <div class="col my-3">
                    <img
                        class="img-fluid"
                        src="../../images/home-background-hero-scaled.jpg"
                        alt=""
                    />
                </div>

                <div class="col-12 my-3">
                    <h4 class="text-white">Filtra per categorie</h4>
                    <div class="row">
                        <div
                            class="col-12 d-flex align-items-center justify-content-between"
                            style="flex-wrap: wrap"
                        >
                            <div
                                v-for="(category, index) in categories"
                                :key="`category-${index}`"
                                class="d-flex align-items-center justify-content-center mx-4 my-3 checkbox-category"
                            >
                                <input
                                    type="checkbox"
                                    name="categories[]"
                                    :value="category.name"
                                    v-model="form.categories"
                                    @change.prevent="getRestaurants(`${url}restaurants/search`, form)"
                                />
                                <label :for="category.name">{{
                                    category.name
                                }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 d-flex">
                            <input
                                class="btn btn-danger"
                                type="button"
                                value="Resetta filtri"
                                @click.prevent="resetFilters"
                            />
                        </div>
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
            categories: [],
            pages: {
                prev_page_url: null,
                next_page_url: null,
            },
            form: {
                categories: [],
            },
        };
    },
    created() {
        this.getCategories(`${this.url}categories`);
        setTimeout(() => {
            this.getRestaurants(`${this.url}restaurants`, null);
        }, 200);
    },
    methods: {
        getCategories(url) {
            Axios.get(url)
                .then((result) => {
                    this.categories = result.data.results.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getRestaurants(url, param) {
            this.loading = true;
            Axios.get(url, { params: param })
                .then((result) => {
                    this.restaurants = result.data.results.data;
                    this.pages.next_page_url =
                        result.data.results.next_page_url;
                    this.pages.prev_page_url =
                        result.data.results.prev_page_url;
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
        resetFilters() {
            this.form.categories = [];
            this.getRestaurants(`${this.url}restaurants`, null);
        },
    },
};
</script>

<style scoped>
.checkbox-category {
    width: 150px;
    height: 50px;
    font-size: 1.2em;
    background-color: #ffc108;
    border-radius: 10px;
}
</style>
