@extends('theme.base')

@section('content')

    <div class="container">
        
        @if ($stolpersteines)
        <div class="row m-0" data-id_mostrar={{ $stolpersteines->id }}>
            <div class="col-12 text-center"><img src="{{ url('public/fotos/'.$stolpersteines->foto) }}" class="w-100" onload="cargar('{{ $stolpersteines->biografia }}','{{ $stolpersteines->Descripcion }}')"></div>
            <div class="col-12 text-center"><h1><b>{{ $stolpersteines->nombre }}</b></h1><h5>{{ $stolpersteines->localidad }}</h5></div>
            <div class="col-12 text-center">
              <h5>{{ Str::substr($stolpersteines->f_nacimiento, 8, 2) }}/{{ Str::substr($stolpersteines->f_nacimiento, 5, 2) }}/{{ Str::substr($stolpersteines->f_nacimiento, 0, 4) }} - 
                {{ Str::substr($stolpersteines->f_defuncion, 8, 2) }}/{{ Str::substr($stolpersteines->f_defuncion, 5, 2) }}/{{ Str::substr($stolpersteines->f_defuncion, 0, 4) }}</h5>
            </div>
            <hr>
            <div class="col-12 m-1" id="biografia"></div>
            @if (count($imagenes) > 0)
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner borde">
                  @forelse ($imagenes as $imagen)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ url('public/fotos/'.$imagen->nombre) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-block">
                      <h5 style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">{{ $imagen->descripcion }}</h5>
                    </div>
                  </div>
                  @empty
                    
                  @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @else
              <hr>
            @endif
          <div class="col-12 m-1" id="Descripcion"></div>
        </div>
        @else
        <div class="row m-0">
            <h1>No hay datos</h1>
        </div>
        @endif
        
    </div>

    <div class="row mx-5"><a href="javascript:history.back()" class="btn btn-lg btn-primary"><i class="bi bi-arrow-left"></i>Volver</a></div>

    
    <nav class="navbar fixed-bottom navbar-expand navbar-dark p-0" style="background-color: #493620;">
        <div class="row justify-content-between w-100 g-0 m-0 p-0" >
            <div id="home" class="navbar-nav col-4 justify-content-center active">
                <a href="../home" class="nav-item nav-link opcion-menu"><i class="bi bi-map"></i></a>
            </div>
            <div id="info" class="navbar-nav col-4 justify-content-center">
                <a href="../info" class="nav-item nav-link opcion-menu"><i class="bi bi-info-square"></i></a>
            </div>
            <div id="contact" class="navbar-nav col-4 justify-content-center">
                <a href="../contact" class="nav-item nav-link opcion-menu"><i class="bi bi-person"></i></a>
            </div>
        </div>
    </nav>

    <div style="height: 4rem"></div>
    <script>
      function cargar(cadena,cadena2) {
        document.getElementById('biografia').innerHTML = cadena;
        document.getElementById('Descripcion').innerHTML = cadena2;
      }
    </script>
@endsection