@extends('gadiritas.base')
@section('title')
    Gadiritas - Búsqueda
@endsection
@section('content')
    <div id="hero">
        <nav class="flex" aria-label="Breadcrumb" id="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('usuarios.actividades', $ciudades[0]->comarca) }}"
                            class="pr-1 ml-1 md:ml-2">{{ $ciudades[0]->comarca }}</a>
                    </div>
                </li>
                @if (count($ciudades) <= 1)
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 mr-4 md:ml-2">{{ $ciudades[0]->nombre }}</span>
                        </div>
                    </li>
                @endif
            </ol>
        </nav>
        @if (count($ciudades) > 1)
        <img src="{{ Vite::asset("resources/images/{$ciudades[0]->comarca}.jpg") }}" alt="{{ $ciudades[0]->comarca }}">
        @else
        <img src="{{ Vite::asset("resources/images/{$ciudades[0]->nombre}.jpg") }}" alt="{{ $ciudades[0]->nombre }}">
        @endif
    </div>
    <div id="resultadosContainer">
        <div id="filtroResultados">
            <form action="" method="POST">
                @csrf
                <input type="hidden" id="destino_id" value="{{$destino}}">
                <div>
                    <label for="orden">Ordenar por:</label>
                    <select name="orden" id="orden">
                        <option value="barato">Más barato primero</option>
                        <option value="caro">Más caro primero</option>
                        <option value="nombreASC">Títulos (A...Z)</option>
                        <option value="nombreDESC">Títulos (Z...A)</option>
                        <option value="relevancia" selected>Relevancia</option>
                        <option value="nuevas">Últimas añadidas</option>
                    </select>
                </div>
                <div>
                    <input type="checkbox" name="freeTour" id="freeTour">
                    <label for="freeTour">Free Tour</label>
                </div>
            </form>
        </div>
        <div id="actividades-contenedor">
            @foreach ($actividades as $actividad)
                <figure class="max-w-lg">
                    <div class="image-wrapper">
                        <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad['id']}.jpg") }}"
                            alt="{{ $actividad['titulo'] }}">
                        <div class="overlay">
                            <h3>{{ $actividad['titulo'] }}</h3>
                            <a href="{{ route('usuarios.detalles', $actividad['id']) }}">Ver detalles</a>
                        </div>
                    </div>
                    <figcaption class="mt-2 text-sm text-center text-gray-500">{{ $actividad['titulo'] }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
    {{-- <script src="{{ Vite::asset('resources/js/gadiritas.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            function filtrar() {
                let orden = $("#orden").val();
                let destino_id = $("#destino_id").val();
                let freeTour = 0;

                if ($("#freeTour").is(':checked')) {
                    freeTour = 1;
                }

                //console.log("Orden:" + orden);
                //console.log("DestinoID:" + destino_id);
                //console.log("Free tout: " + freeTour);

                $.ajax({
                    url: "/resultados/filtrar",
                    data: {
                        orden: orden,
                        destino_id: destino_id,
                        freeTour: freeTour
                    },
                    type: "POST",
                    dataType: "json",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        var actividades = data.actividades;
                        //console.log(actividades);
                        var html = '';
                        actividades.forEach(function(actividad) {
                            html += '<figure class="max-w-lg">';
                            html += '<div class="image-wrapper">';
                            html +=
                                '<img class="rounded-lg" src="{{ Vite::asset('resources/images/') }}' +
                                actividad.id + '.jpg" alt="' + actividad.titulo + '">';
                            html += '<div class="overlay">';
                            html += '<h3>' + actividad.titulo + '</h3>';
                            html +=
                                '<a href="{{ route('usuarios.detalles', ':id') }}">Ver detalles</a>'
                                .replace(':id', actividad.id);
                            html += '</div></div>';
                            html +=
                                '<figcaption class="mt-2 text-sm text-center text-gray-500">' +
                                actividad.titulo + '</figcaption>';
                            html += '</figure>';
                        });
                        $('#actividades-contenedor').html(html);
                    },
                    error: (error) => {
                        console.log(error);
                    }
                });
            }

            $("#orden").change(function() {
                filtrar();
            });

            $("#freeTour").change(function() {
                filtrar();
            });
        });
    </script>
@endsection
