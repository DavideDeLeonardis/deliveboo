<template>
    <div
        v-if="pages.prev_page_url || pages.next_page_url"
        class="row"
    >
        <ul class="list-inline">
            <li class="list-inline-item">
                <button
                    v-if="pages.prev_page_url"
                    class="btn my_bg-green text-white"
                    @click="changePage('prev_page_url')"
                >
                    Prev
                </button>
            </li>
            <li class="list-inline-item d-flex justify-content-end">
                <button
                    v-if="pages.next_page_url"
                    class="btn my_bg-green text-white"
                    @click="changePage('next_page_url')"
                >
                    Next
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ChangePage",
    props: {
        pages: {
            type: Object,
            default() {
                return {};
            },
        }
    },
    methods: {
        changePage(varChangePage) {
            this.$emit("changePage", varChangePage);
        }
    }
};
</script>

<style lang="scss" scoped>
 .my_bg-green  {
     background-color: #198754;
     border-radius: 50px 20px;
 }
</style>
