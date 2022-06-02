@extends('theme.base')

@section('content')
    <div class="container text-center">
        <h1>Listado de Stolpersteines</h1>
        <a href="{{ route('stolpersteine.create')}}" class="btn btn-primary">Crear  Stolpersteine</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Lugar de nacimiento</th>
                <th>Fecha de nacimiento</th>
                <th>Fecha de defuncion</th>
                <th>Foto</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($stolpersteines as $stolpersteine)
                    <tr>
                        <td>{{ $stolpersteine->nombre }}</td>
                        <td>{{ $stolpersteine->localidad }}</td>
                        <td>{{ $stolpersteine->f_nacimiento }}</td>
                        <td>{{ $stolpersteine->f_defuncion }}</td>
                        <td><img src="{{ url('public/fotos/'.$stolpersteine->foto) }}" style="height: 100px;"></td>
                        <td>
                            <a href="{{ route('stolpersteine.edit', $stolpersteine) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('stolpersteine.destroy', $stolpersteine) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar esta stolpersteine')">Eliminar</button>
                            </form>
                            <a href="{{ route('image.create', 'id='.$stolpersteine->id) }}" class="btn btn-success">Agregar imagenes relacionadas</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>

        @if ($stolpersteines->count())
            {{ $stolpersteines->links() }}
        @endif
        
    </div>
@endsection