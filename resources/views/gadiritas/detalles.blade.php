@extends('gadiritas.base')
@section('title')
    Gadiritas - detalles
@endsection
@section('content')
    <script src="{{ Vite::asset('resources/js/gadiritas.js') }}"></script>
    <div id="hero">
        <nav class="flex" aria-label="Breadcrumb" id="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('usuarios.actividades', $actividad->destino->comarca) }}"
                            class="pr-1 ml-1 md:ml-2">{{ $actividad->destino->comarca }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('usuarios.actividades', $actividad->destino->nombre) }}"
                            class="pr-1 ml-1 md:ml-2">{{ $actividad->destino->nombre }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 mr-4 md:ml-2">{{ $actividad->titulo }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <img src="{{ Vite::asset("resources/images/{$actividad->id}.jpg") }}" alt="{{ $actividad->destino->nombre }}">
    </div>
    <div class="mx-6 mt-4 mb-12">
        <div id="fotosActividad">
            <div class="figure">
                <figure>
                    <img src="{{ Vite::asset("resources/images/{$actividad->id}-4.jpg") }}" alt="image description">
                    <figcaption>
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="figure">
                <figure>
                    <img src="{{ Vite::asset("resources/images/{$actividad->id}-3.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="figure">
                <figure>
                    <img src="{{ Vite::asset("resources/images/{$actividad->id}-2.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="figure">
                <figure>
                    <img src="{{ Vite::asset("resources/images/{$actividad->id}.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="flex items-start justify-center my-6">
            <div class="w-1/2" id="descMap">
                <p class="text-xl font-bold leading-none tracking-tight text-white underline md:text-2xl lg:text-3xl">
                    Descripción</p>
                {!! nl2br(e($actividad->descripcion)) !!}
                <div id="mapaEncuentro">
                    <p class="text-xl font-bold leading-none tracking-tight text-white underline md:text-2xl lg:text-2xl">
                        Punto de encuentro</p>
                    <input type="hidden" name="direccion" id="direccion" value="{{ $actividad->direccion }}">
                </div>
                <div class="flex items-center justify-center w-full">
                    <a id="pdf-link"
                        onclick="window.open('{{ route('generar.pdf', ['id' => $actividad->id]) }}', '_blank', 'width=800, height=800');">
                        <img src="{{ Vite::asset('resources/images/pdf.png') }}" alt="PDF-img">
                        Generar PDF</a>
                </div>
            </div>
            <div class="w-1/2 ml-4" id="reserva">
                <form action="{{ route('paypal.checkout') }}" method="post">
                    @csrf
                    <input type="hidden" name="act_id" id="act_id" value="{{ $actividad->id }}">
                    @include('gadiritas.calendar')
                    <div id="formContainerReserva">
                        <div class="formReserva">
                            <label for="hora">Selecciona una hora:</label>
                            <select name="hora" id="hora">
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                            </select>
                        </div>
                        <div class="formReserva">
                            <label for="n_personas">Nº de personas:</label>
                            <select name="n_personas" id="n_personas"></select>
                        </div>

                        <div class="formReserva">
                            <label for="precioTotal">Precio total:</label>
                            <input type="hidden" name="precioAct" id="precioAct" value="{{ $actividad->precio }}">
                            <input type="hidden" name="amount">
                            <p id="precioTotal" name="precioTotal"></p>
                        </div>
                    </div>

                    <button type="submit">Reservar</button>
                </form>
            </div>
        </div>

        <div id="secComments">
            <form action="{{ route('usuarios.crearComentario', $actividad->id) }}" method="post" id="comentarioForm">
                @csrf
                <input type="hidden" name="act_id" id="act_id" value="{{ $actividad->id }}">
                <div id="comentario">
                    <div>
                        <label for="contenido">Deja aquí tu comentario:</label>
                        <textarea name="contenido" id="contenido" rows="4" placeholder="¿Qué te ha parecido la experiencia?" required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="enviar-button">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
            <div id="comments-container">
                <p>Comentarios de otros usuarios:</p>
                <div id="comentarios">
                    @foreach ($actividad->comentario as $comentario)
                        <div class="comentario" data-comentario-id="{{ $comentario->id }}">
                            <figcaption class="autor">
                                <div>
                                    <cite>{{ $comentario->user->name }} {{ $comentario->user->apellidos }}</cite>
                                </div>
                            </figcaption>
                            @if ($comentario->user_id == Auth::id())
                                <button class="editar">
                                    <span class="editar-texto">
                                        Editar
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </button>
                            @endif
                            <p class="contenido">{{ $comentario->contenido }}</p>
                            <form action="{{ route('usuarios.editarComentario', $comentario->id) }}" method="POST"
                                class="formComentario" hidden>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="contenido">Editar comentario:</label>
                                    <textarea name="contenido" id="contenido" rows="4" class="form-control">{{ $comentario->contenido }}</textarea>
                                </div>
                                <button type="submit">Guardar cambios</button>
                                <form action="{{ route('usuarios.borrarComentario') }}" method="POST"
                                    class="formComentario" hidden>
                                    @csrf
                                    <input type="hidden" name="comentarioID" id="comentarioID"
                                        value="{{ $comentario->id }}">
                                    <button type="submit" id="borrarComentario">Borrar comentario</button>
                                </form>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoianVhbmRpZXdlIiwiYSI6ImNsaGFzejN5dTBreWYzZXFmcDJ5Mjk2bGEifQ.KT0AykAW457TNuwVGeLFSg';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-99.1687, 19.4136],
        });

        // Use the Mapbox geocoding API to get the coordinates of the address
        var address = document.getElementById("direccion").value;
        fetch('https://api.mapbox.com/geocoding/v5/mapbox.places/' + address + '.json?access_token=' + mapboxgl.accessToken)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                var coordinates = data.features[0].center;
                // Add marker for the activity location
                var marker = new mapboxgl.Marker()
                    .setLngLat(coordinates)
                    .setPopup(new mapboxgl.Popup().setHTML("<h3 style='font-weight: bold;'>Punto de encuentro</h3>"))
                    .addTo(map);
                // Fly to the activity location
                map.flyTo({
                    center: coordinates,
                    zoom: 19
                });
            })
            .catch(function(error) {
                console.log('Error:', error);
            });

        // Add marker for user location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lngLat = [position.coords.longitude, position.coords.latitude];
                var accuracy = position.coords.accuracy;
                var marker = new mapboxgl.Marker()
                    .setLngLat(lngLat)
                    .setPopup(new mapboxgl.Popup().setHTML("<h3 style='font-weight: bold;'>Ubicación actual</h3>"))
                    .addTo(map);
            });
        } else {
            alert('Tu navegador no soporta geolocalización.');
        }
    </script>
@endsection
