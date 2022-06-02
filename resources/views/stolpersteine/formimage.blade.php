@extends('theme.base')

@section('content')
    <div class="row no-gutters m-3 text-center">

        <h1>Agregar imagen al carousel</h1>
        
        <form action="{{ route('image.store')}}" method="post" enctype="multipart/form-data">
        
            @csrf


            <input type="text" name="id_stolpersteine" class="form-control" value="{{ old('id_stolpersteine') ?? app('request')->input('id') }}" style="display: none"> 
                
            <div class="mb-3">
                <label for="nombre" class="form-label"><h4>Imagen</h4></label>
                <input type="file" name="nombre" class="form-control" >
                @error('nombre')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label"><h4>Pequeña Descripción</h4></label>
                <input type="text" name="descripcion" class="form-control" placeholder="Describe la imagen muy brevemente" value="{{ old('descripcion') ?? @$stolpersteine->descripcion }}"> 
                @error('descripcion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar Imagen</button>
            
        </form>
    </div>
@endsection