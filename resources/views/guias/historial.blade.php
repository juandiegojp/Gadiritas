@extends('guias.base')
@section('title')
    Guias - Historial
@endsection
@section('content')
<div class="flex items-center justify-center mt-2 mb-4">
    <table class="w-3/4 text-sm text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-teal-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Actividad
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-600 bg-teal-50">
            @foreach ($reservas as $reserva)
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900 text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="w-1/3 text-center">
                        {{ $reserva->actividad->titulo }}
                    </td>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/y') }} -
                        {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $reservas->links() }}

@endsection
