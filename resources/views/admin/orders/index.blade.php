@extends('layouts.admin')

@section('content')
    <ul>
        <?php $i = 1 ?>
        @foreach ($orders as $order)
            <h5 class="mt-3">Ordine {{$i}}
            </h5>
            <li>{{ $order->name }}</li>
            <li>{{ $order->lastname }}</li>
            <li>{{ $order->email }}</li>
            <li>{{ $order->address }}</li>
            <li>{{ $order->price_total }} &euro;</li>
            <li>{{ $order->date }}</li>
            <li>{{ $order->time}}</li>
            <li><a class="btn btn-primary" href="{{ route('admin.orders.show', $order)}}">Visualizza ordine</a></li>
            <?php $i++ ?>
        @endforeach
    </ul>
@endsection
