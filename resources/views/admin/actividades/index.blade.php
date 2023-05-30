@extends('admin.base')
@section('title')
    Admin | Actividades
@endsection
@section('content')
    <div class="flex items-center justify-center">
        <table class="w-11/12 text-sm text-left text-gray-500">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                Actividades
                <p class="mt-1 text-sm font-normal text-gray-500">
                    Aquí se muestran algunos de los datos de los actividades. Puedes ver más información de un usuario haciendo click en
                    "Ver detalles".
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-700/25">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($actividades as $u)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $u->titulo }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $u->destino->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.datellesActividad', $u->id) }}"
                                class="font-medium text-gray-600 md:hover:text-blue-700 md:p-0">Ver detalles</a>
                        </td>
                    </tr>
                @empty
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                        Nada que mostrar aquí.
                    </h1>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
