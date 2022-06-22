@extends('theme.base')

@section('content')
    <div class="container">
        <h1 class="text-center">Sesión cerrada</h1>
        <div class="row m-0 text-center">
            <div class="col-12"><a href="{{ route('stolpersteine.index')}}" class="btn btn-lg btn-primary">Volver al inicio</a></div>
        </div>
    </div>
@endsection