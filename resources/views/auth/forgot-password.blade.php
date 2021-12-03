<x-guest-layout>
    @section('css')
        <link rel="stylesheet" type="text/css" href="assets-login/fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href={{asset('assets-admin/css/app.min.css')}}>
    <!--===============================================================================================-->

        <link rel="stylesheet" type="text/css" href="{{ asset('assets-login/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-login/css/main-login.css') }}">

    @endsection
    @section('title', 'Recuperar Contraseña')

    <div class="limiter">
        <div class="container-login100"
            style="background: linear-gradient(45deg, rgba(7,160,84,1) 0%, rgba(5,130,91,1) 21%, rgba(4,111,92,1) 46%, rgba(10,82,92,1) 73%, rgba(28,84,92,1) 100%);	position:relative;">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <center>
                    <div class="imagentre">
                        <img src="assets-login/images/logo-icon.svg" alt="">
                    </div>
                </center><br>


                <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}"><br>
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Recuperar Contraseña
                    </span>

                    <div class="mb-4 text-sm text-gray-600" style="    font-size: .975rem; text-align: justify; text-justify: inter-word;">
                        {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña el cual le permitirá elegir una nueva.') }}
                    </div>
                    <x-jet-validation-errors class="mb-3 text-red-600" /><br>
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Campo obligatorio.">

                        <x-jet-label for="email" style="font-size: .975rem; color: #423c3c;" value="{{ __('Correo electrónico') }}" />
                        <x-jet-input id="email" class="input100" type="email" name="email" :value="old('email')"  autofocus />
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    <br>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <x-jet-button class="ml-4" style="font-weight: 500;" class="login100-form-btn">
                                {{ __('Restablecer Contraseña') }}
                            </x-jet-button>

                        </div>
                    </div>
                    <br>
                    <div class="text-right p-t-8 p-b-31">
                        <a href="{{ route('login') }}">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                            Iniciar sesión
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @section('js')
    <!--===============================================================================================-->
    <script src="assets-login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="assets-login/js/main-login.js"></script>
    @endsection
</x-guest-layout>
