<div wire:ignore.self class="modal fade overflow-scroll" id="CreateNovedad" data-backdrop="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" style="max-width: 95%; width: 730px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Novedad</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateNovedad')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="AsuntoN">Asunto Novedad:</label>
                        <input type="text" class="form-control" name="novedad.AsuntoNovedad" wire:model="novedad.AsuntoNovedad" id="AsuntoN" placeholder="Asunto Novedad">
                        @error('novedad.AsuntoNovedad')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
{{--
                    <div class="form-group">
                        <label for="EstadoNovedad">Estado Novedad:</label>
                        <select name="EstadoNovedad" wire:model="novedad.EstadoNovedad" class="EstadoNovedad form-select" id="EstadoNovedad">
                            <option value="">Seleccione</option>
                            <option value="1">Sin Atender</option>
                            <option value="2">Atendida</option>
                            <option value="3">En espera</option>
                        </select>
                        @error('novedad.EstadoNovedad')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="DescripcionN">Descripción Novedad:</label><br>
                        <textarea wire:model="novedad.DescripcionN" id="DescripcionN" class="form-control" name="novedad.DescripcionN" rows="3"></textarea>
                        @error('novedad.DescripcionN') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="obra_idReg">Obra:</label>
                        <x-select2 class="inpt form-control" style="width:801px;" id="obra_idReg" name="obraSel" modalTipo="CreateNovedad" :options="$obras"></x-select2>
                    </div>
                    <div class="form-group">
                        <label for="actividad_idReg">Actividad:</label>
                        <select class="inpt form-control" name="actividad_id" wire:model="novedad.actividad_id" id="actividad_idReg">
                            {{-- <option value="">Seleccione Actividad</option> --}}
                            @forelse($Act as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                                @if ($obraSel == null)
                                    <option value="">seleccione obra </option>
                                @else
                                    <option value="">Ups! No hay actividades registradas. </option>
                                @endif
                            @endforelse
                        </select>
                        @error('novedad.actividad_id') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateNovedad')">Close</button>
            </div>
        </div>
    </div>
</div>

@push('jss')
<script>
    $('#obra_idReg').on('change', function(e){
        @this.set('obraSel', e.target.value);
    })
    $('#actividad_idReg').on('change', function(e){
        @this.set('novedad.actividad_id', e.target.value);
    })
    $('#CreateNovedad').on('hidden.bs.modal', function(){
        @this.set('obraSel', null);
        $('#obra_idReg').select2().select2('val',@this.obraSel);
    })
</script>
@endpush

