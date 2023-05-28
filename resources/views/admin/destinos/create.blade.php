@extends('admin.base')
@section('title')
    Admin | Creacción de destinos
@endsection
@section('content')
    <div class="flex items-center justify-center w-full">
        <form action="" method="POST" class="w-3/4 mt-4" id="register-form">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="nombre" id="nombre"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="nombre"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
                    del destino</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="comarca" id="comarca"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="comarca"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Comarca</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="codigo_postal" id="codigo_postal"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="codigo_postal"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Codigo
                    postal</label>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Añadir destino</button>
        </form>
    </div>
    <script>
        // VALIDACIÓN DEL FORMULARIO DE REGISTRO
        const registerForm = document.getElementById('register-form');
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            const nameInput = document.getElementById('nombre');
            const comarcaInput = document.getElementById('comarca');
            const cpInput = document.getElementById('codigo_postal');

            let errors = false;

            if (nameInput.value.length < 3 || !nameInput.value) {
                showError(nameInput, 'Destino no válido. Introduce un destino válido.');
                errors = true;
            } else if (!validarInput(nameInput.value)) {
                showError(nameInput,
                    'Ni números ni símbolos especiales son válidos en este campo. Introduce un valor válido, por favor.'
                );
                errors = true;
            } else {
                hideError(nameInput);
            }

            if (comarcaInput.value.length < 5 || !comarcaInput.value) {
                showError(comarcaInput, 'Comarca introducida válida. Introduce una comarca válida.');
                errors = true;
            } else if (!validarInput(comarcaInput.value)) {
                showError(comarcaInput,
                    'Ni números ni símbolos especiales son válidos en este campo. Introduce un valor válido, por favor.'
                );
                errors = true;
            } else {
                hideError(comarcaInput);
            }

            if (!cpInput.value || !validarCP(cpInput.value)) {
                showError(cpInput, 'Por favor, introduce un código postal válido.');
                errors = true;
            } else {
                hideError(cpInput);
            }

            if (!errors) {
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
            const regex = /^[a-zA-Z\s]+$/;
            return regex.test(input);
        }

        function validarCP(telefono) {

            const regex = /^\d{5,}$/;

            return regex.test(telefono);
        }
    </script>
@endsection
