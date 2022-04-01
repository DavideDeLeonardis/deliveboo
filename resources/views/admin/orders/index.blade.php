@extends('layouts.admin')

@section('content')
    <div class="container bg-dark">
        <?php $i = 1; ?>
        <div class="row d-flex justify-content-around">
            @foreach ($orders as $order)
                <div class="col m-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-success">Ordine {{ $i }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Nome: {{ $order->name }} {{ $order->lastname }}
                            </h6>
                            <p class="card-text">Email: {{ $order->email }}</p>
                            <p class="card-text">Indirizzo: {{ $order->address }}</p>
                            <p class="card-text">Totale: {{ $order->price_total }} &euro;</p>
                            <p class="card-text">Data: {{ $order->date }}</p>
                            <p class="card-text">Ora: {{ $order->time }}</p>
                            <a class="btn btn-light text-light" style="background-color: #38c172 !important"
                                href="{{ route('admin.orders.show', $order) }}">Visualizza
                                ordine</a>
                        </div>
                    </div>
                    <?php $i++; ?>
                </div>
            @endforeach
        </div>
    </div>
@endsection
