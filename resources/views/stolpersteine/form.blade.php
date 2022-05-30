@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">

        @if (isset($stolpersteine))
            <h1>Editar stolpersteine</h1>
        @else
            <h1>Crear stolpersteine</h1>
        @endif
        

        @if (isset($stolpersteine))
            <form action="{{ route('stolpersteine.update', $stolpersteine) }}" method="post">
            @method('PUT')
        @else
            <form action="{{ route('stolpersteine.store') }}" method="post" enctype="multipart/form-data">
        @endif
        
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label"><h4>Nombre</h4></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre completo del deportado" value="{{ old('nombre') ?? @$stolpersteine->nombre }}"> 
                @error('nombre')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="localidad" class="form-label"><h4>Lugar de nacimiento</h4></label>
                <input type="text" name="localidad" class="form-control" placeholder="Lugar de nacimiento del deportado" value="{{ old('localidad') ?? @$stolpersteine->localidad}}">
                @error('localidad')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="f_nacimiento" class="form-label"><h4>Fecha de nacimiento</h4></label>
                <input type="date" name="f_nacimiento" class="form-control" value="{{ old('f_nacimiento') ?? @$stolpersteine->f_nacimiento}}">
                @error('f_nacimiento')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="f_defuncion" class="form-label"><h4>Fecha de defuncion</h4></label>
                <input type="date" name="f_defuncion" class="form-control" value="{{ old('f_defuncion') ?? @$stolpersteine->f_defuncion}}">
                @error('f_defuncion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="biografia" class="form-label"><h4>Biografia del deportado</h4></label>
                <textarea name="biografia" cols="30" rows="10" class="form-control" placeholder="Introduce la biografia completa del deportado">{{ old('biografia') ?? @$stolpersteine->biografia}}</textarea>
                @error('biografia')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label"><h4>Descripcion de la deportacion</h4></label>
                <textarea name="Descripcion" cols="30" rows="10" class="form-control" placeholder="Introduce la informacion completa de la deportacion">{{ old('Descripcion') ?? @$stolpersteine->Descripcion}}</textarea>
                @error('Descripcion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label"><h4>Foto principal</h4></label>
                <input type="file" name="foto" class="form-control" >
                @error('foto')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($stolpersteine))
                <button type="submit" class="btn btn-success">Editar Stolpersteine</button>
            @else
                <button type="submit" class="btn btn-success">Guardar Stolpersteine</button>
            @endif
            
        </form>
    </div>
@endsection