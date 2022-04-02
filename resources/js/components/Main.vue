<template>
    <div class="container mt-2">
        <div v-if="inputText != '' && restaurants.length != 0">
            <h4 class="text-white text-center mb-2">I risultati della tua ricerca per {{ inputText }}</h4>
        </div>
        <div v-if="restaurants.length == 0">
            <h4 class="text-white text-center mb-4">Non ci sono risultati corrispondenti alla tua ricarca</h4>
        </div>

        <ChangePage :pages="pages" @changePage="changePage($event)" />

        <div v-if="restaurants" class="row row-cols-1 row-cols-md-3 g-4">
            <div
                v-for="(restaurant, index) in restaurants"
                :key="`restaurant-${index}`"
                class="col mb-5"
            >
                <div class="card my_bg-dark">
                    <img
                        :src="restaurant.photo"
                        :alt="restaurant.name"
                        class="card-img-top rounded"
                    />

                    <div class="card-body my_bg-orange rounded mt-1">
                        <h5 class="card-title text-center">{{ restaurant.name }}</h5>
                    </div>

                    <router-link
                        class="btn my_bg-green mt-2"
                        :to="{ name: 'restaurant', params: { slug: restaurant.slug } }"
                        >View</router-link
                    >
                </div>
            </div>
        </div>

        <ChangePage :pages="pages" @changePage="changePage($event)" />
    </div>
</template>

<script>
import ChangePage from "./ChangePage.vue";

export default {
    name: "Main",
    components: {
        ChangePage,
    },
    props: {
        restaurants: {
            type: Array,
            default() {
                return [];
            },
        },
        pages: {
            type: Object,
            default() {
                return {};
            },
        },
        inputText: {
            type: String,
            default: "",
        },
    },
    methods: {
        changePage(varChangePage) {
            this.$emit("changePage", varChangePage);
        }
    },
};
</script>

<style lang="scss" scoped>
.my_bg-orange  {
    background-color: #d6833a;
}

.my_bg-green  {
    background-color: #198754;
}
</style>
