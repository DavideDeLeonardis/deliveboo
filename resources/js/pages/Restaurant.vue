<template>
    <div class="container">
        <div class="row">
            <div class="col-9 bg-warning">
                <h1>{{ user.name }}</h1>
                <ul>
                    <li v-for="(dish, index) in dishes" :key="index">
                        {{ dish.name }}
                    </li>
                </ul>
            </div>
            <div class="col-3 bg-dark">ciaooooo</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Restaurant",
    props: ["slug"],
    data() {
        return {
            user: null,
            dishes: null,
        };
    },
    methods: {
        getUser(url) {
            axios.get(url).then((result) => {
                console.log(result);
                this.user = result.data.results.user;
                this.dishes = result.data.results.dishes;
                console.log(this.user);
                console.log(this.dishes);
            });
        },
    },
    created() {
        this.getUser("http://127.0.0.1:8000/api/v1/restaurants/" + this.slug);
    },
};
</script>

<style></style>
