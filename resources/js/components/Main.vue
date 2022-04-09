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
                            :src="restaurant.photo"
                            :alt="restaurant.name"
                            class="card-img-top rounded img-restaurant"
                        />

                        <div>
                            <router-link
                                class="btn background-restaurant-name"
                                :to="{
                                    name: 'restaurant',
                                    params: { slug: restaurant.slug },
                                }"
                            >
                                <h4
                                    class="card-title text-center text-light restaurant-name"
                                >
                                    {{ restaurant.name }}
                                </h4>
                            </router-link>
                        </div>
                    </div>
                    <div class="bottom-card-restaurant">
                        <div class="card-body my_bg-orange rounded mt-1 d-flex justify-content-between align-items-center">
                            <div>
                                <lord-icon
                                    class="like-icon"
                                    src="https://cdn.lordicon.com/hrqwmuhr.json"
                                    trigger="loop"
                                    colors="primary:#121331,secondary:#38c172"
                                    style="width:40px;height:40px"
                                    delay="5000">
                                </lord-icon>
                                {{randomNumberLike()}}%
                            </div>
                            <div>
                                <lord-icon
                                    src="https://cdn.lordicon.com/poblyvkl.json"
                                    trigger="loop"
                                    colors="primary:#121331,secondary:#38c172"
                                    style="width:40px;height:40px"
                                    delay="5000">
                                </lord-icon>
                                {{randomNumberMin()}} - {{randomNumberMax()}} min.
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
        randomNumberMin(){
            return Math.floor(Math.random() * (15 - 10) + 10);
        },
        randomNumberMax(){
            return Math.floor(Math.random() * (45 - 20) + 20);
        },
        randomNumberLike(){
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
    &:hover {
        .img-restaurant{
            transform: scale(1.2);
        }
    }
    .img-restaurant {
        border-radius: 20px 20px 5px 5px !important;
        transition: transform .2s;
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
        .restaurant-name{
            text-shadow: 1px 1px #6f6f6f;
        }
    }
}
.bottom-card-restaurant{
    .my_bg-orange {
        border-radius: 5px 5px 20px 20px !important;
        background-color: #ffc245;
        div{
            font-size: 0.9rem;
        }
    }
}
.like-icon{
    transform: rotate(180deg);
    transform: scaleY(-1); 
}

@media (min-width:768px) and (max-width:991px)  {
    .my_bg-orange{
        div{
            font-size: 0.7rem;
            lord-icon{
                width: 25px !important;
                height: 25px !important;
            }
        }
    }
}
</style>
