@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}"></li>
                    <li>{{ $user->name }}</li>
                    <li>{{ $user->email }}</li>
                    <li>{{ $user->address }}</li>
                    <li>{{ $user->phone }}</li>
                    <li>{{ $user->p_iva }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
