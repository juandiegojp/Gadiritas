@extends('gadiritas.base')
@section('title')
    Gadiritas - Búsqueda
@endsection
@section('content')
    <div id="filtroResultados">
        <form action="" method="POST">
            @csrf
            <input type="hidden" id="destino_id" value="{{ $actividades[0]['destino_id'] }}">
            <label for="orden">Ordenar por:</label>
            <select name="orden" id="orden">
                <option value="barato">Más barato primero</option>
                <option value="caro">Más caro primero</option>
                <option value="relevancia" selected>Relevancia</option>
                <option value="nuevas">Últimas añadidas</option>
            </select>
        </form>
    </div>
    <div class="grid grid-cols-4 gap-4 mx-4" id="actividades-contenedor">
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
    <script>
        $(document).ready(function() {
            function filtrar() {
                let orden = $("#orden").val();
                let destino_id = $("#destino_id").val();

                console.log(orden);
                console.log(destino_id);

                $.ajax({
                    url: "/resultados/filtrar",
                    data: {
                        orden: orden,
                        destino_id: destino_id
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

        });
    </script>
@endsection
