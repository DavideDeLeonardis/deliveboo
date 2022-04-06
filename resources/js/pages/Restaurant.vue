<template>
    <div>
        <div v-if="user" class="container-fluid">
            <div class="row">
                <div class="col col-restaurant-name-top">
                    <h1 class="restaurant-name-top">{{ user.name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-9 container-card-dish-restaurant">
                    <div v-for="(dish, index) in dishes" :key="index" class="col">
                        <div class="card card-dish-restaurant" style="width: 18rem;">
                            <div class="card-body body-card-dish">
                                <h5 class="card-title title-dish-card">{{ dish.name }}</h5>
                                <div class="container-img-description">
                                    <img src="../../images/1647950091675.png" class="card-img-top" alt="image">
                                    <p class="description-dish">{{dish.description}}</p>
                                </div>
                                <div class="container-price-info">
                                    <p class="card-text">&euro; {{ dish.price.toFixed(2) }}</p>
                                </div>
                                <button
                                class="btn btn-primary button-plus-dish"
                                @click="addItem(dish)">
                                <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <Cart
                    :cart="cart"
                    @removeItem="removeItem($event)"
                    @subtractItem="subtractItem($event)"
                    @addItem="addItem($event)"
                    @clearCart="clearCart()"
                />
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";

import Cart from "../components/Cart";

export default {
    name: "Restaurant",
    props: ["slug"],
    components: {
        Cart,
    },
    data() {
        return {
            user: null,
            dishes: null,
            cart: [],
        };
    },
    beforeMount() {
        window.addEventListener("beforeunload", (event) => {
            if (this.cart == []) return event.preventDefault();
            // Chrome requires returnValue to be set.
            event.returnValue = "";
        });
    },
    beforeRouteLeave(next) {
        if (this.cart != []) {
            if (
                !window.confirm(
                    "Attenzione! Se lasci la pagina, il carrello verrà svuotato!"
                )
            ) {
                return;
            }
        }
        next();
    },
    beforeDestroy() {
        window.removeEventListener("beforeunload", this.preventNav);
    },
    methods: {
        preventNav(event) {
            if (this.cart == []) return;
            event.preventDefault();
            event.returnValue = "";
        },
        getUser(url) {
            Axios.get(url)
                .then((result) => {
                    this.user = result.data.results.user;
                    this.dishes = result.data.results.dishes;
                    this.$store.state["dishes"] = this.dishes;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        addItem(dish) {
            this.$store.dispatch("addItem", dish);
            this.cart = this.$store.state["cart"];
            localStorage.setItem("cart", JSON.stringify(this.cart));
        },
        subtractItem(dish) {
            this.$store.dispatch("subtractItem", dish);
            this.cart = this.$store.state["cart"];
            localStorage.setItem("cart", JSON.stringify(this.cart));
            console.log(localStorage);
            // console.log(this.$store.state)
            // console.log(dish.quantity)
        },
        removeItem(dish) {
            this.$store.dispatch("removeItem", dish);
            this.cart = this.$store.state["cart"];
            localStorage.setItem("cart", JSON.stringify(this.cart));
            console.log(localStorage);
            // console.log(this.$store.state)
        },
        clearCart() {
            this.$store.dispatch("clearCart");
            this.cart = this.$store.state["cart"];
            localStorage.clear;
        },
    },
    created() {
        console.log(this.$store.state);

        this.getUser("http://127.0.0.1:8000/api/v1/restaurants/" + this.slug);
        console.log(window.location);
        // localStorage.setItem("location", JSON.stringify(window.location));
        // let location_deserialized = JSON.parse(localStorage.getItem("location"));
        // console.log(location_deserialized)
        // if (location_deserialized) {
        //     if (location_deserialized != window.location) {
        //         console.log(window.location)
        //         localStorage.clear();
        //         console.log(localStorage)
        //     }
        // }

        let myObj_deserialized = JSON.parse(localStorage.getItem("cart"));
        if (myObj_deserialized) {
            this.cart = myObj_deserialized;
        }

        // // console.log("location: " + document.location + ", state: " + JSON.stringify(event.state));
        // // prompt('Stai lasciando la pagina')
        // // };
        window.onbeforeunload = function () {
            alert("prova");
        };
    },
};
</script>

<style lang="scss" scoped>
.col-restaurant-name-top{
    padding: 0;
    .restaurant-name-top{
        color: white;
        text-shadow: 3px 3px 3px rgb(223, 222, 222);
        padding: 2rem 0 0.5rem 1rem;
        background-image: linear-gradient(to top, #ffc245 , #ffffff);
        border-radius: 0 0 20px 20px !important;
        width: 100%;
    }
}
.container-card-dish-restaurant{
    max-width: 100%;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    .card-dish-restaurant{
        border: none;
        margin: 1rem;
        .body-card-dish{
            padding: 0;
            .title-dish-card{
                text-align: center;
                align-items: center;
                color: white;
                padding: 0.5rem;
                background-color: #ffc245;
                border-radius: 20px 20px 5px 5px !important;
                min-height: 4rem;
            }
            .container-img-description{
                position: relative;
                .description-dish{
                    display: none;
                    height: 100%;
                    width: 100%;
                    position: absolute;
                    top: 50%;
                    right: 50%;
                    transform: translate(50%, -50%);
                    padding: 1rem;
                    overflow-y: hidden;
                    color: white;
                    :hover > &{
                        display: block !important;
                        background-color: rgba(128, 128, 128, 0.8);
                    }
                }
            }
            .container-price-info{
                display: flex;
                justify-content: space-between;
                padding: 0 1rem;
            }
            .button-plus-dish{
                background-color: #38c172;
                border: none;
                border-radius: 5px 5px 20px 20px !important;
                width: 100%;
            }
        }
    }
}

@media all and (max-width: 885px) {
    .container-card-dish-restaurant{
        width: 60%;
        .card-dish-restaurant {
            width: 11rem !important;
            .title-dish-card{
                    min-height: 6rem !important;
                }
        }
    }
}

// @media all and (max-width: 733px) {
//     .container-card-dish-restaurant{
//         width: 100%;
//     }
// }
</style>
