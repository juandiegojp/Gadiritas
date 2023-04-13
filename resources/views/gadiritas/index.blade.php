@extends('gadiritas.base')
@section('title')
    Gadiritas - Home
@endsection
@section('content')
    <div>
        <form action="" method="post" class="w-1/2">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative w-1/2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Mockups, Logos..." required>
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>
    <div class="grid gap-2 grid-cols-3 w-full place-content-between">
        <div
            class="w-full max-w-sm bg-white border-solid border-2 border-indigo-600 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="https://3.bp.blogspot.com/-YS9WGXB3TDs/Up2x8_QH5pI/AAAAAAAAlaM/lJVHR6rt34g/s1600/Vista+a%25C3%25A9rea.jpg" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        Castillo de Santiago</h5>
                </a>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                    <a href="#"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                        to cart</a>
                </div>
            </div>
        </div>

        <div
            class="w-full max-w-sm bg-white border-solid border-2 border-indigo-600 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="p-8 rounded-t-lg h-60 w-72" src="https://www.andalusiatourtravel.com/uploads/actividades/88/20150314144106bodega-barbadillo-manzanilla-sanlucar.jpg" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Bodega Barbadillo</h5>
                </a>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                    <a href="#"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                        to cart</a>
                </div>
            </div>
        </div>

        <div
        class="w-full max-w-sm bg-white border-solid border-2 border-indigo-600 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="p-8 rounded-t-lg h-60 w-72" src="https://www.lacostadecadiz.com/wp-content/uploads/2022/07/FB_IMG_1656867000170.jpg" alt="product image" />
        </a>
        <div class="px-5 pb-5">
            <a href="#">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    Museo de Rocío Jurado</h5>
            </a>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                <a href="#"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    to cart</a>
            </div>
        </div>
    </div>

    </div>
@endsection
