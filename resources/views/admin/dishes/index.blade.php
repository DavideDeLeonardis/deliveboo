@extends('layouts.app')

@section('content')
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                {{-- <th scope="col">Image</th> --}}
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Course</th>
                <th scope="col">Availability</th>
            </tr>
        </thead>
    </table>
@endsection
