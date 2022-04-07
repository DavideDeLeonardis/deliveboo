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
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" v-model="name" maxlength="100" class="form-control" name="name" id="name" placeholder="Inserisci il tuo nome" required>
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" v-model="surname" maxlength="100" class="form-control" name="surname" id="surname" placeholder="Inserisci il tuo cognome" required>
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" v-model="address" maxlength="100" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" v-model="email" maxlength="100" class="form-control" name="email" id="email" placeholder="Inserisci la tua email" required>
        </div>
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