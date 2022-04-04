@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-5 mb-5">
                <div class="card" style="background-color: rgb(56, 193, 114, 0.2)">
                    <div class="card-body">
                        <p class="card-text"><strong>Nome:</strong> {{ $order->name }}</p>
                        <p class="card-text"><strong>Cognome:</strong> {{ $order->lastname }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $order->email }}</p>
                        <p class="card-text"><strong>Indirizzo:</strong> {{ $order->address }}</p>
                        <p class="card-text"><strong>Data:</strong> {{ $order->date }}</p>
                        <p class="card-text"><strong>Ora:</strong> {{ $order->time }}</p>
                        {{-- <li>{{ $order->price_total }} &euro;</li> --}}
                    </div>
                </div>
                <div class="card mt-4">
                    <h3 class="card-title p-3">Lista piatti</h3>
                    <?php $total = 0; ?>
                    @foreach ($order->dishes()->get() as $dish)
                        <?php $total += $dish->price * $dish->pivot->quantity; ?>
                        <div class="card-header pt-4" style="background-color: rgb(232, 183, 48, 0.2)">{{ $dish->name }}:
                        </div>
                        <ul class="list-group list-group-flush">
                            <br>
                            <li class="list-group-item">Quantità: {{ $dish->pivot->quantity }}</li>
                            <br>
                            <li class="list-group-item">Prezzo singolo: {{ $dish->price }} &euro;</li>
                            <br>
                            <li class="list-group-item">Somma piatti: {{ $dish->price * $dish->pivot->quantity }} &euro;
                            </li>
                            </li>
                        </ul>
                    @endforeach
                    <div class="card-header p-4">
                        <h3>Totale: {{ $total }} &euro;</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
