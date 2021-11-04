<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('title') @yield('title') @else {{ config('app.name', 'Treball') }} @endif</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Estilos -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

        <!-- Librerias Select2 -->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        {{-- Styles --> --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- General CSS Files -->
        <link rel="stylesheet" href={{asset('assets-admin/css/app.min.css')}}>
        <!-- Template CSS -->
        <link rel="stylesheet" href={{asset('assets-admin/css/style.css')}}>
        <link rel="stylesheet" href="{{ asset('assets-admin/bundles/ionicons/css/ionicons.min.css'); }}">
        {{-- <link rel="stylesheet" href={{ asset('assets-admin/css/components.css')}} > --}}
        <link rel="shortcut icon" type="image/x-icon" href={{ asset('assets-admin/img/logo-icon.svg')}} />

        <!-- Jquery ui css -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

        @livewireStyles
        @yield('css')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            var URLp = {!! json_encode(url('/')) !!}
        </script>


    </head>
    <body>

        <div class="loader"></div>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                {{-- @livewire('navigation-menu') --}}
                    {{-- {{ $header }} --}}
                <x-admin-content></x-admin-content>
                <div class="main-content mb-12">
                    {{ $slot }}
                </div>
            </div>
        </div>

        {{-- LIBRERIAS JS --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        @stack('jss')

        @livewireScripts
        <script type="text/javascript">

            window.livewire.on('a', (a) => {
                alert(a);
            });
            window.livewire.on('closeModal', (modal) => {
                $(modal).modal('hide');
            });
            window.livewire.on('openModal', (show) => {
                $(show).modal('show');
            });
            window.livewire.on('closeShow', () => {
                $('#showModel').modal('hide');
            });

            window.addEventListener('name-updated', event => {
                alert('Name updated to: ' + event.detail.newName);
            })

        </script>

        <!-- General JS Scripts -->
        <script src={{ asset('assets-admin/js/app.min.js') }}></script> {{-- script general --}}
        <!-- JS Libraies -->
        <script src={{ asset('assets-admin/bundles/apexcharts/apexcharts.min.js')}}></script>
        <!-- Page Specific JS File - Index -->
        <script src={{ asset('assets-admin/js/page/index.js')}}></script>
        <!-- Principal -->
        <script src={{ asset('assets-admin/js/scripts.js')}}></script>
        <!-- nuestros propios js -->
        <script src={{ asset('assets-admin/js/custom.js')}}></script>

        <!-- Libreria Estilos -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        @yield('js')

    </body>
</html>
