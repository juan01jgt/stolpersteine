@extends('theme.base')

@section('content')
    <div class="container">
        @guest
            <h1 class="text-center">Inicio de sesión</h1>
        @else
            <h1 class="text-center">Pagina de inicio</h1>
        @endguest
        <div class="row m-0 text-center">
            @guest
                @error('cred')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label"><h4>Email</h4></label>
                        <input type="email" name="email" class="form-control" placeholder="Email...">
                        @error('email')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><h4>Contraseña</h4></label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña...">
                        @error('password')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="remember">Guardar sesión
                    </div>
                    <button type="submit" class="btn btn-success">Iniciar sesion</button>
                </form>
            @else
                <div class="col-6"><a href="{{ route('stolpersteine.index')}}" class="btn btn-lg btn-primary">VER <br>Stolpersteines</a></div>
                <div class="col-6"><a href="{{ route('stolpersteine.create')}}" class="btn btn-lg btn-primary">CREAR <br>Stolpersteines</a></div>
                <form action="/logout" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar sesion</button>
                </form>
            @endguest
        </div>
    </div>
@endsection