@extends('admin.base')
@section('title')
    Admin | Creacción de usuarios
@endsection
@section('content')
    <div class="flex justify-center w-full mt-4">
        <form action="" method="POST" class="w-3/4" id="register-form">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="name" id="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="apellidos" id="apellidos"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="apellidos"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="fecha_nacimiento"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fecha
                    de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    required>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="tlf" id="tlf"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="tlf"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Teléfono</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="password1" id="password1"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="password1"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo
                        Electrónico</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="password2" id="password2"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="password2"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Repetir
                        Contraseña</label>
                </div>
            </div>
            <div class="flex items-center mb-4">
                <input id="is_admin" name="is_admin" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="is_admin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">¿Es
                    administrador?</label>
            </div>
            <div class="flex items-center mb-4">
                <input id="is_guia" name="is_guia" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="is_guia" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">¿Es guia?</label>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir
                usuario</button>
        </form>
    </div>
    <script>
        // VALIDACIÓN DEL FORMULARIO DE REGISTRO
        const registerForm = document.getElementById('register-form');
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            const nameInput = document.getElementById('name');
            const apellidosInput = document.getElementById('apellidos');
            const emailInput = document.getElementById('email');
            const tlfInput = document.getElementById('tlf');
            const passwordInput = document.getElementById('password1');
            const passwordConfirmInput = document.getElementById('password2');
            const fechaNacimientoInput = document.getElementById('fecha_nacimiento');

            var fechaNacimiento = new Date(fechaNacimientoInput.value);
            var hoy = new Date();
            var minEdad = 18;
            var edadMilisegundos = hoy - fechaNacimiento;
            var edadAnios = Math.floor(edadMilisegundos / 1000 / 60 / 60 / 24 / 365);

            let errors = false;

            if (edadAnios < minEdad) {
                showError(fechaNacimientoInput, 'El usuario debe de ser mayor de edad para darse de alta en la aplicación.');
                errors = true;
            } else {
                hideError(fechaNacimientoInput);
            }

            if (nameInput.value.length < 3 || !nameInput.value) {
                showError(nameInput, 'Nombre no válido. Introduce un nombre válido.');
                errors = true;
            } else if (!validarInput(nameInput.value)) {
                showError(nameInput,
                    'Ni números ni símbolos especiales son válidos en este campo. Introduce un nombre válido, por favor.'
                );
                errors = true;
            } else {
                hideError(nameInput);
            }

            if (apellidosInput.value.length < 5 || !apellidosInput.value) {
                showError(apellidosInput, 'Apellidos no válidos. Introduce tus apellidos.');
                errors = true;
            } else if (!validarInput(apellidosInput.value)) {
                showError(apellidosInput,
                    'Ni números ni símbolos especiales son válidos en este campo. Introduce tus apellidos, por favor.'
                );
                errors = true;
            } else {
                hideError(apellidosInput);
            }

            if (!emailInput.value || !isValidEmail(emailInput.value)) {
                showError(emailInput, 'Por favor, introduce una dirección de correo electrónico válida');
                errors = true;
            } else if (emailInput.value.length < 10) {
                showError(emailInput, 'Dirección de correo electrónico no válida');
                errors = true;
            } else {
                hideError(emailInput);
            }

            if (!passwordInput.value) {
                showError(passwordInput, 'Por favor, introduce una contraseña');
                errors = true;
            } else if (!validarContraseña(passwordInput.value)) {
                showError(passwordInput,
                    'La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.'
                );
                errors = true;
            } else {
                hideError(passwordInput);
            }

            if (!passwordConfirmInput.value) {
                showError(passwordConfirmInput, 'Por favor, confirma tu contraseña');
                errors = true;
            } else if (passwordInput.value !== passwordConfirmInput.value) {
                showError(passwordConfirmInput, 'Las contraseñas no coinciden');
                errors = true;
            } else {
                hideError(passwordConfirmInput);
            }

            if (!validarTelefonoMovil(tlfInput.value)) {
                showError(tlfInput,
                    'El número de teléfono móvil no es válido. Introduce un número válido, por favor.');
                errors = true;
            } else {
                hideError(tlfInput);
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


        function isValidEmail(email) {
            // Expresión regular para validar email
            const emailRegex = /^[^\s@]{5,}@[^.\s@]{4,}\.[^.\s@]{2,}$/;
            return emailRegex.test(email);
        }

        function validarInput(input) {
            const regex = /^[a-zA-Z\s]+$/;
            return regex.test(input);
        }

        function validarContraseña(contraseña) {
            /* Requisitos de la contraseña:
            Al menos 8 caracteres
            Al menos una letra mayúscula
            Al menos una letra minúscula
            Al menos un número
            Puede contener caracteres especiales */

            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

            return regex.test(contraseña);
        }

        function validarTelefonoMovil(telefono) {
            /* Requisitos del número de teléfono móvil:
            Debe comenzar con el código de país opcional (puede estar precedido de un signo +)
            Seguido de un guión opcional
            Seguido de al menos 7 dígitos */

            const regex = /^(\+\d{1,3} ?)?\d{7,}$/;

            return regex.test(telefono);
        }
    </script>
@endsection
