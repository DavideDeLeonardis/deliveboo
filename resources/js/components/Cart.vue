<template>
    <div class="col-3 bg-white text-dark">
        <div v-if="cart && cart.length != 0">
            <div v-for="(dish, index) in cart" :key="index">
                {{ dish.name }}
                <button @click="$emit('removeItem', dish)">
                    Rimuovi
                </button>
            </div>
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
};
</script>

<style lang="scss" scoped></style>
