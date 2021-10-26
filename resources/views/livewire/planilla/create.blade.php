<div wire:ignore.self class="modal fade overflow-scroll" id="CreatePlanilla" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Novedad</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreatePlanilla')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="ArchivoPlanilla">Archivo Planilla:</label>
                        <input type="text" class="form-control" name="ArchivoPlanilla" id="ArchivoPlanilla" wire:model="planilla.ArchivoPlanilla">  {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('planilla.ArchivoPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FechaExpiracion">Fecha Expiracion:</label>
                        <input type="datetime-local" class="form-control" name="FechaExpiracion" id="FechaExpiracion" wire:model="planilla.FechaExpiracion" placeholder="Fecha Expiración">   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('planilla.FechaExpiracion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                            <label for="EstadoPlanilla">Estado Planilla:</label>
                            <select class="form-select" wire:model="planilla.EstadoPlanilla" class="inpt" name="EstadoPlanilla" id="EstadoPlanilla">
                                <option value="">Seleccione</option>
                                <option value="vigente">Vigente</option>
                                <option value="vencida">Vencida</option>
                            </select>
                            @error('planilla.EstadoPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empleado_id">Empleado: </label>
                        <select class="form-select" wire:model="planilla.empleado_id" class="inpt" name="empleado_id" id="empleado_id">
                            <option value="">Seleccione</option>
                            @forelse ($usuario as $em)
                            <option value="{{ $em->id }}">{{ $em->NombreCompleto }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                            @endforelse
                        </select>
                        @error('planilla.empleado_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreatePlanilla')">Close</button>
            </div>
        </div>
    </div>
</div>
