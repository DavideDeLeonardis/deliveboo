<template>
    <div class="container-job p-5">
        <div class="container">
            <div class="container-img text-center mx-auto mb-2">
                <img
                    class="w-25 justify-content-center"
                    src="../../images/hand.png"
                    alt=""
                />
            </div>
            <h2 class="fw-bold fs-1 mb-5 text-center">Lavora con DeliveBoo</h2>
            <div class="row container-card-job">
                <div class="col-4">
                    <div
                        class="container-card d-flex flex-column justify-content-center align-items-center"
                    >
                        <div class="container-img w-100 text-center mb-4">
                            <img
                                class="w-50"
                                src="../../images/photo_rider.png"
                                alt=""
                            />
                        </div>
                        <h3 class="text-dark fw-bold fs-1 mb-3 title-card-job">Rider</h3>
                        <p class="text-center text-card-job">
                            Diventa un rider: flessibilità, ottimi guadagni e un
                            mondo di vantaggi per te.
                        </p>
                        <a
                            href="/"
                            class="btn my-btn-success text-white rounded-pill p-3"
                            >Unisciti a noi</a
                        >
                    </div>
                </div>
                <div class="col-4">
                    <div
                        class="container-card d-flex flex-column justify-content-center align-items-center"
                    >
                        <div class="container-img w-100 text-center mb-4">
                            <img
                                class="w-50"
                                src="../../images/photo_restaurant.png"
                                alt=""
                            />
                        </div>
                        <h3 class="text-dark fw-bold fs-1 mb-3 title-card-job">Ristoranti</h3>
                        <p class="text-center text-card-job">
                            Diventa partner di Deliveroo e raggiungi sempre più
                            clienti. Ci occupiamo noi della consegna, così che
                            la tua unica preoccupazione sia continuare a
                            preparare il miglior cibo.
                        </p>
                        <a
                            href="/"
                            class="btn my-btn-success text-white rounded-pill p-3"
                            >Diventa nostro partner</a
                        >
                    </div>
                </div>
                <div class="col-4">
                    <div
                        class="container-card d-flex flex-column justify-content-center align-items-center"
                    >
                        <div class="container-img w-100 text-center mb-4">
                            <img
                                class="w-50"
                                src="../../images/photo_workwithus.png"
                                alt=""
                            />
                        </div>
                        <h3 class="text-dark fw-bold fs-1 mb-3 title-card-job">
                            Lavora con noi
                        </h3>
                        <p class="text-center text-card-job">
                            La nostra missione è trasformare il modo in cui le
                            persone mangiano. È un obiettivo ambizioso, come
                            noi, e ci servono persone che ci aiutino a
                            raggiungerlo.
                        </p>
                        <a
                            href="/"
                            class="btn my-btn-success text-white rounded-pill p-3"
                            >Scopri di più</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Job",
};
</script>

<style lang="scss">
.container-job {
    background-color: #e9f8f5;
    width: 100%;
    .container {
        width: 100%;
        .container-img {
            width: 30%;
        }
        .container-card {
            .title-card-job{

            }
            .text-card-job{
                width: 15rem;
                height: 10rem;
            }
            .my-btn-success {
                background-color: #198754;
            }
        }
    }
}

@media all and (max-width: 991px) {
    .container-card {
        .title-card-job{
            font-size: 1.7rem !important;
        }
        .text-card-job{
            font-size: 0.8rem !important;
            width: 10rem !important;
            height: 11rem !important;
            margin-bottom: 0 !important;
        }
        .my-btn-success {
            padding: 0.7rem !important;
            font-size: 0.8rem !important;
        }
    }
}

@media all and (max-width: 767px) {
    .container-card-job {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        .title-card-job{
            width: 20rem !important;
            font-size: 1.5rem !important;
            text-align: center;
        }
        .text-card-job{
            font-size: 1rem !important;
            width: 20rem !important;
            height: 8rem !important;
        }
        .my-btn-success {
            width: 15rem !important;
            padding: 1rem !important;
            font-size: 0.8rem !important;
            margin-bottom: 2rem;
        }
    }
}
</style>
