@extends('gadiritas.base')
@section('title')
    Gadiritas - detalles
@endsection
@section('content')
    <script>
        $(document).ready(function() {
            function disponibilidad() {
                let date = datepickerOriginal.val().replaceAll("/", "-");
                let hora = $("#hora").val();
                let act_id = $("#act_id").val();

                console.log(date);
                console.log(hora);
                console.log(act_id);

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
                        console.log(data.status);
                        let cont = data.status.length;
                        const value = data.status;

                        for (let index = 0; index < cont; index++) {
                            $('#n_personas').append(
                                `<option value=${value[index]}>${value[index]}</option>`);
                        }
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


            let datepickerOriginal = $("#date");
            let divFecha = $("#divFecha");
            let originalValue = datepickerOriginal[0].value;


            divFecha[0].addEventListener("click", () => {
                console.log("fecha cambiada.")
                if (datepickerOriginal.value !== originalValue) {
                    disponibilidad();
                }
            });
        });
    </script>
    <div class="mx-6 mb-12">
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
            </div>
            <div class="w-1/2" id="reserva">
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="act_id" id="act_id" value="{{ $actividad->id }}">
                    @include('gadiritas.calendar')
                    <div>
                        <label for="hora">Selecciona una hora:</label>
                        <select name="hora" id="hora">
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                        </select>
                    </div>
                    <div>
                        <label for="n_personas">Nº de personas:</label>
                        <select name="n_personas" id="n_personas">

                        </select>
                    </div>
                    <button type="submit">Reservar</button>
                </form>
            </div>
        </div>
        <div class="w-full">
            <form action="{{ route('usuarios.crearComentario', $actividad->id) }}" method="post">
                @csrf
                <input type="hidden" name="act_id" id="act_id" value="{{ $actividad->id }}">
                <label for="contenido">Comentario:</label>
                <input type="text" name="contenido" id="contenido">
                <button type="submit">Enviar</button>
            </form>
            <div class="container">
                <h1 class="underline text-xl">Comentarios</h1>
                <div id="comentarios">
                    @foreach ($actividad->comentario as $comentario)
                        <div class="comentario mb-4" data-comentario-id="{{ $comentario->id }}">
                            <div class="contenido">{{ $comentario->contenido }}</div>
                            <div class="autor">{{ $comentario->user->name }}</div>
                            @if ($comentario->user_id == Auth::id())
                                <button class="editar">Editar</button>
                            @endif
                            <form action="{{ route('usuarios.editarComentario', $comentario->id) }}" method="POST"
                                id="formComentario" hidden>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="contenido">Contenido:</label>
                                    <input type="text" class="form-control" id="contenido" name="contenido"
                                        value="{{ $comentario->contenido }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <script>
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

                $('#formComentario').removeAttr('hidden');
            });
        });
    </script>
@endsection
