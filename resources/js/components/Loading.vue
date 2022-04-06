<template>
    <div class="d-flex align-items-center justify-content-center mb-2">
        <h4 class="d-inline-block">Finding restaurants near you...</h4>
        <font-awesome-icon icon="fa-solid fa-spinner" spin size="2xl" class="ms-3"/>
    </div>
</template>

<script>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

export default {
    name: "Loading",
    components: {
        FontAwesomeIcon,
    },
};
</script>

<style lang="scss" scoped></style>
