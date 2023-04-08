@extends('admin.base')
@section('title')
    Admin | Home
@endsection
@section('content')
    <div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        @forelse($usuarios as $usuario)
            <time
                class="text-lg font-semibold text-gray-900 dark:text-white">{{ Carbon\Carbon::parse($usuario->created_at)->isSameAs('d', Carbon\Carbon::now()) ? 'Hoy' : Carbon\Carbon::parse($usuario->created_at)->diffForHumans(['parts' => 1]) }}</time>
            <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                <li>
                    <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="text-gray-600 dark:text-gray-400">
                            <div class="text-base font-normal"><span class="font-medium text-gray-900 dark:text-white">
                                    {{ ucfirst($usuario->name) }}</span> likes <span
                                    class="font-medium text-gray-900 dark:text-white">Bonnie's</span> post in
                                    <span class="font-medium text-gray-900 dark:text-white"> How to start with Flowbite library</span></div>
                            <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div>
                            <span class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Public
                            </span>
                        </div>
                    </a>
                </li>
            </ol>
        @empty
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Get back to growth with <span class="text-blue-600 dark:text-blue-500">the world's #1</span> CRM.</h1>
        @endforelse
    </div>
@endsection
