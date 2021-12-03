<x-slot name="logo">
    <x-jet-authentication-card-logo />
</x-slot>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href={{ asset('assets-admin/img/logo-icon.svg')}} />

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{asset('assets-admin/css/app.min.css')}}>

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets-login/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets-login/css/main-login.css">

    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100"
            style="background: linear-gradient(45deg, rgba(7,160,84,1) 0%, rgba(5,130,91,1) 21%, rgba(4,111,92,1) 46%, rgba(10,82,92,1) 73%, rgba(28,84,92,1) 100%);	position:relative;">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <center>
                    <div class="imagentre">
                        <img src="assets-login/images/Recurso 16.svg" alt="">
                    </div>
                </center><br>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}"><br>
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Iniciar Sesión
                    </span>

                    @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-red-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <x-jet-validation-errors class="mb-4 text-red-600" /><br>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Campo obligatorio.">

                        <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-jet-input id="email" class="input100" type="email" name="email" :value="old('email')"  autofocus />

                        <span class="focus-input100" data-symbol="&#xf206;">

                        {{-- @error('email')<span class="error text-danger">{{ $message }}</span> @enderror --}}

                        <!-- <span class="label-input100">Correo electrónico</span>
						<input class="input100" type="text" name="username" placeholder="ejemplo@gmail.com">
						<span class="focus-input100" data-symbol="&#xf206;"></span> -->
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Campo obligatorio.">

                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <span class="icon-eye" style="position: absolute;right: 0;top: 50px;"><i id="eye" class="fas fa-eye-slash"></i></span>
                        <x-jet-input id="password" class="input100" type="password" name="password" autocomplete="current-password" />
                        <span class="focus-input100" data-symbol="&#xf190;"></span>

                        <!-- <span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Ejemplo305">
						<span class="focus-input100" data-symbol="&#xf190;"></span> -->
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                        </label>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="{{ route('password.request') }}">
                            ¿Has olvidado tu contraseña?
                        </a>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <x-jet-button class="ml-4" class="login100-form-btn">
                                {{ __('Log in') }}
                            </x-jet-button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="assets-login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/bootstrap/js/popper.js"></script>
    <script src="assets-login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets-login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/js/main-login.js"></script>

    <script>
        const iconEye = document.querySelector(".icon-eye");

        iconEye.addEventListener("click", function () {
            const icon = this.querySelector("#eye");

            if(document.getElementById('password').type === "password"){
                console.log(document.getElementById('password').value);
                document.getElementById('password').type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");

            } else {
                document.getElementById('password').type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        });

    </script>

</body>

</html>



