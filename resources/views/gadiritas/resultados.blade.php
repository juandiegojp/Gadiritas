@extends('gadiritas.base')
@section('title')
    Gadiritas - Búsqueda
@endsection
@section('content')
    <div id="filtroResultados">
        <form action="" method="POST" class="flex justify-between items-center w-full">
            @csrf
            <input type="hidden" id="destino_id" value="{{ $actividades[0]['destino_id'] }}">
            <div>
                <label for="freeTour" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Free Tour</label>
                <input type="checkbox" name="freeTour" id="freeTour">
            </div>
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
        </form>
    </div>
    <div class="grid grid-cols-4 gap-4 mx-4 h-screen" id="actividades-contenedor">
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
    @include('gadiritas.footer')
    <script>
        $(document).ready(function() {
            function filtrar() {
                let orden = $("#orden").val();
                let destino_id = $("#destino_id").val();
                let freeTour = 0;

                if ($("#freeTour").is(':checked')) {
                    freeTour = 1;
                }

                console.log("Orden:" + orden);
                console.log("DestinoID:"+destino_id);
                console.log("Free tout: "+freeTour);

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
                        console.log(actividades);
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
