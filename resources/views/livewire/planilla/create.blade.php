<div wire:ignore.self class="modal fade overflow-scroll" id="CreatePlanilla" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Planilla de Afiliación</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreatePlanilla')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" id="form-planilla" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="ArchivoPlanilla">Archivo Planilla:</label>
                        <input type="file" class="form-control" name="ArchivoPlanilla" id="ArchivoPlanilla" wire:model="filePlanilla">
                        {{-- <input type="text" class="form-control" name="ArchivoPlanilla" id="ArchivoPlanilla" wire:model="planilla.ArchivoPlanilla">  --}}
                        @error('filePlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FechaPlanilla">Fecha de inicio Vigencia:</label>
                        {{-- <input type="text" wire:model="planilla.FechaPlanilla"> --}}
                        <input type="date" class="form-control" name="FechaPlanilla" id="FechaPlanilla" placeholder="Fecha Inicio">
                        @error('planilla.FechaPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FechaExpiracion">Fecha Expiracion:</label>
                        <input type="date" class="form-control" name="FechaExpiracion" id="FechaExpiracion"  placeholder="Fecha Expiración" readonly>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('planilla.FechaExpiracion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                            <label for="EstadoPlanilla">Estado Planilla:</label>
                            <select class="form-select" wire:model="planilla.EstadoPlanilla" class="inpt" name="EstadoPlanilla" id="EstadoPlanilla">
                                <option value="">Seleccione</option>
                                <option value="vigente">Vigente</option>
                                <option value="vencida">Vencida</option>
                            </select>
                            @error('planilla.EstadoPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="empleado_idReg">Empleado: </label><br>
                        <x-select2 class="inpt form-control" style="width:801px;" id="empleado_idReg" name="planilla.empleado_id" modalTipo="form-planilla" wire:model="planilla.empleado_id" :options="$usuario"></x-select2>
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
@push('jss')
<script>

    document.addEventListener("DOMContentLoaded", () => {

        var form = document.getElementById('form-planilla');

        @this.on('createOpen', function(){
            form.reset();

            $("#FechaPlanilla").val(@this.planilla.FechaPlanilla);
            $("#FechaExpiracion").val(@this.planilla.FechaExpiracion);
        })

        $('#FechaPlanilla').on('change', function (date){
            var dateP = new Date(date.target.value);
            if(date.target.value === ""){
                date.target.value = null;
            }
            @this.set('planilla.FechaPlanilla', date.target.value)
        })

        @this.on('changeF', (fechaPlanilla) =>{
            $("#FechaExpiracion").val(moment(fechaPlanilla).format('YYYY-MM-DD') );
        });

    });
</script>
@endpush
