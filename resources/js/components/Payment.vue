<template>
    <div class="container pt-5">
        <div v-if="!allDone" class="container-payment">
            <!-- Riepilogo ordine -->
            <div>
                <h1>Riepilogo Ordine</h1>
                <ul>
                    <li v-for="(dish, index) in cart" :key="index">
                        {{ dish.name }} X{{ dish.quantity }}, &euro;{{
                            dish.price * dish.quantity
                        }}
                    </li>
                    <li>
                        TOTALE:
                        {{
                            this.cart.reduce(
                                (total, dish) =>
                                    total + dish.price * dish.quantity,
                                0
                            )
                        }}
                        &euro;
                    </li>
                </ul>
            </div>
            <!-- Riepilogo ordine -->

            <!-- Form dati ordine -->
            <form @submit.prevent="sendForm">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input
                        type="text"
                        v-model="name"
                        maxlength="100"
                        class="form-control"
                        name="name"
                        id="name"
                        placeholder="Inserisci il tuo nome"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="lastname">Cognome</label>
                    <input
                        type="text"
                        v-model="lastname"
                        maxlength="100"
                        class="form-control"
                        name="lastname"
                        id="lastname"
                        placeholder="Inserisci il tuo cognome"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input
                        type="text"
                        v-model="address"
                        maxlength="100"
                        class="form-control"
                        name="address"
                        id="address"
                        placeholder="Inserisci il tuo indirizzo"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        v-model="email"
                        maxlength="100"
                        class="form-control"
                        name="email"
                        id="email"
                        placeholder="Inserisci la tua email"
                        required
                    />
                </div>
                <!-- Form dati ordine -->

                <v-braintree
                    authorization="sandbox_8h5ddqng_4sjx493rm6vt8q2c"
                    @success="onSuccess"
                    @error="onError"
                >
                    <template #button="slotProps">
                        <v-btn
                            id="v-btn"
                            ref="paymentBtnRef"
                            @click="slotProps.submit"
                        ></v-btn>
                    </template>
                </v-braintree>
                <div class="action">
                    <input
                        v-if="!show"
                        type="submit"
                        @click="beforeBuy()"
                        value="Paga"
                    />
                    <!-- <router-link
                        v-if="allDone"
                        to="/checkout"
                        class="btn btn-success"
                        >Vai al checkout</router-link
                    > -->
                </div>
            </form>
        </div>
        <div v-if="allDone" class="checkout">
            <Checkout />
        </div>
    </div>
</template>

<script>
import Axios from "axios";
import Checkout from "./Checkout.vue";
export default {
    name: "Payment",
    data() {
        return {
            name: "",
            lastname: "",
            address: "",
            email: "",
            allDone: false,
            show: false,
            cart: JSON.parse(window.localStorage.getItem("cart")),
        };
    },
    components: {
        Checkout,
    },
    props: {
        cart: {
            type: Array,
            default() {
                return JSON.parse(window.localStorage.getItem("cart"));
            },
        },
    },
    methods: {
        onSuccess(payload) {
            // payload.nonce = this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0)
            let nonce = payload.nonce;
            let amount = this.cart
                .reduce((total, dish) => total + dish.price * dish.quantity, 0)
                .toFixed(2);
            //axios call per riempire database e poi parte pagamento?
            Axios.post(
                "http://127.0.0.1:8000/api/order/make/payment?token=fake-valid-nonce&amount=" +
                    amount
            ).then((result) => {
                this.allDone = true;
                // console.log(result)
                this.sendForm();
            });
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },
        beforeBuy() {
            let my_btn = document.getElementById("v-btn");
            my_btn.click();
            this.show = true;
        },
        sendForm() {
            if (this.allDone) {
                let new_cart = [];
                this.cart.forEach((element) => {
                    // console.log(Object.values(element))
                    // console.log(JSON.stringify(element))
                    new_cart.push(JSON.stringify(element));
                });
                let amount = this.cart
                    .reduce(
                        (total, dish) => total + dish.price * dish.quantity,
                        0
                    )
                    .toFixed(2);

                Axios.post("/api/order/save", {
                    name: this.name,
                    lastname: this.lastname,
                    address: this.address,
                    email: this.email,
                    cart: new_cart,
                    amount: amount,
                })
                    .then(
                        (result) =>
                            //console.log(result.data.cart),
                            // console.log(result.data)
                            ""
                    )
                    .catch((error) => console.log(error));
            }
        },
    },
};
</script>

<style></style>
