@extends('gadiritas.base')
@section('title')
    Gadiritas - Reservas
@endsection
@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($reservas as $r)
                <td>
                    {{$r->id}}
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection
