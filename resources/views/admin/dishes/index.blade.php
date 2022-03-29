@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-dark table-bordered border-white table-hover table-striped">
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
        </table>
        <div class="row">
            <div class="col">
                {{ $dishes->links() }}
            </div>
        </div>
    </div>

    <script type="text/javascript" defer>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    // title: `Sei sicuro di voler eliminare <?= $dish->name ?>?`,
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
