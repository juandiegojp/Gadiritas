@extends('guias.base')
@section('title')
    Guias - Historial
@endsection
@section('content')
<h1 class="my-2 text-xl font-extrabold text-center text-gray-600 underline uppercase md:text-3xl lg:text-4xl">Historial</h1>
    <div class="relative flex items-center justify-center overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-3/4 mx-4 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-600 uppercase bg-blue-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Título de la actividad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hora
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->actividad->titulo }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($reserva->hora)->format('h:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reservas->links() }}
    </div>
@endsection
