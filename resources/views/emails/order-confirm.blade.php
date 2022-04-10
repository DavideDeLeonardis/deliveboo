<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container-chechkout mt-5">
            <h1 class="text-success">Ciao {{ $order->name }}, il tuo ordine confermato e arriverà a breve!</h1>
        <h3 class="fs-4">
            Grazie per aver scelto
            <span class="fw-bold text-uppercase text-success bg-warning rounded-pill p-1">Deli<span class="fw-bold text-uppercase bg-success text-warning rounded-pill">veboo</span>
        </h3>
        <div class="row">
            <div class="col mb-5">
                <div class="card mt-4">
                    <h3 class="card-title p-3">Riepilogo ordine</h3>
                    <div class="card-header pt-4">
                        <ul class="list-group list-group-flush">
                            <br />
                            <li
                                class="list-group-item fw-bold"
                                style="background-color: rgb(232, 183, 48, 0.2)"
                            >
                                {{ $order->name }}
                            </li>
                            <br />
                            <li class="list-group-item">
                                Prezzo singolo: {{ $order->price }} &euro;
                            </li>
                            <br />
                            <li class="list-group-item">
                                Totale:
                                {{ $order->amount }} &euro;
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col w-25 p-2">
                <a href="http://127.0.0.1:8000/">
                    <img class="img w-100" src="../../images/logo.jpeg" alt="DeliveBoo"/>
                </a>
            </div>
        </div>
    <h1>Ordine confermato</h1>
    </div>
</body>

</html>
