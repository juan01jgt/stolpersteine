@extends('theme.base')

@section('content')

    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-2"><h1>Asociación y Proyecto Stolpersteine</h1></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-4">La asociación <b>TRIÁNGULO AZUL STOLPERSTEINEDE CÓRDOBA</b> que tiene como fin prioritarioy central la recuperación, divulgación, homenaje y todo lo relacionado con la <b>memoria histórica del exilio y deportación</b> de ciudadanos y ciudadanas cordobesas, desde el golpe militar del 18 de julio de 1936 y hasta la reinstauración de la democracia en nuestro país.</div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-2"><img src="{{ url("/static/images/LogoStolpersteineCO.png") }}" class="img-fluid borde"></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-4"><b>Stolpersteine</b> es una palabra alemana que significa «piedra que te hace tropezar». Con el propósito de <b>conmemorar</b> el destino de las personas deportadas y asesinadas en los campos de concentración nazis, el artista alemán <b>Gunter Demnig</b> ideó en el año 1995 un pequeño bloque memorial de cemento de forma cúbica en el que una de sus caras está cubierta por una lámina de latón donde se inscribe el nombre de la víctima y su periodo de reclusión.</div>
    </div>

    <nav class="navbar fixed-bottom navbar-expand navbar-dark p-0" style="background-color: #493620;">
        <div class="row justify-content-between w-100 g-0 m-0 p-0" >
            <div id="home" class="navbar-nav col-4 justify-content-center">
                <a href="home" class="nav-item nav-link opcion-menu"><i class="bi bi-map"></i></a>
            </div>
            <div id="info" class="navbar-nav col-4 justify-content-center active">
                <a href="info" class="nav-item nav-link opcion-menu"><i class="bi bi-info-square"></i></a>
            </div>
            <div id="contact" class="navbar-nav col-4 justify-content-center">
                <a href="contact" class="nav-item nav-link opcion-menu"><i class="bi bi-person"></i></a>
            </div>
        </div>
    </nav>

    <div style="height: 4rem"></div>
@endsection