<template>
    <div
        v-if="pages.prev_page_url || pages.next_page_url"
        class="row mt-3"
    >
        <ul class="list-inline">
            <li class="list-inline-item">
                <button
                    v-if="pages.prev_page_url"
                    class="btn btn-primary text-white"
                    @click="changePage('prev_page_url')"
                >
                    Prev
                </button>
            </li>
            <li class="list-inline-item">
                <button
                    v-if="pages.next_page_url"
                    class="btn btn-primary text-white"
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

<style lang="scss" scoped></style>
