<template>
    <div class="col-3 container-cart-dishes">
        <div class="desktop">
            <h2 class="text-dark text-center">Il tuo Carrello</h2>
            <div class="container-body-cart" v-if="cart && cart.length != 0">
                <div class="container-top-cart">
                    <div
                        class="cart-dishes"
                        v-for="(dish, index) in cart"
                        :key="index"
                    >
                        <div class="container-product">
                            <p class="fw-bold">X{{ dish.quantity }}</p>
                            <p class="p-name-dish">{{ dish.name }}</p>
                            <p>{{ (dish.price * dish.quantity).toFixed(2) }}&euro;</p>
                        </div>
                        <div class="container-button-cart">
                            <button
                                class="button-minus"
                                @click="$emit('subtractItem', dish)"
                            >
                                -
                            </button>
                            <button
                                class="button-rimuovi"
                                @click="$emit('removeItem', dish)"
                            >
                                Rimuovi
                            </button>
                            <button
                                class="button-plus"
                                @click="$emit('addItem', dish)"
                            >
                                +
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container-bottom-cart">
                    <div class="total-price-cart fw-bold">
                        TOTALE:
                        <span
                            >{{
                                this.cart.reduce(
                                    (total, dish) =>
                                        total + dish.price * dish.quantity,
                                    0
                                ).toFixed(2)
                            }}
                            &euro;</span
                        >
                    </div>
                    <div class="container-pay-trash-cart">
                        <router-link to="/payment" class="btn btn-pay"
                            >Paga</router-link
                        >
                        <button
                            class="mt-4 trash-dishes"
                            @click="$emit('clearCart')"
                        >
                            <lord-icon
                                src="https://cdn.lordicon.com/gsqxdxog.json"
                                trigger="hover"
                                colors="primary:#c71f16,secondary:#c71f16"
                                style="width: 50px; height: 50px"
                            >
                            </lord-icon>
                        </button>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img
                            class="pt-5"
                            src="../../images/cart-glovo.svg"
                            alt=""
                        />
                    </div>
                    <div class="col-12 mt-5 d-flex justify-content-center">
                        <div class="text-dark">
                            <p class="text-center text-empty-cart">
                                Non hai ancora aggiunto alcun prodotto. Quando lo
                                farai, compariranno qui!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- smartphone -->
        <div class="smartphone">
            <button class="btn btn-outline-success rounded-circle p-2 button-smartphone" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <div class="dish-in-cart" v-if="cart && cart.length != 0">
                    {{cart.length}}
                </div>
            <lord-icon
                src="https://cdn.lordicon.com/slkvcfos.json"
                trigger="loop"
                colors="primary:#ffc245,secondary:#38c172"
                style="width:50px;height:50px" delay="5000" stroke="70">
            </lord-icon>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Il tuo Carrello</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="container-body-cart" v-if="cart && cart.length != 0">
                        <div class="container-top-cart">
                            <div
                                class="cart-dishes"
                                v-for="(dish, index) in cart"
                                :key="index"
                            >
                                <div class="container-product">
                                    <p class="fw-bold">X{{ dish.quantity }}</p>
                                    <p class="p-name-dish">{{ dish.name }}</p>
                                    <p>{{ (dish.price * dish.quantity).toFixed(2) }}&euro;</p>
                                </div>
                                <div class="container-button-cart">
                                    <button
                                        class="button-minus"
                                        @click="$emit('subtractItem', dish)"
                                    >
                                        -
                                    </button>
                                    <button
                                        class="button-rimuovi"
                                        @click="$emit('removeItem', dish)"
                                    >
                                        Rimuovi
                                    </button>
                                    <button
                                        class="button-plus"
                                        @click="$emit('addItem', dish)"
                                    >
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="container-bottom-cart">
                            <div class="total-price-cart fw-bold">
                                TOTALE:
                                <span
                                    >{{
                                        this.cart.reduce(
                                            (total, dish) =>
                                                total + dish.price * dish.quantity,
                                            0
                                        ).toFixed(2)
                                    }}
                                    &euro;</span
                                >
                            </div>
                            <div class="container-pay-trash-cart">
                                <router-link to="/payment" class="btn btn-pay"
                                    >Paga</router-link
                                >
                                <button
                                    class="mt-4 trash-dishes"
                                    @click="$emit('clearCart')"
                                >
                                    <lord-icon
                                        src="https://cdn.lordicon.com/gsqxdxog.json"
                                        trigger="hover"
                                        colors="primary:#c71f16,secondary:#c71f16"
                                        style="width: 50px; height: 50px"
                                    >
                                    </lord-icon>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <img
                                    class="pt-5"
                                    src="../../images/cart-glovo.svg"
                                    alt=""
                                />
                            </div>
                            <div class="col-12 mt-5 d-flex justify-content-center">
                                <div class="text-dark">
                                    <p class="text-center text-empty-cart">
                                        Non hai ancora aggiunto alcun prodotto. Quando lo
                                        farai, compariranno qui!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Payment from "./Payment.vue";
import Axios from "axios";

export default {
    name: "Cart",
    components: {
        Payment,
    },
    data() {
        return {
            showPayment: false,
        };
    },
    props: {
        cart: {
            type: Array,
            default() {
                return [];
            },
        },
    },
    methods: {
        pay() {
            this.showPayment = true;
        },
    },
    mounted() {
        //
    },
};
</script>

<style lang="scss" scoped>
.container-cart-dishes {
    max-height: 28rem;
    // color: white;
    padding-top: 2rem;
    border-radius: 20px 20px;
    border: 1px solid lightgray;
    box-shadow: 5px 5px 10px lightgray;
    background-color: rgba(255, 248, 248, 0.926);
    .container-body-cart {
        height: 15rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        .container-top-cart {
            max-height: 80%;
            overflow-y: auto;
            padding: 0 0.5rem;
            .cart-dishes {
                .container-product {
                    display: flex;
                    justify-content: space-between;
                    .p-name-dish {
                        max-width: 70%;
                    }
                }
                .container-button-cart {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 2rem;
                    .button-rimuovi {
                        color: white;
                        background-color: #38c17177;
                        border-radius: 8px;
                        border: none;
                        &:hover {
                            background-color: #198754;
                        }
                    }
                    .button-minus {
                        color: white;
                        background-color: #38c17177;
                        border-radius: 8px;
                        border: none;
                        padding: 0 1rem;
                        &:hover {
                            background-color: #198754;
                        }
                    }
                    .button-plus {
                        color: white;
                        background-color: #38c17177;
                        border-radius: 8px;
                        border: none;
                        padding: 0 1rem;
                        &:hover {
                            background-color: #198754;
                        }
                    }
                }
            }
        }
        .container-bottom-cart {
            height: 20%;
            padding-top: 2rem;
            .total-price-cart {
                padding-bottom: 1rem;
            }
            .container-pay-trash-cart {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                .btn-pay {
                    background-color: #38c172;
                    width: 80%;
                    color: white;
                    margin: 1rem 0;
                    padding: 1rem 3rem !important;
                    &:hover {
                        background-color: #00a082;
                    }
                }
                .trash-dishes {
                    border: none;
                    background: transparent;
                }
            }
        }
    }
    .smartphone{
        display: none;
    }
}

@media all and (max-width: 885px) {
    .container-cart-dishes {
        width: 40%;
    }
}

@media all and (max-width: 786px) {
    .container-cart-dishes {
        width: 30%;
    }
}

@media all and (max-width: 674px) {
    .container-cart-dishes {
        width: 40%;
    }
}

@media all and (max-width: 565px) {
    .container-cart-dishes{
        background-color: none !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
    }
    .desktop{
        display: none;
    }
    .smartphone{
        display: block !important;
        .button-smartphone{
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            background-color: #ffffffd9;
            border: 3px solid #38c172;
            box-shadow: 2px 2px #88888865;
            .dish-in-cart{
                position: absolute;
                top: -5px;
                right: -5px;
                color: white;
                border-radius: 50%;
                background-color: rgb(255, 42, 42);
                box-shadow: 2px 2px #88888865;
                padding: 0 7px;
            }
        }
    }
}
</style>
