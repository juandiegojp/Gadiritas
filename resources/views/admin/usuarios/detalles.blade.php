@extends('admin.base')
@section('title')
    Admin | Creacción de usuarios
@endsection
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo Electrónico
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teléfono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contraseña
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ¿Es admin?
                    </th>
                </tr>
            </thead>
            <tbody>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $usuario->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $usuario->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $usuario->apellidos }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $usuario->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $usuario->tlf }}
                        </td>
                        <td class="px-6 py-4">
                            aa
                        </td>
                        <td class="px-6 py-4">
                            {{ $usuario->is_admin ? "Sí" : "No"}}
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
