<template>
    <div class="col-3 bg-white text-dark">
        <div v-for="(dish, index) in cart" :key="index">
            {{ dish.name }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'Cart',
    props: [
        'cart',
    ]
}
</script>

<style lang="scss" scoped>

</style>