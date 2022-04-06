<template>
    <div class="col-3 container-cart-dishes">
        <h2>Il tuo Carrello</h2>
        <div class="container-body-cart" v-if="cart && cart.length != 0">
            <div class="container-top-cart">
                <div class="cart-dishes" v-for="(dish, index) in cart" :key="index">
                    <div class="container-product">
                        <p>X{{ dish.quantity }}</p>
                        <p class="p-name-dish">{{ dish.name }}</p>
                        <p>{{ dish.price * dish.quantity }}&euro;</p>
                    </div>
                    <div class="container-button-cart">
                        <button class="button-minus" @click="$emit('subtractItem', dish)">-</button>
                        <button class="button-rimuovi" @click="$emit('removeItem', dish)">Rimuovi</button>
                        <button class="button-plus" @click="$emit('addItem', dish)">+</button>
                    </div>
                </div>
            </div>
            <div class="container-bottom-cart">
                <div class="total-price-cart">
                    TOTALE: <span>{{ this.cart.reduce((total, dish) => total + dish.price * dish.quantity, 0) }} &euro;</span>
                </div>
                <div class="container-pay-trash-cart">
                    <button class="btn btn-pay">
                        Paga
                        <!-- <span v-for="(dish, index) in cart" :key="index">
                            {{ dish.price * dish.quantity }}
                        </span> -->
                    </button>
                    <button class="mt-4 trash-dishes" @click="$emit('clearCart')">
                        <lord-icon
                            src="https://cdn.lordicon.com/gsqxdxog.json"
                            trigger="hover"
                            colors="primary:#c71f16,secondary:#c71f16"
                            style="width:50px;height:50px">
                        </lord-icon>
                    </button>
                </div>
            </div>
        </div>
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
    methods: {
        // showQuantity(dish) {
        //     let found = this.$store.state.cart.find(product => product.id == dish.id);
        //     dish.quantity == found.quantity
        //     return dish.quantity
        //   }
    },
};
</script>

<style lang="scss" scoped>
.container-cart-dishes{
    max-height: 35rem;
    color: white;
    padding-top: 2rem;
    border-radius: 20px 20px;
    background-color: rgba(0, 0, 0, 0.9);
    .container-body-cart{
        max-height: 30rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        .container-top-cart{
            max-height: 80%;
            overflow-y: auto;
            padding: 0 0.5rem;
            .cart-dishes{
                .container-product{
                    display: flex;
                    justify-content: space-between;
                    .p-name-dish{
                        max-width: 70%;
                    }
                }
                .container-button-cart{
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 2rem;
                    .button-rimuovi{
                        color: white;
                        background-color: #38c17177;
                        border-radius: 8px;
                        border: none;
                    }
                    .button-minus{
                        color: white;
                        background-color: #38c17177;
                        border-radius: 8px;
                        border: none;
                        padding: 0 1rem;
                    }
                    .button-plus{
                        color: white;
                        background-color: #38c17177;
                        border-radius: 8px;
                        border: none;
                        padding: 0 1rem;
                    }
                }
            }
        }
        .container-bottom-cart{
            height: 20%;
            padding-top: 2rem;
            .total-price-cart{
                padding-bottom: 1rem;
            }
            .container-pay-trash-cart{
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                .btn-pay{
                    background-color: #38c172;
                    width: 80%;
                    color: white;
                    margin: 1rem 0;
                    padding: 1rem 3rem !important;
                }
                .trash-dishes{
                    border: none;
                    background: transparent;
                }
            }
        }
    }
}

@media all and (max-width: 885px) {
    .container-cart-dishes{
        width: 40%;
    }
}

// @media all and (max-width: 733px) {
//     .container-cart-dishes{
//         position: fixed;
//     }
// }
</style>
