@extends('guias.base')
@section('title')
    Guias - Dashboard
@endsection
@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var reservasHoy = document.getElementById('reservasHoy');
            var h1Element = reservasHoy.querySelector('span');
            var links = reservasHoy.getElementsByTagName('a');
            var count = links.length;

            h1Element.innerHTML = count;
        });
    </script>
    <div class="flex justify-between mx-2">
        <div class="w-1/2 mt-4" id="reservasHoy">
            <h1 class="flex items-center text-2xl font-extrabold">Hoy<span
                    class="bg-blue-100 text-blue-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded ml-2"></span>
            </h1>
            @foreach ($reservasHoy as $reserva)
                @if (!\Carbon\Carbon::parse($reserva->hora)->isPast())
                    <a href="#"
                        class="flex flex-col items-center my-2 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ Vite::asset("resources/images/{$reserva->actividad->id}.jpg") }}" alt="img">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ $reserva->actividad->titulo }}</h5>
                            <p class="mb-3 font-normal text-gray-700 ">Fecha:
                                {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</p>
                            <p class="mb-3 font-normal text-gray-700 ">Inicio:
                                {{ \Carbon\Carbon::parse($reserva->hora)->format('h:i') }}</p>
                            <p class="mb-3 font-normal text-gray-700 ">Nº de personas: {{ $reserva->personas }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="w-1/2 mt-4">
            <h1 class="flex items-center text-xl font-extrabold">Próximamente</h1>
            <div class="grid grid-cols-2" id="reservas">
                @foreach ($reservas as $reserva)
                    <a href="#" data-modal-target="modal{{ $reserva->id }}" data-modal-toggle="modal{{ $reserva->id }}"
                        class="flex flex-col items-center w-3/4 my-2 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">
                                {{ $reserva->actividad->titulo }}</h5>
                            <p class="mb-2 text-xs text-gray-700 ">Fecha de la reserva:
                                {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</p>
                            @if ($reserva->personas == $reserva->actividad->max_personas)
                                <p class="text-md text-gray-700 bg-yellow-100 text-center">¡COMPLETOS!</p>
                            @else
                                <p class="text-xs text-gray-700 ">Nº de personas: {{ $reserva->personas }}
                            @endif
                        </div>
                    </a>
                    <!-- Main modal -->
                    <div id="modal{{ $reserva->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{$reserva->actividad->titulo}}
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="modal{{ $reserva->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <p>{{$reserva->personas}}</p>
                                    <p>{{$reserva->fecha}}</p>
                                    <p>{{$reserva->hora}}</p>
                                    <p>{{$reserva->actividad->direccion}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $reservas->links() }}
        </div>
    </div>
@endsection
