<template>
    <div class="container">
        
        <!-- Riepilogo ordine -->
        <div>
            <h1>Riepilogo Ordine</h1>
            <ul>
                <li  v-for="(dish, index) in cart" :key="index">
                    {{ dish.name }} X{{ dish.quantity }}, &euro;{{ dish.price * dish.quantity }}
                </li>
                <li> TOTALE: {{ this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0) }} &euro;</li>
            </ul>
        </div>
        <!-- Riepilogo ordine -->

        <!-- Form dati ordine -->
        <div></div>
        <!-- Form dati ordine -->


        <v-braintree 
            authorization="sandbox_8h5ddqng_4sjx493rm6vt8q2c"
            @success="onSuccess"
            @error="onError"
            >
            </v-braintree>
    </div>
</template>

<script>
import Axios from 'axios'

export default {
    name: 'Payment',
    props: {
        cart: {
            type: Array,
            default() {
                return JSON.parse(window.localStorage.getItem('cart'));
            },
        },
    },
    methods: {
        onSuccess (payload) {    
        // payload.nonce = this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0)
        let nonce = payload.nonce;
        let amount = this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0)
        Axios.post('http://127.0.0.1:8000/api/order/make/payment?token=fake-valid-nonce&amount=' + amount)
        .then(result => {
            // let amount = this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0)
            console.log(result)
        })
        },
        onError (error) {
        let message = error.message;
        // Whoops, an error has occured while trying to get the nonce
        }
    },
}
</script>

<style>

</style>