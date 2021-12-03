
<div wire:ignore.self class="modal fade overflow-scroll" id="EditPlanilla" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Planilla de Afiliación</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditPlanilla')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="update()">
                    <div class="form-group">
                        <label for="ArchivoPlanilla-{{$planilla?$planilla->id:''}}">Archivo Planilla:</label>
                        <input type="file" class="form-control" name="ArchivoPlanilla" id="ArchivoPlanilla-{{$planilla?$planilla->id:''}}" wire:model="filePlanilla">
                        @error('filePlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="FechaPlanillaUpd">Fecha de inicio Vigencia:</label>
                        <input type="date" class="form-control FechaPlanilla" name="FechaPlanilla" id="FechaPlanillaUpd" placeholder="Fecha Inicio">
                        @error('planilla.FechaPlanilla')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FechaExpiracionUpd">Fecha Expiracion:</label>
                        <input type="date" onchange="neh(value)" class="form-control FechaExpiracion" name="FechaExpiracion" id="FechaExpiracionUpd" readonly placeholder="Fecha Expiración">   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('planilla.FechaExpiracion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empleado_idAct">Empleado: </label><br>
                        <x-select2 class="inpt form-control" style="width:801px;" id="empleado_idAct" name="planilla.empleado_id" modalTipo="EditPlanilla" wire:model="planilla.empleado_id" :options="$usuario"></x-select2>
                        @error('planilla.empleado_id')<span class="error text-danger">{{ $message }}</span> @enderror
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
@push('jss')
    <script>

        document.addEventListener("DOMContentLoaded", () => {

            @this.on('FechaExpiracion', (Fechas) =>{
                console.log(Fechas);
                $("#FechaPlanillaUpd").val(moment(Fechas[1]).format('YYYY-MM-DD') );
                $("#FechaExpiracionUpd").val(moment(Fechas[2]).format('YYYY-MM-DD') );
            })

            $('#FechaPlanillaUpd').on('change', function (date){
                var dateP = new Date(date.target.value);
                if(date.target.value === ""){
                    date.target.value = null;
                }
                @this.set('planilla.FechaPlanilla', date.target.value)
            })

            @this.on('changeF', (fechaPlanilla) =>{
                console.log(fechaPlanilla)
                $("#FechaExpiracionUpd").val(moment(fechaPlanilla).format('YYYY-MM-DD') );
            });

        });
    </script>
@endpush

