
<x-guest-layout>

    @section('css')

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
        {{-- <link rel="stylesheet" type="text/css" href={{ asset("assets-login/css/main-login.css")}}> --}}
    @endsection


<body>
    <div class="limiter">
        <div class="container-login100"
            style="background: linear-gradient(45deg, rgba(7,160,84,1) 0%, rgba(5,130,91,1) 21%, rgba(4,111,92,1) 46%, rgba(10,82,92,1) 73%, rgba(28,84,92,1) 100%);	position:relative;">

            <x-jet-authentication-card style="background: transparent;">
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>

                <div x-data="{ recovery: false }">
                    <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                        {{ __('Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación de autenticación.') }}
                    </div>

                    <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                        {{ __('Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.') }}
                    </div>

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <div class="mt-4" x-show="! recovery">
                            <x-jet-label for="code" value="{{ __('Código') }}" />
                            <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                        </div>

                        <div class="mt-4" x-show="recovery">
                            <x-jet-label for="recovery_code" value="{{ __('Código de recuperación') }}" />
                            <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                            x-show="! recovery"
                                            x-on:click="
                                                recovery = true;
                                                $nextTick(() => { $refs.recovery_code.focus() })
                                            ">
                                {{ __('Usar código de recuperación') }}
                            </button>

                            <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                            x-show="recovery"
                                            x-on:click="
                                                recovery = false;
                                                $nextTick(() => { $refs.code.focus() })
                                            ">
                                {{ __('Usar código de autenticación') }}
                            </button>

                            <x-jet-button class="ml-4">
                                {{ __('Iniciar Sesión') }}
                            </x-jet-button>

                        </div>
                    </form>
                </div>
            </x-jet-authentication-card>





        </div>
    </div>
            </div>
    <div id="dropDownSelect1"></div>




</body>
</x-guest-layout>


