<template>
    <div class="container-chechkout mt-5">
        <h2 class="text-success">
            Pagamento avvenuto con successo!
            <lord-icon
                src="https://cdn.lordicon.com/lupuorrc.json"
                trigger="loop"
                colors="primary:#121331,secondary:#ffc245"
                style="width:50px;height:50px">
            </lord-icon>
        </h2>

        <div class="animation-food">
            <h4>Il tuo ordine sta arrivando</h4>
            <lord-icon
                src="https://cdn.lordicon.com/poblyvkl.json"
                trigger="loop"
                colors="primary:#000000,secondary:#38c172"
                style="width:80px;height:80px"
                axis-y="65">
            </lord-icon>
            <hr>
        </div>

        <h3 class="fs-4">
            Grazie per aver scelto
            <span
                class="fw-bold text-uppercase text-success bg-warning rounded-pill p-1"
                >Deli<span
                    class="fw-bold text-uppercase bg-success text-warning rounded-pill"
                    >veboo</span
                ></span
            >. Torna alla
            <a href="/" class="text-decoration-none fw-bold text-warning"
                >Home.</a
            >
        </h3>
        <div class="row">
            <div class="col mb-5">
                <!-- <div class="card" style="background-color: rgb(56, 193, 114, 0.2)">
                    <div class="card-body">
                        <p class="card-text"><strong>Nome:</strong> {{ $order->name }}</p>
                        <p class="card-text"><strong>Cognome:</strong> {{ $order->lastname }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $order->email }}</p>
                        <p class="card-text"><strong>Indirizzo:</strong> {{ $order->address }}</p>
                        <p class="card-text"><strong>Data:</strong> {{ $order->date }}</p>
                        <p class="card-text"><strong>Ora:</strong> {{ $order->time }}</p>
                        {{-- <li>{{ $order->price_total }} &euro;</li> --}}
                    </div>
                </div> -->
                <div class="card mt-4">
                    <h3 class="card-title p-3">Riepilogo ordine</h3>
                    <div
                        v-for="(dish, index) in cart"
                        :key="index"
                        class="card-header pt-4"
                    >
                        <ul class="list-group list-group-flush">
                            <br />
                            <li
                                class="list-group-item fw-bold"
                                style="background-color: rgb(232, 183, 48, 0.2)"
                            >
                                {{ dish.name }}
                            </li>
                            <br />
                            <li class="list-group-item">
                                Quantità: {{ dish["quantity"] }}
                            </li>
                            <br />
                            <li class="list-group-item">
                                Prezzo singolo: {{ dish.price }} &euro;
                            </li>
                            <br />
                            <li class="list-group-item">
                                Somma piatti:
                                {{ dish.price * dish["quantity"] }} &euro;
                            </li>
                        </ul>
                    </div>
                    <div class="card-header p-4">
                        <h3>
                            Totale:
                            {{
                                cart
                                    .reduce(
                                        (total, dish) =>
                                            total + dish.price * dish.quantity,
                                        0
                                    )
                                    .toFixed(2)
                            }}
                            &euro;
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Checkout",
    data() {
        return {
            cart: JSON.parse(window.localStorage.getItem("cart")),
        };
    },
    props: {
        cart: {
            type: Array,
            default() {
                return JSON.parse(window.localStorage.getItem("cart"));
            },
        },
    },
};
</script>

<style lang="scss">
.animation-food{
    hr{
        border-top: 5px dashed #ffc245;
        margin-top: 0;
        margin-bottom: 2rem;
    }
    lord-icon{
        animation: mymove 10s forwards;
    }
}
@keyframes mymove {
  0% {left: 0;}
  50% {left: 40%;}
  100% {left: 90%;}
}
</style>
