@extends('theme.base')

@section('content')
    <div class="container">
        <h1 class="text-center">Hola Mundo</h1>
        <a href="{{ route('stolpersteine.index')}}" class="btn btn-primary">Stolpersteines</a>
    </div>
@endsection