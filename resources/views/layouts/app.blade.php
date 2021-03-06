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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> --}}

        <!-- Librerias Select2 -->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="{{ asset('assets-admin/bundles/dropzonejs/dropzone.css'); }}" rel="stylesheet">

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

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            var URLp = {!! json_encode(url('/')) !!}
        </script>


    </head>
    <body>

        <div class="loader"></div>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                {{-- <x-admin-content></x-admin-content> --}}
                @livewire('admin.admin-content')
                <div class="main-content mb-12">
                    {{ $slot }}
                </div>
            </div>
        </div>

        {{-- LIBRERIAS JS --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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

        </script>

        <!-- General JS Scripts -->
        <script src={{ asset('assets-admin/js/app.min.js') }}></script>
        <!-- JS Libraies -->
        <script src={{ asset('assets-admin/bundles/apexcharts/apexcharts.min.js')}}></script>
        <!-- Page Specific JS File - Index -->
        <script src={{ asset('assets-admin/js/page/index.js')}}></script>
        <!-- Principal -->
        <script src={{ asset('assets-admin/js/scripts.js')}}></script>
        <!-- nuestros propios js -->
        <script src={{ asset('assets-admin/js/custom.js')}}></script>

        <!-- Libreria Estilos -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{asset('assets-admin/bundles/dropzonejs/min/dropzone.min.js')}}"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" ></script>

        @yield('js')
        @stack('jss')


    </body>
</html>
