
<div wire:ignore.self class="modal fade overflow-scroll" id="EditPlanilla" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditPlanilla')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="update()">


                <div class="form-group">
                        <label for="ArchivoPlanilla">Archivo Planilla:</label>
                        <input type="text" name="ArchivoPlanilla" id="ArchivoPlanilla" wire:model="planilla.ArchivoPlanilla" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('planilla.ArchivoPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                <div class="form-group">
                        <label for="FechaExpiracion">Fecha Expiracion:</label>
                        <input type="datetime-local" name="FechaExpiracion" id="FechaExpiracion" wire:model="planilla.FechaExpiracion" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('planilla.FechaExpiracion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                    <div class="form-group">
                            <label for="EstadoPlanilla">Estado Planilla:</label>
                            <select class="form-select" wire:model="planilla.EstadoPlanilla" class="inpt" name="EstadoPlanilla" id="EstadoPlanilla">
                                <option value="">Seleccione</option>
                                <option value="vigente">Vigente</option>
                                <option value="vencida">Vencida</option>

                            </select>
                            @error('planilla.EstadoPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror

                    </div>




                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditPlanilla')">Close</button>
            </div>
        </div>
    </div>
</div>

