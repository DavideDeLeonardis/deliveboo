<template>
    <div class="container-footer p-4">
        <div class="container-card">
            <div class="my-col row row-cols-1 row-cols-md-4">
                <div class=" p-3 d-flex flex-column container-col-footer">
                    <h4 class="text-white fw-bold">Scopri Deliveboo</h4>
                    <a href="/">Investitori</a>
                    <a href="/">Chi siamo</a>
                    <a href="/">Ristoranti</a>
                    <a href="/">Altro</a>
                    <a href="/">Pressroom</a>
                    <a href="/">Il nostro blog</a>
                    <a href="/">Programmazione</a>
                    <a href="/">Design</a>
                    <a href="/">Lavora con noi</a>
                    <a href="/">Diventa nostro partner</a>
                </div>
                <div class=" p-3 d-flex flex-column container-col-footer">
                    <h4 class="text-white fw-bold">Note legali</h4>
                    <a href="/">Termini e Condizioni</a>
                    <a href="/">Informativa sulla privacy</a>
                    <a href="/">Cookies</a>
                </div>
                <div class=" p-3 d-flex flex-column container-col-footer">
                    <h4 class="text-white fw-bold">Aiuto</h4>
                    <a href="/">Contatti</a>
                    <a href="/">FAQ</a>
                    <a href="/">Tipi di cucina</a>
                </div>
                <div class=" p-3 d-flex flex-column container-col-footer">
                    <h4 class="text-white fw-bold">Porta Deliveboo con te</h4>
                    <div class="container-img d-flex flex-column mt-3">
                        <img
                            class="w-50 mb-4"
                            src="../../images/app-store-badge-200x67.png"
                            alt=""
                        />
                        <img
                            class="w-50"
                            src="../../images/play-store-badge-200x67.png"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style lang="scss">
.container-footer {
    background-color: #2e3333;
    .container-card {
        margin: 0 auto;
        width: 95%;
        .my-col {
            background-color: #434848;
            // margin: 0 0.8em;
            a {
                text-decoration: none;
                color: white;
                font-weight: 200;
                margin-bottom: 0.5em;
                &:hover {
                    color: #198754;
                }
            }
        }
    }
}

@media all and (max-width: 767px) {
    .container-col-footer{
        width: 18rem;
    }
}

@media all and (max-width: 630px) {
    .container-col-footer{
        width: 15rem;
    }
}

@media all and (max-width: 527px) {
    .container-col-footer{
        width: 12rem;
    }
}

@media all and (max-width: 426px) {
    .container-col-footer{
        width: 20rem;
    }
}
</style>
