@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col d-flex flex-wrap">
                @foreach ($dishes as $dish)
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body" @if (!$dish->description) style="height: 150px" @endif
                            style="height: 260px">
                            <h5 class="card-title text-uppercase">{{ $dish->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $dish->course }}</h6>
                            @if ($dish->description)
                                <p class="card-text p-3 overflow-auto bg-success text-dark bg-opacity-25"
                                    style="height: 50%; max-height: 150px">
                                    {{ $dish->description }}</p>
                            @endif
                            <div class="btn-group btn-group-index align-items-center" role="group"
                                aria-label="Basic mixed styles example">
                                <a href="{{ route('admin.dishes.show', $dish->slug) }}"
                                    class="btn-card btn rounded-2 text-white">Visualizza</a>
                                <a href="{{ route('admin.dishes.edit', $dish->slug) }}"
                                    class="btn-card btn mx-3 rounded-2 text-white">Modifica</a>
                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-flat show_confirm" data-toggle="tooltip"
                                        title='Delete'>
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="hover"
                                            colors="primary:#e83a30,secondary:#c71f16" stroke="65"
                                            style="width:40px;height:40px">
                                        </lord-icon>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <table class="table table-warning table-bordered border-success table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Portata</th>
                    <th scope="col">Disponibilità</th>
                    <th scope="col" colspan="3">Azioni</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->price }} &euro;</td>
                        <td>{{ $dish->course }}</td>
                        <td>{{ $dish->availability === 1 ? 'Disponibile' : 'Non Disponibile' }}</td>
                        <td><a class="btn btn-success" href="{{ route('admin.dishes.show', $dish->slug) }}">Show</a></td>
                        <td><a class="btn btn-info" href="{{ route('admin.dishes.edit', $dish->slug) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-xs btn-danger btn-flat show_confirm" type="submit" value="Delete"
                                    data-toggle="tooltip" title='Delete'>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        <div class="row">
            <div class="col">
                {{ $dishes->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript" defer>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Sei sicuro di voler eliminare questo piatto?`,
                    text: "Se lo cancelli, l'azione sarà irreversibile.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
