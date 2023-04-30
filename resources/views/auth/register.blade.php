<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="register-form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block w-full mt-1" type="text" name="apellidos" :value="old('apellidos')"
                required autofocus autocomplete="apellidos" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir contraseña')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Tengo una cuenta') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        // VALIDACIÓN DEL FORMULARIO DE REGISTRO
        const registerForm = document.getElementById('register-form');
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            const nameInput = document.getElementById('name');
            const apellidosInput = document.getElementById('apellidos');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');

            let errors = false;

            if (!nameInput.value) {
                showError(nameInput, 'Por favor, introduce tu nombre');
                errors = true;
            } else {
                hideError(nameInput);
            }

            if (!apellidosInput.value) {
                showError(nameInput, 'Por favor, introduce tus apellidos');
                errors = true;
            } else {
                hideError(nameInput);
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
            } else if (passwordInput.value.length < 6) {
                showError(passwordInput, 'La contraseña debe tener al menos 6 caracteres');
                errors = true;
            } else {
                hideError(passwordInput);
            }

            if (!passwordConfirmInput.value) {
                showError(passwordConfirmInput, 'Por favor, confirma tu contraseña');
                errors = true;
            } else if (passwordConfirmInput.value.length < 6) {
                showError(passwordConfirmInput, 'La contraseña debe tener al menos 6 caracteres');
                errors = true;
            } else if (passwordInput.value !== passwordConfirmInput.value) {
                showError(passwordConfirmInput, 'Las contraseñas no coinciden');
                errors = true;
            } else {
                hideError(passwordConfirmInput);
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
            const emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</x-guest-layout>
