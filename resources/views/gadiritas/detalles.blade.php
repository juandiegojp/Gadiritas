@extends('gadiritas.base')
@section('title')
    Gadiritas - detalles
@endsection
@section('content')

<div class="mx-6 mb-12">
    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
        {{ $actividad->titulo }}</h1>


    <div class="grid grid-cols-2 gap-4">
        <div class="figure">
            <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}4.jpg") }}"
                    alt="image description">
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
        </div>
        <div class="figure">
            <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}3.jpg") }}"
                    alt="image description">
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
        </div>
        <div class="figure">
            <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}2.jpg") }}"
                    alt="image description">
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
        </div>
        <div class="figure">
            <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                <img class="rounded-lg" src="{{ Vite::asset("resources/images/{$actividad->id}.jpg") }}"
                    alt="image description">
                <figcaption class="absolute px-4 text-lg text-white bottom-6">
                    <p>Do you want to get notified when a new component is added to Flowbite?</p>
                </figcaption>
            </figure>
        </div>
    </div>

    <div class="flex justify-center items-start my-6" id="bottom">
        <div class="w-1/2">
            <p class="mb-2 text-xl font-bold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl">Descripción</p>
            {!! nl2br(e($actividad->descripcion)) !!}
        </div>
        <div class="w-1/2" id="reserva">
            <form action="" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="act_id" value="{{$actividad->id}}">
                @include('gadiritas.calendar')
                <div>
                    <label for="n_personas">Selecciona una hora:</label>
                    <select name="hora" id="hora">
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                    </select>
                </div>
                <div>
                    <label for="n_personas">Nº de personas:</label>
                    <select name="n_personas" id="n_personas">
                        @for ($i = 1; $i < $actividad->max_personas+1; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit">Reservar</button>
            </form>
        </div>
    </div>

</div>
@endsection
