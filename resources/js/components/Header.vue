<template>
    <header class="container-fluid">
        <div class="row">
            <div class="col-8 text-white container-img-header">
                <div class="w-25 p-2">
                    <img
                        class="img w-100"
                        src="../../images/logo.jpeg"
                        alt="DeliveBoo"
                    />
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style lang="scss" scoped>
.container-img-header {
    max-height: 5rem;
    img {
        width: 100%;
    }
}
</style>
