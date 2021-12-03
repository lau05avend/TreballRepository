{{-- @extends('partials/nav')--}}

<x-app-layout>
    @section('title','Cronograma')

    @section('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.css">
        <link rel="stylesheet" href="{{ asset('css/styles-calendar.css') }}">
    @endsection

    <div>
        {{ Breadcrumbs::render('calendario', $idobr) }}
        @livewire('calendar.index',[$idobr->id])
    </div>

    {{-- <div class="card p">
        <div class="card-header">
            <span class="text-4xl w-full text-gray-900 mb-10 text-center mt-4">Cronograma de Actividades</span>
        </div>
        <div class="card-body">
            <div class="mb-9 position-relative">
                <div id="loading">
                    <span>CARGANDO...</span>
                </div>
                <button class="btn btn-outline-dark position-absolute -top-14 right-8" data-toggle="tooltip" data-placement="top" title="Tooltip idk on top" id="newActividad">NUEVO</button>
                <div id="calendar"></div>
            </div>
        </div>
        <div>
            @include('funcionalidades.calendar.create')
            @include('funcionalidades.calendar.edit')
        </div>
    </div> --}}

    @push('jss')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/locales-all.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script>
            var numObra = {!! json_encode($idobr->id) !!}
            var obraModal = {!! json_encode($obraModal) !!}

        </script>
        @include('sweetalert::alert')

        {{-- <script src="{{ asset('js/calendar.js') }}" defer></script> --}}

    @endpush



</x-app-layout>
