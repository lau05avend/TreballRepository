{{-- @extends('partials/nav')

@section('title','Cronograma') --}}

<x-app-layout>

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

        <!-- Modal -->
        <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Actividades</h5>
                        <button type="button" class="close" id="close">
                            <span class="text-3xl" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-act" method="POST">

                            @csrf
                            <div class="hidden form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId"
                                    placeholder="">
                                @error($errors) <small id="helpId" class="form-text text-muted">{{ $error }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    aria-describedby="helpId" placeholder="Titulo del evento...">
                                @error($errors) <small id="helpId"
                                    class="form-text text-muted">{{ first('title') }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="start">start</label>
                                <input type="datetime-local" class="form-control" name="start" id="start"
                                    aria-describedby="helpId" placeholder="start">
                                @error($errors) <small id="helpId" class="form-text text-muted">{{ $error }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end">end</label>
                                <input type="datetime-local" class="form-control" name="end" id="end"
                                    aria-describedby="helpId" placeholder="end">
                                @error($errors) <small id="helpId" class="form-text text-muted">{{ $error }}</small>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="estad">Estado de Actividad</label>
                                <select name="estado_actividad_id" class="form-select" id="estad">
                                    <option value="">Seleccione</option>
                                    @foreach ($estadoA as $e)
                                    <option value="{{ $e->id }}">{{ $e->NombreEstado }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fase_t">Fase de Actividad</label>
                                <select name="fase_tarea_id" class="form-select" id="fase_t">
                                    <option value="">Seleccione</option>
                                    @forelse ($faseT as $f)
                                    <option value="{{ $f->id }}">{{ $f->NombreFase }}</option>
                                    @empty
                                    <option value="">No hay fases disponibles</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="obra_id">Obra: </label>
                                <select name="obra_id" class="form-select" id="obra_id">
                                    <option value="">Seleccione</option>
                                    @forelse ($obra as $f)
                                    <option value="{{ $f->id }}">{{ $f->NombreObra }}</option>
                                    @empty
                                    <option value="">No hay obras disponibles</option>
                                    @endforelse
                                </select>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" id="close">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('jss')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/locales-all.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script src="{{ asset('js/calendar.js') }}" defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    @endpush



</x-app-layout>
