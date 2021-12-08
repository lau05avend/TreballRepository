<div wire:ignore.self class="modal fade " id="CreateEvento" style="overflow-y: scroll;" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 680px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formulario Actividad</h5>
                <button type="button" class="close" id="close">
                    <span class="text-3xl" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-act" method="POST">

                    @csrf
                    <div class="hidden form-group">
                        <label for="id">ID</label>
                        <input type="text" class="input-event form-control" name="id" id="id" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control input-event" name="title" id="title" aria-describedby="helpId" placeholder="Titulo del evento...">
                        <span class="input-error error text-danger" id="titleMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control input-event" name="description" id="description" rows="3"></textarea>
                        <span class="input-error error text-danger" id="descriptionMessage"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="start">Inicio de Actividad</label>
                            <input type="datetime-local" class="form-control input-event" name="start" id="start" aria-describedby="helpId" placeholder="start">
                            <span class="input-error error text-danger" id="startMessage"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="end">Fin de Actividad</label>
                            <input type="datetime-local" class="form-control input-event" name="end" id="end" aria-describedby="helpId" placeholder="end">
                            <span class="input-error error text-danger" id="endMessage"></span>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="estad">Estado de Actividad</label><br>
                        <select name="estado_actividad_id" class="form-control form-select input-event" id="estado_actividad_id">
                            @foreach ($estadoA as $e)
                            <option value="{{ $e->id }}">{{ $e->NombreEstado }}</option>
                            @endforeach
                        </select>
                        <span class="input-error error text-danger" id="estado_actividad_idMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="fase_t">Fase de Actividad</label><br>
                        <select name="fase_tarea_id" class="form-control form-select input-event" id="fase_tarea_id">
                            <option value="">Seleccione</option>
                            @forelse ($faseT as $f)
                            <option value="{{ $f->id }}">{{ $f->NombreFase }}</option>
                            @empty
                            <option value="">No hay fases disponibles</option>
                            @endforelse
                        </select>
                        <span class="input-error error text-danger" id="fase_tarea_idMessage"></span>
                    </div>
                    <div class="form-group hidden">
                        <label for="obra_id">Obra: </label><br>
                        <select name="obra_id" class="form-control form-select input-event" id="obra_id">
                            <option value="">Seleccione</option>
                            @forelse ($obrasdisp as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            <option value="">No hay obras disponibles</option>
                            @endforelse
                        </select>
                        <span class="input-error error text-danger" id="obra_idMessage"></span>
                    </div>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checkbox" id="asignUs" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Asignar Usuarios</span>
                    </label>
                    <div class="form-group mt-4 hidden" id="userGroup">
                        <h3>Asignar usuarios </h3><br>

                            <div id="accordion" wire:ignore>
                                <h3>Ingenieros</h3>
                                <div>
                                    @forelse ($users->where('rol_id',4) as $u)
                                        @if ($u->Rol->NombreRol == 'Ingeniero')
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Ingeniero[]" value="{{$u->id}}" id="id_ingC{{ $u->id }}">
                                                <label class="form-check-label" for="id_ingC{{ $u->id }}">
                                                    {{$u->id.' . '.$u->NombreCompleto}}
                                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$u->EstadoUsuario }}
                                                </label>
                                            </div><br>
                                        @endif
                                    @empty
                                    <div class="form-check">
                                        <p>
                                            NO HAY INGENIEROS ASIGNADOS.
                                        </p>
                                    </div>
                                    @endforelse
                                </div>
                                <h3>Instaladores</h3>
                                <div>
                                    @forelse ($users->where('rol_id',3) as $u)
                                        @if ($u->Rol->NombreRol == 'Instalador')
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Instalador[]" value="{{$u->id}}" id="id_instC{{ $u->id }}">
                                                <label class="form-check-label" for="id_instC{{ $u->id }}">
                                                    {{$u->id.' . '.$u->NombreCompleto}}
                                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$u->EstadoUsuario }}
                                                </label>
                                            </div><br>
                                        @endif
                                    @empty
                                    <div class="form-check">
                                        <p>
                                            NO HAY INSTALADORES ASIGNADOS.
                                        </p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-secondary" id="closebtn">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnSave">Guardar</button>
            </div>
        </div>
    </div>
</div>

@push('jss')
<script>
    $('#asignUs').click(function(){
            if($(this).is(":checked")){
                $('#userGroup').removeClass('hidden');
            }
            else if($(this).is(":not(:checked)")){
                $('#userGroup').addClass('hidden');
                usersI.forEach(element => {
                if(element.rol_id == 4){
                    $("#id_ingC"+element.id).attr('checked', true)
                }
                else if(element.rol_id == 3){
                    $("#id_instC"+element.id).attr('checked', true)
                }
            });

            }
    });

    function clearCheckboxCreate(){
        var users = @json($users);
        users.forEach(element => {
            $('#id_ingC'+element.id).attr('checked', false)
            $("#id_instC"+element.id).attr('checked', false)
        })
    }

    function setCheckbox(){
        var usersI = @this.asignadosE;
        usersI.forEach(element => {
            if(element.rol_id == 4){
                $("#id_ingC"+element.id).attr('checked', true)
            }
            else if(element.rol_id == 3){
                $("#id_instC"+element.id).attr('checked', true)
            }
        });
    }
    function clearBox(){
        var usersI = @this.asignadosE;
        usersI.forEach(element => {
                $("#id_ingC"+element.id).attr('checked', false)
                $("#id_instC"+element.id).attr('checked', false)
        });
    }

    $('#CreateEvento').on('show.bs.modal', function () {
        $("#accordion").accordion({
            collapsible: true,
            heightStyle: "content"
        });
        $('#obra_id').val(numObra);
    })

    $('#CreateEvento').on('shown.bs.modal', function () {
        setCheckbox();
        if(@this.asignadosE.length > 0) {
            $("#asignUs").attr('checked', true)
            $('#userGroup').removeClass('hidden');
        }
    })

    $('#CreateEvento').on('hide.bs.modal', function () {
        clearCheckboxCreate();
        @this.set('asignadosE', [])
    });

</script>

@endpush
