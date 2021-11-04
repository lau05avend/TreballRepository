{{-- @extends('partials/nav')--}}

<x-app-layout>
    @section('title','Cronograma')

    @section('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.css">
        <style>
            .fc .fc-daygrid-day.fc-day-today{
                background-color: #23968930;
            }

            .fc .fc-col-header-cell-cushion{
                color: #5b65ad;
            }

        </style>
    @endsection

    <div class="">
        <h1 class="display-6 text-gray-900 mb-16 text-center mt-0">Cronograma de Actividades</h1>
        <div class="mb-9 position-relative">
            <div id="loading">
                <span>CARGANDO...</span>
            </div>
            <button class="btn btn-outline-dark position-absolute -top-14 right-8" id="newActividad">NUEVO</button>
            <div id="calendar"></div>
        </div>
        <div>
            @include('funcionalidades.calendar.create')
            {{-- @include('funcionalidades.calendar.edit') --}}
        </div>
    </div>

    @push('jss')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/locales-all.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script>
            var numObra = {!! json_encode($idobr) !!}
        </script>
        @include('sweetalert::alert')
        <script src="{{ asset('js/calendar.js') }}" defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    @endpush



</x-app-layout>
