<template>
    <div>
        <v-braintree 
            authorization="sandbox_ykrby94x_4sjx493rm6vt8q2c"
            @success="onSuccess"
            @error="onError"
            >
            </v-braintree>
    </div>
</template>

<script>
import Axios from 'axios'

export default {
    name: 'Payment',
    // props: {
    //     authorization : {
    //         required: true,
    //         type: String,
    //     }
    // },
    methods: {
        onSuccess (payload) {
        let nonce = payload.nonce;
        },
        onError (error) {
        let message = error.message;
        // Whoops, an error has occured while trying to get the nonce
        }
    },
}
</script>

<style>

</style>