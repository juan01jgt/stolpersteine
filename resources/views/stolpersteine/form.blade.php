@extends('theme.base')

@section('content')
    <div class="row no-gutters m-3 text-center">

        @if (isset($stolpersteine))
            <h1>Editar stolpersteine</h1>
        @else
            <h1>Crear stolpersteine</h1>
        @endif
        

        @if (isset($stolpersteine))
            <form action="{{ route('stolpersteine.update', $stolpersteine) }}" method="post">
            @method('PUT')
        @else
            <form action="{{ route('stolpersteine.store') }}" method="post" enctype="multipart/form-data">
        @endif
        
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label"><h4>Nombre</h4></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre completo del deportado" value="{{ old('nombre') ?? @$stolpersteine->nombre }}"> 
                @error('nombre')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="localidad" class="form-label"><h4>Lugar de nacimiento</h4></label>
                <input type="text" name="localidad" class="form-control" placeholder="Lugar de nacimiento del deportado" value="{{ old('localidad') ?? @$stolpersteine->localidad}}">
                @error('localidad')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="f_nacimiento" class="form-label"><h4>Fecha de nacimiento</h4></label>
                <input type="date" name="f_nacimiento" class="form-control" value="{{ old('f_nacimiento') ?? @$stolpersteine->f_nacimiento}}">
                @error('f_nacimiento')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="f_defuncion" class="form-label"><h4>Fecha de defuncion</h4></label>
                <input type="date" name="f_defuncion" class="form-control" value="{{ old('f_defuncion') ?? @$stolpersteine->f_defuncion}}">
                @error('f_defuncion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="biografia" class="form-label"><h4>Biografia del deportado</h4></label>
                <textarea name="biografia" id="biografia" cols="30" rows="10" class="form-control" placeholder="Introduce la biografia completa del deportado">{{ old('biografia') ?? @$stolpersteine->biografia}}</textarea>
                @error('biografia')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label"><h4>Descripcion de la deportacion</h4></label>
                <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control" placeholder="Introduce la informacion completa de la deportacion">{{ old('Descripcion') ?? @$stolpersteine->Descripcion}}</textarea>
                @error('Descripcion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label"><h4>Foto principal</h4></label>
                <input type="file" name="foto" class="form-control" >
                @error('foto')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label"><h4>Ubicacion en el mapa</h4></label>
                <div id="map"></div>
                <input type="number" id="lat" name="lat" class="form-control" placeholder="Latitud" style="display: none;"> 
                <input type="number" id="lon" name="lon" class="form-control" placeholder="Longitud" style="display: none;">
                @error('lat')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
                @error('lon')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            

            @if (isset($stolpersteine))
                <button type="submit" class="btn btn-success">Editar Stolpersteine</button>
            @else
                <button type="submit" class="btn btn-success">Guardar Stolpersteine</button>
            @endif
            
        </form>
    </div>
    <script>
        
        var map = L.map('map').setView([37.890056, -4.778513], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
        maxZoom: 19
        }).addTo(map);
        
        var searchControl = L.esri.Geocoding.geosearch({
            position: 'topright',
            placeholder: 'Introduce una direccion completa',
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
            for (var i = data.results.length - 1; i >= 0; i--) {
                document.getElementById('lat').setAttribute('value', data.results[i].latlng.lat );
                document.getElementById('lon').setAttribute('value', data.results[i].latlng.lng );
                results.addLayer(L.marker(data.results[i].latlng));
            }
        });

        map.on("click", addMarker);

        function addMarker(e) {
            results.clearLayers();
            document.getElementById('lat').setAttribute('value', e.latlng.lat );
            document.getElementById('lon').setAttribute('value', e.latlng.lng );

            const marker = new L.marker(e.latlng, {
                draggable: true,
            });
            results.addLayer(marker);
            marker.on("dragend", dragedMaker);
        }
        function dragedMaker() {

            document.getElementById('lat').setAttribute('value', this.getLatLng().lat );
            document.getElementById('lon').setAttribute('value', this.getLatLng().lng );
        }
        
        CKEDITOR.replace( 'biografia' );
        CKEDITOR.replace( 'Descripcion' );
        
    </script>
@endsection