@extends('theme.base')

@section('content')
    <div class="row m-0 fixed top"><div id="map"></div></div>
    <div class="container text-center">
        <div class="row m-0 "><i class="bi bi-caret-up-fill opcion-menu"></i></div>
        <form class="d-flex input-group w-auto">
            <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="search" aria-describedby="search-addon"/>
        </form>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        @forelse ($stolpersteines as $stolpersteine)
        <div class="row m-0" data-id_mostrar={{ $stolpersteine->id }} id="mostrardatos">
            <div class="col-4"><img src="{{ url('public/fotos/'.$stolpersteine->foto) }}" style="height: 100px;"></div>
            <div class="col-8"><b>{{ $stolpersteine->nombre }}</b> <br> {{ $stolpersteine->localidad }}</div>
        </div>
        @empty
        <div class="row m-0">
            <h1>No hay registros</h1>
        </div>
        @endforelse
        
    </div>
    
    <nav class="navbar fixed-bottom navbar-expand navbar-dark p-0" style="background-color: #493620;">
        <div class="row justify-content-between w-100 g-0 m-0 p-0" >
            <div id="home" class="navbar-nav col-4 justify-content-center active">
                <a href="home" class="nav-item nav-link opcion-menu"><i class="bi bi-map"></i></a>
            </div>
            <div id="info" class="navbar-nav col-4 justify-content-center">
                <a href="info" class="nav-item nav-link opcion-menu"><i class="bi bi-info-square"></i></a>
            </div>
            <div id="contact" class="navbar-nav col-4 justify-content-center">
                <a href="contact" class="nav-item nav-link opcion-menu"><i class="bi bi-person"></i></a>
            </div>
        </div>
    </nav>

    <div style="height: 4rem"></div>

    <script>
        var myIcon = L.icon({
            iconUrl: '/static/images/icons8-marcador-96.png',
            iconSize: [45, 47],
            iconAnchor: [23, 47],
        });
        
        var map = L.map('map').setView([37.890056, -4.778513], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
        maxZoom: 19
        }).addTo(map);

        @forelse ($stolpersteines as $stolpersteine)
        L.marker([{{$stolpersteine->lat}}, {{$stolpersteine->lon}}],{icon: myIcon})
            .bindPopup('<div class="row no-gutters"><div class="col-4"><img src="{{ url("public/fotos/".$stolpersteine->foto) }}" style="height: 100px;"></div><div class="col-8"><b>{{ $stolpersteine->nombre }}</b> <br> {{ $stolpersteine->localidad }}</div></div>')
            .openPopup()
            .addTo(map);
        @empty
        @endforelse
        
        var searchControl = L.esri.Geocoding.geosearch({
            position: 'topright',
            placeholder: 'Buscar una direccion',
            useMapBounds: false,
            providers: [L.esri.Geocoding.arcgisOnlineProvider({
            apikey: 'AAPK467b6b686b8541eaa5d2da0f225fee12L5eD559LAvzeQTZLCbdkpAorPBixamqNnYSfZ73aRUyQcY0PprZAaxqEtSqeD-E1', // replace with your api key - https://developers.arcgis.com
            nearby: {
                lat: -33.8688,
                lng: 151.2093
            }
            })]
        }).addTo(map);

        var results = L.layerGroup().addTo(map);

        searchControl.on('results', function (data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
            results.addLayer(L.marker(data.results[i].latlng));
            }
        });
        
        map.locate({
                setView: true,
                enableHighAccuracy: true,
            })
            .on("locationfound", (e) => {
                console.log(e);
                const marker = L.marker([e.latitude, e.longitude]).bindPopup(
                "Estas aqui"
                );
                
                const circle = L.circle([e.latitude, e.longitude], e.accuracy / 2, {
                weight: 2,
                color: "red",
                fillColor: "red",
                fillOpacity: 0.1,
                });

                map.addLayer(marker);
                map.addLayer(circle);
            })
            .on("locationerror", (e) => {
                console.log(e);
                alert("Permiso de ubicación denegado");
            });
    </script>
    <script>
        document.getElementById("mostrardatos").addEventListener("click", function(){
            window.location.href = "datastolpersteine/"+this.getAttribute('data-id_mostrar');
        });
    </script>
@endsection