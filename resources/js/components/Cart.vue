<template>
    <div class="col-3 bg-white text-dark">
        <div v-if="cart && cart.length != 0">
            <div v-for="(dish, index) in cart" :key="index">
                {{ dish.name }} X{{ dish.quantity }} TOTALE:
                {{ dish.price * dish.quantity }}&euro;
                <button @click="$emit('removeItem', dish)">Rimuovi</button>
                <button @click="$emit('subtractItem', dish)">-1</button>
                <button @click="$emit('addItem', dish)">+1</button>
            </div>
            <button class="btn btn-warning w-75">
                Paga
                <!-- <span v-for="(dish, index) in cart" :key="index">
                    {{ dish.price * dish.quantity }}
                </span> -->
            </button>
        </div>
        <div>
            TOTALE: <span>{{ this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0) }}</span>
        </div>
        <button class="mt-4" @click="$emit('clearCart')">
            Svuota carrello
        </button>
        <Payment />
    </div>
</template>

<script>
import Payment from './Payment.vue'
import Axios from 'axios'

export default {
    name: "Cart",
    components: {
        Payment,
    },
    // data(){
    //     return {
    //         tokenApi: '',
    //     }
    // },
    props: {
        cart: {
            type: Array,
            default() {
                return [];
            },
        },
    },
    methods: {
        //write something...
    },
    mounted() {
        //
    }
};
</script>

<style lang="scss" scoped></style>
