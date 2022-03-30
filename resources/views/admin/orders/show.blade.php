@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li>{{ $order->name }}</li>
                    <li>{{ $order->lastname }}</li>
                    <li>{{ $order->email }}</li>
                    <li>{{ $order->address }}</li>
                    <li>{{ $order->date }}</li>
                    <li>{{ $order->time }}</li>
                    {{-- <li>{{ $order->price_total }} &euro;</li> --}}
                </ul>
                <h1>Lista piatti</h1>
                <ul>
                    <?php $total = 0 ?>
                    @foreach ($order->dishes()->get() as $dish)
                    <?php $total += $dish->price * $dish->pivot->quantity ?>
                        <li>{{ $dish->name }}:
                            <br>
                            <span>Prezzo singolo: {{ $dish->price }} &euro;</span>
                            <br>
                            <span>Quantità: {{ $dish->pivot->quantity }}</span>
                            <br>
                            <span>Somma piatti: {{ $dish->price * $dish->pivot->quantity }} &euro;</span></li>
                    @endforeach
                    <li><h3>Totale: {{ $total }} &euro;</h3></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
