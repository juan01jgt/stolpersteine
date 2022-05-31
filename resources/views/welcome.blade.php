@extends('theme.base')

@section('content')
    <div class="container">
        <h1 class="text-center">Pagina de inicio</h1>
        <div class="row m-0 text-center">
            <div class="col-6"><a href="{{ route('stolpersteine.index')}}" class="btn btn-lg btn-primary">VER <br>Stolpersteines</a></div>
            <div class="col-6"><a href="{{ route('stolpersteine.create')}}" class="btn btn-lg btn-primary">CREAR <br>Stolpersteines</a></div>
        </div>
    </div>
@endsection