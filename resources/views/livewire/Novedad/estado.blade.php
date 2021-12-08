<div wire:ignore.self class="modal fade overflow-scroll" id="CambiarNovedad" data-backdrop="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" style="max-width: 95%; width: 730px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar estado novedad</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CambiarNovedad')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="setEstado()">

                    <div class="form-group">
                        <label for="tipo_novedad_idAct">Estado:</label>
                        <select class="inpt form-control" name="tipo_novedad_id" wire:model="novedad.tipo_novedad_id" id="tipo_novedad_idAct">
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
                        @error('novedad.tipo_novedad_id') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary close-modal">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CambiarNovedad')">Close</button>
            </div>
        </div>
    </div>
</div>


