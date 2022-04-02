<template>
    <div class="col-3 bg-white text-dark">
        <div v-for="(dish, index) in cart" :key="index">
            {{ dish.name }}
        </div>
    </div>
</template>

<script>
export default {
    name: "Cart",
    props: {
        cart: {
            type: Object,
            default() {
                return {};
            },
        },
    },
    created() {
        // localStorage.setItem('cart', this.cart);
        // console.log(localStorage);

        // let myObj_serialized = JSON.stringify(this.cart);
        // console.log(myObj_serialized);
    }
};
</script>

<style lang="scss" scoped></style>
