@extends('admin.base')
@section('title')
    Admin | Usuarios
@endsection
@section('content')
    <div class="flex items-center justify-center">
        <table class="w-11/12 text-sm text-left text-gray-500">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Usuarios
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                    Aquí se muestran algunos de los datos de los usuarios. Puedes ver más información de un usuario haciendo
                    click en
                    "Ver detalles".
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-700/25 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo Electrónico
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $u)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $u->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $u->email }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.datellesUsuario', $u->id) }}"
                                class="font-medium text-gray-600 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-gray-500 hover:underline">Ver
                                detalles</a>
                        </td>
                    </tr>
                @empty
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        Nada que mostrar aquí.
                    </h1>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
