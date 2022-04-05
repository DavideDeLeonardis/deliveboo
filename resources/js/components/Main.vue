<template>
    <div class="container mt-2">
        <div v-if="inputText != '' && restaurants && restaurants.length != 0">
            <h4 class="text-center mb-2">I risultati della tua ricerca per {{ inputText }}</h4>
        </div>
        <div v-if="restaurants && restaurants.length == 0">
            <h4 class="text-center mb-4">Non ci sono risultati corrispondenti alla tua ricarca</h4>
        </div>

        <ChangePage :pages="pages" @changePage="changePage($event)" />

        <div v-if="restaurants" class="row row-cols-1 row-cols-md-3">
            <div
                v-for="(restaurant, index) in restaurants"
                :key="`restaurant-${index}`"
                v-show="
                    restaurant.name != 'Ristorante da Davide' &&
                    restaurant.name != 'Ristorante da Manuel' &&
                    restaurant.name != 'Ristorante da Semola' &&
                    restaurant.name != 'Ristorante da Christian' &&
                    restaurant.name != 'Ristorante da Dario'
                "
                class="col mb-5 container-card-restaurant"
            >
                <div class="card bg-light card-restaurant">
                    <img
                        :src="restaurant.photo"
                        :alt="restaurant.name"
                        class="card-img-top rounded img-restaurant"
                    />

                    <div>
                        <router-link
                            class="btn background-restaurant-name mt-2"
                            :to="{ name: 'restaurant', params: { slug: restaurant.slug } }"
                            >
                            <h4 class="card-title text-center text-light restaurant-name">{{ restaurant.name }}</h4>
                        </router-link>
                    </div>

                    <div class="card-body my_bg-orange rounded mt-1">
                        <h5 class="card-title text-center"></h5>
                    </div>

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
        },
    },
};
</script>

<style lang="scss" scoped>
.img-restaurant{
    border-radius: 20px 20px 5px 5px !important;
}
.card-restaurant{
    border: none;
    position: relative;
    .my_bg-orange  {
        border-radius: 5px 5px 20px 20px !important;
        background-color: #ffc108;
    }
    .background-restaurant-name  {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        background-color: rgba(128, 128, 128, 0.5);
        width: 100%;
    }
}
</style>
