@extends('theme.base')

@section('content')

    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-2"><h1>Contacto</h1></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-2 text-end py-3 px-2"><i class="bi bi-phone opcion-menu"></i></div>
        <div class="col-10 py-3 px-2 d-flex align-items-center"><button class="btn btn-large btncontacto">+34 123 456 789</button></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-2 text-end py-3 px-2"><i class="bi bi-envelope opcion-menu"></i></div>
        <div class="col-10 py-3 px-2 d-flex align-items-center"><button class="btn btn-large btncontacto">correocontacto@stolpersteine.com</button></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-2 text-end py-3 px-2"><i class="bi bi-facebook opcion-menu"></i></div>
        <div class="col-10 py-3 px-2 d-flex align-items-center"><button class="btn btn-large btncontacto">Stolpersteine Cordoba</button></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-2 text-end py-3 px-2"><i class="bi bi-youtube opcion-menu"></i></div>
        <div class="col-10 py-3 px-2 d-flex align-items-center"><button class="btn btn-large btncontacto">Stolpersteine Cordoba</button></div>
    </div>

    <nav class="navbar fixed-bottom navbar-expand navbar-dark p-0" style="background-color: #493620;">
        <div class="row justify-content-between w-100 g-0 m-0 p-0" >
            <div id="home" class="navbar-nav col-4 justify-content-center">
                <a href="home" class="nav-item nav-link opcion-menu"><i class="bi bi-map"></i></a>
            </div>
            <div id="info" class="navbar-nav col-4 justify-content-center">
                <a href="info" class="nav-item nav-link opcion-menu"><i class="bi bi-info-square"></i></a>
            </div>
            <div id="contact" class="navbar-nav col-4 justify-content-center active">
                <a href="contact" class="nav-item nav-link opcion-menu"><i class="bi bi-person"></i></a>
            </div>
        </div>
    </nav>

    <div style="height: 4rem"></div>
@endsection