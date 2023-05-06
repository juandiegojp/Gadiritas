@extends('gadiritas.base')
@section('title')
    Gadiritas - detalles
@endsection
@section('content')
    <script>
        $(document).ready(function() {
            var precioActividad;
            var numPersonas;
            var precioTotal;

            let datepickerOriginal = $("#date");
            let divFecha = $("#divFecha");
            let originalValue = datepickerOriginal[0].value;

            disponibilidad();

            function showPrecioTotal() {
                let precioCalculado = numPersonas * precioActividad;
                precioTotal.innerText = precioCalculado + "€";
                let amountInput = document.querySelector('input[name="amount"]');
                amountInput.setAttribute('value', precioCalculado);
            }

            function disponibilidad() {
                let date = datepickerOriginal.val().replaceAll("/", "-");
                let hora = $("#hora").val();
                let act_id = $("#act_id").val();

                //console.log(date);
                //console.log(hora);
                //console.log(act_id);

                $('#n_personas').empty();

                $.ajax({
                    url: "/actividad/check",
                    data: {
                        hora: hora,
                        date: date,
                        act_id: act_id
                    },
                    type: "POST",
                    dataType: "json",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        //console.log(data.status);
                        let cont = data.status.length;
                        const value = data.status;

                        for (let index = 0; index < cont; index++) {
                            if (index == 0) {
                                $('#n_personas').append(
                                    `<option value=${value[index]} selected>${value[index]}</option>`
                                );
                            } else {
                                $('#n_personas').append(
                                    `<option value=${value[index]}>${value[index]}</option>`);
                            }
                        }
                        precioActividad = document.getElementById("precioAct").value;
                        numPersonas = document.getElementById("n_personas").value;
                        precioTotal = document.getElementById("precioTotal");
                        console.log(precioActividad + "€");
                        console.log(numPersonas + " personas");
                        console.log(precioTotal);
                        showPrecioTotal()
                    },
                    error: (error) => {
                        console.log(error);
                    }
                });
            }

            $("#hora").change(function() {
                console.log("hora cambiada.")
                disponibilidad();
            });

            $("#n_personas").change(function() {
                console.log("Personas console.log");
                numPersonas = document.getElementById("n_personas").value;
                showPrecioTotal();
            });

            divFecha[0].addEventListener("click", () => {
                console.log("fecha cambiada.")
                if (datepickerOriginal.value !== originalValue) {
                    disponibilidad();
                }
            });
        });

        $(function() {
            // Cuando se hace clic en el botón "Editar"
            $('#comentarios').on('click', '.editar', function() {
                // Obtener el ID del comentario que se está editando
                var comentarioID = $(this).closest('.comentario').data('comentario-id');
                console.log(comentarioID);

                // Obtener el contenido actual del comentario
                var contenidoActual = $(this).siblings('.contenido').text();
                console.log(contenidoActual);

                // Reemplazar el contenido actual del comentario con un formulario de edición
                $(this).siblings('.contenido').hide();
                $(this).siblings('.autor').hide();
                $('.editar').hide();

                $(this).siblings('.formComentario').removeAttr('hidden');
                $('body').on('click', function(e) {
                    // Si el clic no ocurrió dentro del área de comentarios
                    if (!$(e.target).closest('#comentarios').length) {
                        // Volver a mostrar el contenido del comentario y ocultar el formulario de edición
                        $('.contenido').show();
                        $('.autor').show();
                        $('.editar').show();
                        $('.formComentario').attr('hidden', '');
                    }
                });
            });
        });
    </script>
    <div class="mx-6 mt-4 mb-12">
        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
            {{ $actividad->titulo }}</h1>


        <div class="grid grid-cols-4 gap-4">
            <div class="figure">
                <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}-4.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="figure">
                <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}-3.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="figure">
                <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}-2.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="figure">
                <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}.jpg") }}"
                        alt="image description">
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p>{{ $actividad->titulo }}</p>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="flex items-start justify-center my-6" id="bottom">
            <div class="w-1/2">
                <p class="mb-2 text-xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl">
                    Descripción</p>
                {!! nl2br(e($actividad->descripcion)) !!}

                <p class="mb-2 text-xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl">Punto de
                    encuentro</p>
                <p>{{ $actividad->direccion }}</p>
                <input type="hidden" name="direccion" id="direccion" value="{{ $actividad->direccion }}">
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
            <form action="{{ route('usuarios.crearComentario', $actividad->id) }}" method="post">
                @csrf
                <input type="hidden" name="act_id" id="act_id" value="{{ $actividad->id }}">
                <div id="comentario">
                    <div>
                        <label for="contenido">Deja aquí tu comentario:</label>
                        <textarea name="contenido" id="contenido" rows="4" placeholder="¿Qué te ha parecido la experincia?" required></textarea>
                    </div>
                    <div>
                        <button type="submit">
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
                                    <cite></cite>
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
    <div class="divMap">
        <div id='map'></div>
    </div>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoianVhbmRpZXdlIiwiYSI6ImNsaGFzejN5dTBreWYzZXFmcDJ5Mjk2bGEifQ.KT0AykAW457TNuwVGeLFSg';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-99.1687, 19.4136],
            zoom: 12
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
                    zoom: 14
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
