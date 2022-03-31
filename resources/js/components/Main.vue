<template>
    <div class="container">
        <div v-if="restaurants" class="row row-cols-1 row-cols-md-3 g-4">
            <div
                v-for="(restaurant, index) in restaurants"
                :key="`restaurant-${index}`"
                class="col"
            >
                <div class="card">
                    <img
                        :src="restaurant.photo"
                        :alt="restaurant.name"
                        class="card-img-top"
                    />

                    <div class="card-body">
                        <h5 class="card-title">{{ restaurant.name }}</h5>
                    </div>

                    <router-link
                        class="btn btn-info"
                        :to="{ name: 'restaurant', params: { slug: restaurant.slug } }"
                        >View</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Main",
    props: {
        restaurants: {
            type: Array,
            default() {
                return [];
            },
        },
    },
};
</script>

<style></style>
