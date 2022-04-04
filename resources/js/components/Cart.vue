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
        <button class="mt-4" @click="$emit('clearCart')">
            Svuota carrello
        </button>
    </div>
</template>

<script>
export default {
    name: "Cart",
    props: {
        cart: {
            type: Array,
            default() {
                return [];
            },
        },
    },
    data() {
        return {};
    },
    methods: {
        addQuantity(value) {
            value["quantity"] += 1;
            console.log(value);
        },
        removeQuantity(value) {
            if (value["quantity"] != 1) {
                value["quantity"] -= 1;
            }
            console.log("sottratto", value);
        },
    },
};
</script>

<style lang="scss" scoped></style>
