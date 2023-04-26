@extends('gadiritas.base')
@section('title')
    Gadiritas - detalles
@endsection
@section('content')
    <script>
        $(document).ready(function() {
            function getCookie(name) {
                let cookieValue = null;
                if (document.cookie && document.cookie !== "") {
                    const cookies = document.cookie.split(";");
                    for (const element of cookies) {
                        const cookie = element.trim();
                        // Does this cookie string begin with the name we want?
                        if (cookie.substring(0, name.length + 1) === name + "=") {
                            cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                            break;
                        }
                    }
                }
                return cookieValue;
            }

            function disponibilidad() {
                let date = datepickerOriginal.val().replaceAll("/", "-");
                let hora = $("#hora").val();

                $.ajax({
                    url: `/actividad/check`,
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        hora: hora,
                        date: date
                    },
                    type: "POST",
                    dataType: "json",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    success: (data) => {
                        console.log(data);
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


        <div class="grid grid-cols-2 gap-4">
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
                    @method('POST')
                    <input type="hidden" name="act_id" value="{{ $actividad->id }}">
                    @include('gadiritas.calendar')
                    <div>
                        <label for="n_personas">Selecciona una hora:</label>
                        <select name="hora" id="hora">
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                        </select>
                    </div>
                    <div>
                        <label for="n_personas">Nº de personas:</label>
                        <select name="n_personas" id="n_personas">
                            @for ($i = 1; $i < $actividad->max_personas + 1; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit">Reservar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
