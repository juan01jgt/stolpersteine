@extends('theme.base')

@section('content')

    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-2"><h1>Asociación y Proyecto Stolpersteine</h1></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center text-center p-2"><img src="{{ url("/static/images/LogoStolpersteineCO.png") }}" class="img-fluid borde"></div>
    </div>
    <div class="row justify-content-center w-100 g-0 m-0 p-0">
        <div class="col-12 justify-content-center p-4">La Asociación, de ámbito provincial, tiene como fin prioritario y central la <b>recuperación, divulgación, homenaje y todo lo relacionado con la memoria histórica del exilio y deportación de ciudadanos y ciudadanas cordobesas,</b> desde el golpe militar de 18 de julio de 1936 y hasta la reinstauración de la democracia en nuestro país. Para ello, la Asociación trabaja en: 
            <br>
            <br>
            <ul>
                <li>Promover el <b>homenaje</b> a todos los cordobeses y cordobesas víctimas de totalitarismos, especialmente aquellos que fueron deportados a los campos de concentración nazi.</li>
                <li><b>Impulsar y colaborar</b> en la difusión del proyecto artístico-conmemorativo <b>"Stolpersteine"</b> cuyas características se consideran idóneas para el homenaje y la divulgación de la Memoria de nuestros deportados/as y exiliados/as.</li>
                <li><b>Realizar y promover</b> proyectos de investigación y estudios tendentes a recuperar la memoria del Exilio y la Deportación, pudiendo colaborar en los mismos Universidades u otros centros de investigación nacionales y extranjeros que ostenten los mismos fines.</li>
                <li><b>Apoyar y divulgar</b> proyectos pedagógicos que tengan por objetivo la <b>educación y difusión</b> de contenidos didácticos orientados al alumnado de Enseñanza Secundaria Obligatoria y Bachillerato.</li>
                <li>Realizar <b>homenajes, coloquios, debates, presentaciones, exposiciones, exhibiciones y todo tipo de actos públicos</b> que sirvan para recuperar la <b>memoria del Exilio y la Deportación.</b></li>
                <li><b>Publicar y divulgar</b> de todo tipo de materiales.</li>
                <li><b>Promocionar</b> ante las diferentes Administraciones Públicas de todo tipo de actividades encaminadas a la consecución de los fines de la Asociación.</li>
                <li>Y en general, llevar a cabo todas aquellas actividades encaminadas a la consecución de sus fines.</li>
            </ul>
            <div class="row g-0 m-0 p-0">
                <div class="col-6">
                    <a href="https://drive.google.com/file/d/1l747kJkkJ6lehmuHTrxB_E_RcxbccRT7/view?usp=sharing" onclick="mostrarcarga()"><h3>Leer Mas...</h3></a>
                </div>
                <div class="col-6">
                    <div class="spinner-border text-primary" role="status" id="simbolocarga" style="display: none">
                    </div>
                </div>
            </div>
        </div>
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

    <script>
        function mostrarcarga() {document.getElementById('simbolocarga').style.display = 'block';}
    </script>
@endsection