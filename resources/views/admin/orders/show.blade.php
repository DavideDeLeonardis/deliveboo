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
                    <li>{{ $order->price_total }} &euro;</li>
                </ul>
                <h1>Lista piatti</h1>
                <ul>
                    @foreach ($order->dishes()->get() as $dish)
                        <li>{{ $dish->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
