<template>
    <div class="my_bg-dark">
        <div v-if="user" class="container-fluid">
            <h1 class="bg-warning rounded">{{ user.name }}</h1>
            <div class="row">
                <div class="col-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div
                            v-for="(dish, index) in dishes"
                            :key="index"
                            class="col"
                        >
                            <div class="card my_bg-dark">
                                <div
                                    class="card-body my_bg-orange rounded mt-1"
                                >
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="card-title text-center">
                                                {{ dish.name }}
                                            </h5>
                                        </li>
                                        <li>
                                            Description:
                                            <br />
                                            {{ dish.description }}
                                        </li>
                                        <li>
                                            Ingredients:
                                            <br />
                                            {{ dish.ingredients }}
                                        </li>
                                        <li>
                                            Prezzo:
                                            <br />
                                            {{ dish.price }}
                                        </li>
                                        <li>
                                            Disponibilità:
                                            <br />
                                            {{ dish.availability }}
                                        </li>
                                    </ul>
                                </div>
                                <button
                                    @click="getCart(dish)"
                                    class="btn my_bg-green mt-2"
                                >
                                    Aggiungi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <Cart :cart="cart" @removeItem="removeItem($event)" />
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
    methods: {
        getUser(url) {
            Axios.get(url)
                .then((result) => {
                    this.user = result.data.results.user;
                    this.dishes = result.data.results.dishes;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getCart(value) {
            this.cart.push(value);
            sessionStorage.setItem("cart", JSON.stringify(this.cart));
        },
        removeItem(value) {
            var index = this.cart.indexOf(value);
            if (index > -1) {
                this.cart.splice(index, 1);
                // this.cart.forEach((dish) => {
                //     sessionStorage.removeItem(dish);
                // });
            }
            return this.cart;
        },
    },
    created() {
        this.getUser("http://127.0.0.1:8000/api/v1/restaurants/" + this.slug);

        let myObj_deserialized = JSON.parse(sessionStorage.getItem("cart"));
        if (myObj_deserialized) {
            this.cart = myObj_deserialized;
        }

        let doc = window.document;
        let document_serialized = JSON.stringify(doc);
        sessionStorage.setItem("doc", document_serialized);
        let document_deserialized = JSON.parse(sessionStorage.getItem("doc"));
        if (document_deserialized) {
            if (document_deserialized != window.document) {
                sessionStorage.clear();
            }
        }
        // sessionStorage.removeItem("cart"); // pulisci carrello
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
</style>
