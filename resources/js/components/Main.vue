<template>
    <div class="container">
        <ChangePage :pages="pages" @changePage="changePage($event)" />

        <div v-if="restaurants" class="row row-cols-1 row-cols-md-3 g-4">
            <div
                v-for="(restaurant, index) in restaurants"
                :key="`restaurant-${index}`"
                class="col"
            >
                <div class="card">
                    <img
                        :src="restaurant.photo"
                        :alt="restaurant.name"
                        class="card-img-top"
                    />

                    <div class="card-body">
                        <h5 class="card-title">{{ restaurant.name }}</h5>
                    </div>

                    <router-link
                        class="btn btn-info"
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
        }
    },
    methods: {
        changePage(varChangePage) {
            this.$emit("changePage", varChangePage);
        }
    },
};
</script>

<style></style>
