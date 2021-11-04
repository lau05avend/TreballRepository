<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                        <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Titulo del evento...">
                        <span class="error text-danger" id="titleMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        <span class="error text-danger" id="descriptionMessage"></span>
                    </div>

                    <div class="form-group">
                        <label for="start">Inicio de Actividad</label>
                        <input type="datetime-local" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="start">
                        <span class="error text-danger" id="startMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="end">Fin de Actividad</label>
                        <input type="datetime-local" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="end">
                        <span class="error text-danger" id="endMessage"></span>
                    </div><br>
                    <div class="form-group">
                        <label for="estad">Estado de Actividad</label>
                        <select name="estado_actividad_id" class="form-select" id="estado_actividad_id">
                            <option value="">Seleccione</option>
                            @foreach ($estadoA as $e)
                            <option value="{{ $e->id }}">{{ $e->NombreEstado }}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger" id="estado_actividad_idMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="fase_t">Fase de Actividad</label>
                        <select name="fase_tarea_id" class="form-select" id="fase_tarea_id">
                            <option value="">Seleccione</option>
                            @forelse ($faseT as $f)
                            <option value="{{ $f->id }}">{{ $f->NombreFase }}</option>
                            @empty
                            <option value="">No hay fases disponibles</option>
                            @endforelse
                        </select>
                        <span class="error text-danger" id="fase_tarea_idMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="obra_id">Obra: </label>
                        <select name="obra_id" class="form-select" id="obra_id">
                            <option value="">Seleccione</option>
                            @forelse ($obrasdisp as $ob)
                            <option value="{{ $ob->id }}">{{ $ob->NombreObra }}</option>
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
