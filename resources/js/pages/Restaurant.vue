<template>
    <div class="my_bg-dark">
        <div v-if="user" class="container-fluid">
            <h1 class="bg-warning rounded">{{ user.name }}</h1>
            <div class="row">
                <div class="col-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div v-for="(dish, index) in dishes" :key="index" class="col">
                            <div class="dish_card">
                                <div>
                                    <img src="../../images/1647950091675.png" alt="image" />
                                    <h4 class="">{{ dish.name }}</h4>
                                    <span class="prezzo">
                                        &euro; {{ dish.price.toFixed(2) }}</span>
                                    <div class="info">
                                        <dd class="show_plate_info_logo" @click="ShowInfo(dish)">
                                            <i class="fas fa-info-circle"></i>
                                        </dd>
                                    </div>
                                </div>
                                <button
                                    class="d-flex justify-content-center align-items-center button is-success"
                                    @click="addItem(dish)"
                                >
                                <div class="info">
                                    <dd
                                        class="show_plate_info_logo"
                                        @click="ShowInfo(dish)"
                                    >
                                        <i class="fas fa-info-circle"></i>
                                    </dd>
                                </div>
                            </div>
                            <button
                                class="d-flex justify-content-center align-items-center button is-success"
                                @click="addItem(dish)"
                            >
                                <i class="fas fa-plus"></i>
                            </button>
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
.my_bg-orange {
    background-color: #d6833a;
}

.my_bg-green {
    background-color: #198754;
}
.my_bg-dark {
    background-color: #121212;
}

.dish_card {
        margin: 15px;
        min-height: 230px;
        width: 360px;
        z-index: 9;
        border-radius: 10px;
        box-shadow: 0 0 10px #dddddd;
        border-color: transparent;
        position: relative;
        img {
            height: 120px;
            width: 360px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
        }
    }
    button:hover {
        transform: scale(1.1);
        background-color: #198754;
    }
    .info {
        i {
            position: absolute;
            top: 5px;
            left: 5px;
            font-size: 28px;
            color: #d6833a;
            background-color: white;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            place-content: center;
            place-items: center;
        }
    }

#dish_info_pop_up {
    position: fixed;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    box-shadow: 0 0 20px black;
    outline: 0;
    min-height: 500px;
    width: 700px;
    padding-bottom: 15px;
    z-index: 10;
    border-radius: 10px;
    border-color: transparent;
    text-align: center;

    .close {
        i {
            position: absolute;
            top: 5px;
            left: 5px;
            font-size: 28px;
            color: #d6833a;
            background-color: white;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            place-content: center;
            place-items: center;
        }
    }

    img {
        height: 345px;
        width: 700px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover;
    }

    h4 {
        font-size: 28px;
        margin-top: 15px;
        font-weight: 700;
    }

    .show_plate_info {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        color: transparent;
        background-color: transparent;
        border-color: transparent;
        cursor: pointer;
        outline: 0;
    }
}
</style>
