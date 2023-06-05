@extends('admin.base')
@section('title')
    Admin | Creacción de actividades
@endsection
@section('content')
    <div class="flex justify-center w-full my-4">
        <form action="" method="POST" class="w-3/4" id="register-form">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="titulo" id="titulo"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="titulo"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Título</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <textarea name="descripcion" id="descripcion" rows="4"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer resize-none"
                    placeholder=" " required> </textarea>
                <label for="descripcion"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Descripción</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <textarea name="direccion" id="direccion" rows="4"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer resize-none"
                    placeholder=" " required> </textarea>
                <label for="direccion"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" step="0.01" name="precio" id="precio"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="precio"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Precio</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="duracion" id="duracion"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="duracion"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Duración</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select name="destino_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option selected disabled></option>
                        @for ($i = 0; $i < count($destinos); $i++)
                            <option value="{{ $destinos[$i]->id }}">{{ $destinos[$i]->nombre }}</option>
                        @endfor
                    </select>
                    <label for="destino_id"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Destino</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="max_personas" id="max_personas"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="max_personas"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Máx.
                        personas</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select name="user_id"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option selected disabled></option>
                        @for ($i = 0; $i < count($guias); $i++)
                            <option value="{{ $guias[$i]->id }}">{{ $guias[$i]->name }}</option>
                        @endfor
                    </select>
                    <label for="user_id"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Guía
                        asociado</label>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir
                actividad</button>
        </form>
    </div>
    <script>
        // VALIDACIÓN DEL FORMULARIO DE REGISTRO
        const registerForm = document.getElementById('register-form');
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            const tituloInput = document.getElementById('titulo');
            const descInput = document.getElementById('descripcion');
            const dirInput = document.getElementById('direccion');
            const precioInput = document.getElementById('precio');
            const duracionInput = document.getElementById('duracion');
            const maxPersonasInput = document.getElementById('max_personas');

            let errors = false;

            if (tituloInput.value.length < 3 || !tituloInput.value) {
                showError(tituloInput, 'Nombre no válido. Introduce un nombre válido.');
                errors = true;
            } else if (!validarInput(tituloInput.value)) {
                showError(tituloInput,
                    'Ni números ni símbolos especiales son válidos en este campo. Introduce un nombre válido, por favor.'
                );
                errors = true;
            } else {
                hideError(tituloInput);
            }

            if (descInput.value.length < 25 || !descInput.value) {
                showError(descInput, 'Añade una descripción válida.');
                errors = true;
            } else {
                hideError(descInput);
            }

            if (!dirInput.value) {
                showError(dirInput, 'Por favor, introduce una dirección válida');
                errors = true;
            } else {
                hideError(dirInput);
            }

            if (!duracionInput.value) {
                showError(duracionInput, 'Por favor, introduce una contraseña');
                errors = true;
            } else if (!validarPrecio(duracionInput.value)) {
                showError(duracionInput,
                    'La duración introducida no es válida.'
                );
                errors = true;
            } else {
                hideError(duracionInput);
            }

            if (!maxPersonasInput.value) {
                showError(maxPersonasInput, 'Introduce un número de personas máximo');
                errors = true;
            } else if (!validarPrecio(duracionInput.value)) {
                showError(maxPersonasInput,
                    'El número de personas no permite otro valor que no sea numérico, por favor, introduce un valor válido.'
                );
                errors = true;
            } else {
                hideError(maxPersonasInput);
            }

            if (!validarPrecio(precioInput.value)) {
                showError(precioInput,
                    'Introduce un precio en este campo, por favor.');
                errors = true;
            } else {
                hideError(precioInput);
            }

            if (!errors) {
                console.log(errors);
                registerForm.submit(); // Enviar el formulario si no hay errores
            }
        });

        function showError(input, message) {
            // Eliminar mensaje de error anterior si existe
            const previousError = input.parentNode.querySelector('.help-block');
            if (previousError) {
                previousError.parentNode.removeChild(previousError);
            }

            const errorSpan = document.createElement('span');
            errorSpan.classList.add('help-block');
            errorSpan.innerText = message;

            if (input.parentNode.classList.contains('input-group')) {
                input.parentNode.parentNode.insertBefore(errorSpan, input.parentNode.nextSibling);
            } else {
                input.parentNode.insertBefore(errorSpan, input.nextSibling);
            }

            input.classList.add('is-invalid');
        }


        function hideError(input) {
            const errorSpan = input.nextSibling;

            if (errorSpan && errorSpan.classList && errorSpan.classList.contains('help-block')) {
                errorSpan.parentNode.removeChild(errorSpan);
            }

            input.classList.remove('is-invalid');
        }

        function validarInput(input) {
            const regex = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
            return regex.test(input);
        }

        function validarPrecio(precio) {
            const regex = /^\d+(\,\d{1,2})?$/;
            return regex.test(precio);
        }
    </script>
@endsection
