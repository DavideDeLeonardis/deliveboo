<template>
    <div class="container-fluid">
        <div class="container">
            <div
                v-if="inputText != '' && restaurants && restaurants.length != 0"
            >
                <h4 class="text-center mb-2">
                    I risultati della tua ricerca per {{ inputText }}
                </h4>
            </div>
            <div v-if="restaurants && restaurants.length == 0">
                <h4 class="text-center mb-4">
                    Non ci sono risultati corrispondenti alla tua ricarca
                </h4>
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
                            :src="
                                restaurant.photo
                                    ? restaurant.photo
                                    : 'data:image/png;base64,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'
                            "
                            :alt="restaurant.name"
                            class="card-img-top rounded img-restaurant"
                        />

                        <h4
                            class="card-title text-center text-light restaurant-name"
                            style="color: #000000"
                        >
                            {{ restaurant.name }}
                        </h4>

                        <div>
                            <h4
                                class="card-title text-center text-light restaurant-name"
                            >
                                {{ restaurant.name }}
                            </h4>
                        </div>
                    </div>
                    <div class="bottom-card-restaurant">
                        <div
                            class="card-body my_bg-orange rounded mt-1 d-flex justify-content-between align-items-center"
                        >
                            <div>
                                <lord-icon
                                    class="like-icon"
                                    src="https://cdn.lordicon.com/hrqwmuhr.json"
                                    trigger="loop"
                                    colors="primary:#121331,secondary:#38c172"
                                    style="width: 40px; height: 40px"
                                    delay="5000"
                                >
                                </lord-icon>
                                {{ randomNumberLike() }}%
                            </div>
                            <div>
                                <lord-icon
                                    src="https://cdn.lordicon.com/poblyvkl.json"
                                    trigger="loop"
                                    colors="primary:#121331,secondary:#38c172"
                                    style="width: 40px; height: 40px"
                                    delay="5000"
                                >
                                </lord-icon>
                                {{ randomNumberMin() }} -
                                {{ randomNumberMax() }} min.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ChangePage :pages="pages" @changePage="changePage($event)" />
        </div>
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
        randomNumberMin() {
            return Math.floor(Math.random() * (15 - 10) + 10);
        },
        randomNumberMax() {
            return Math.floor(Math.random() * (45 - 20) + 20);
        },
        randomNumberLike() {
            return Math.floor(Math.random() * (100 - 85) + 85);
        },
    },
};
</script>

<style lang="scss" scoped>
.card-restaurant {
    border: none;
    position: relative;
    overflow: hidden !important;
    border-radius: 20px 20px 5px 5px !important;
    &:hover {
        .img-restaurant {
            transform: scale(1.2);
        }
    }
    .img-restaurant {
        border-radius: 20px 20px 5px 5px !important;
        transition: transform 0.2s;
    }
    .background-restaurant-name {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px 20px 5px 5px !important;
        background-color: rgba(128, 128, 128, 0.5);
        width: 100%;
        height: 100%;
        &:hover {
            background-color: rgb(255, 193, 8, 0.1);
        }
        .restaurant-name {
            text-shadow: 1px 1px #6f6f6f;
        }
    }
}
.bottom-card-restaurant {
    .my_bg-orange {
        border-radius: 5px 5px 20px 20px !important;
        background-color: #ffc245;
        div {
            font-size: 0.9rem;
        }
    }
}
.like-icon {
    transform: rotate(180deg);
    transform: scaleY(-1);
}

@media (min-width: 768px) and (max-width: 991px) {
    .my_bg-orange {
        div {
            font-size: 0.7rem;
            lord-icon {
                width: 25px !important;
                height: 25px !important;
            }
        }
    }
}
</style>
