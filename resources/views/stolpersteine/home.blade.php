@extends('theme.base')

@section('content')
    <div id="map" style="width: 100%;position: fixed;"></div>
    <div style="height: 76vh;width: 100%;"></div>
    <div class="container text-center pb-2" style="z-index: 2;position: absolute; background-color: #FFD43B; max-width: none;">
        <div class="row m-0 "><i class="bi bi-caret-up-fill opcion-menu" onclick="hacerscroll()"></i></div>
        <form class="d-flex input-group w-auto" onsubmit="document.getElementById('buscador').blur(); return false" id="formbuscador">
            <input type="search" class="form-control rounded" placeholder="Buscar nombre o localidad" onkeyup="buscar()" id="buscador" onclick="hacerscroll()"/>
        </form>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        @forelse ($stolpersteines as $stolpersteine)
        <div class="row m-0 my-3 p-1 py-3 mostrardatos rounded shadow cajastolpersteine" data-id_mostrar={{ $stolpersteine->id }}>
            <div class="col-4"><img src="{{ url('public/fotos/'.$stolpersteine->foto) }}" style="height: 100px;"></div>
            <div class="col-8 datosbuscador"><b>{{ $stolpersteine->nombre }}</b> <br> {{ $stolpersteine->localidad }}</div>
        </div>
        @empty
        <div class="row m-0">
            <h1>No hay registros</h1>
        </div>
        @endforelse
        
        <div style="height: 4rem" id="piepagina"></div>
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

        let puntos = L.markerClusterGroup();
        let punto;

        @forelse ($stolpersteines as $stolpersteine)
        punto = L.marker([{{$stolpersteine->lat}}, {{$stolpersteine->lon}}],{icon: myIcon})
            .bindPopup('<div class="row no-gutters mostrardatos justify-content-between" onclick="aux({{ $stolpersteine->id }})"><div class="col-5"><img src="{{ url("public/fotos/".$stolpersteine->foto) }}" style="width: 100%;"></div><div class="col-7"><b>{{ $stolpersteine->nombre }}</b> <br> {{ $stolpersteine->localidad }}</div></div>')
            .openPopup().on('click', clickZoom);
            puntos.addLayer(punto);
        @empty
        @endforelse
        map.addLayer(puntos);

        function clickZoom(e) {
            map.setView(e.target.getLatLng());
        }

        var searchControl = L.esri.Geocoding.geosearch({
            position: 'topright',
            placeholder: 'Buscar una direccion',
            useMapBounds: false,
            providers: [L.esri.Geocoding.arcgisOnlineProvider({
            apikey: 'AAPK467b6b686b8541eaa5d2da0f225fee12L5eD559LAvzeQTZLCbdkpAorPBixamqNnYSfZ73aRUyQcY0PprZAaxqEtSqeD-E1',
            nearby: {
                lat: -33.8688,
                lng: 151.2093
            }
            })]
        }).addTo(map);

        var results = L.layerGroup().addTo(map);

        searchControl.on('results', function (data) {
            results.clearLayers();
            results.addLayer(L.marker(data.results[0].latlng));
            map.setView(data.results[0].latlng, 15);
        });
        
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        map.locate({
                setView: true,
                enableHighAccuracy: true,
            })
            .on("locationfound", (e) => {
                if(urlParams.get('latitude') !== null && urlParams.get('longitude') !== null){
                    e.latitude=urlParams.get('latitude');
                    e.longitude=urlParams.get('longitude');
                }
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
                if(urlParams.get('latitude') !== null && urlParams.get('longitude') !== null){
                    e.latitude=urlParams.get('latitude');
                    e.longitude=urlParams.get('longitude');

                    const marker = L.marker([e.latitude, e.longitude]).bindPopup(
                    "Estas aqui"
                    );
                    
                    map.addLayer(marker);
                }
            });
    </script>
    <script>
        function aux(idaux){
            window.location.href = "datastolpersteine/"+idaux;
        }
        const datos = document.querySelectorAll('.mostrardatos');
        datos.forEach(dato => {
            dato.addEventListener("click", function(){
                window.location.href = "datastolpersteine/"+this.getAttribute('data-id_mostrar');
            });
        });

        function buscar() {
            var input = document.getElementById("buscador");
            var filter = input.value.toLowerCase();
            var nodes = document.getElementsByClassName('datosbuscador');

            for (i = 0; i < nodes.length; i++) {
                if (nodes[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].parentNode.style.display = "flex";
                } else {
                nodes[i].parentNode.style.display = "none";
                }
            }
        }

        function hacerscroll(){
            location.href='#formbuscador';
            setTimeout(function(){
                location.href='#buscador';
            }, 1000);
        }
        
        document.getElementById("buscador").addEventListener("search", function(event) {
            buscar();  
        });

        var iconoubi = L.icon({
            iconUrl: '/static/images/iconoubi.png',
            iconSize: [45, 47],
            iconAnchor: [23, 47],
        });
        var ubi;
        var ban=0;
        function setLocation(latitud,longitud){
            if(ban===1){
                map.removeLayer(ubi);
            }
            ubi = L.marker([latitud, longitud],{icon: iconoubi}).bindPopup("Estas aqui");
            map.addLayer(ubi);
            if(ban===0){
                map.setView([latitud, longitud], 12);
            }
            ban=1;
        }
    </script>
@endsection