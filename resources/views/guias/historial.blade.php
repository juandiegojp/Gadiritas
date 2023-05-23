@extends('guias.base')
@section('title')
    Guias - Historial
@endsection
@section('content')
<h1 class="my-2 text-xl font-extrabold text-center text-gray-600 underline uppercase md:text-3xl lg:text-4xl">Historial</h1>
    <div class="relative flex items-center justify-center overflow-x-auto sm:rounded-lg">
        <table class="w-3/4 mx-4 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-600 uppercase bg-sky-300">
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
                        class="bg-blue-100 border-b hover:bg-blue-200">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
    </div>
    <div class="mb-4">{{ $reservas->links() }}</div>
@endsection
