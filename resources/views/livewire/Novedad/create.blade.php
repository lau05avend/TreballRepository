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

                    <div class="form-group">
                        <label for="EstadoNovedad">Estado Novedad:</label>
                        <select name="EstadoNovedad" wire:model="novedad.EstadoNovedad" class="EstadoNovedad form-select" id="EstadoNovedad">
                            <option value="">Seleccione</option>
                            <option value="1">Sin Atender</option>
                            <option value="2">Atendida</option>
                            <option value="3">En espera</option>
                        </select>
                        @error('novedad.EstadoNovedad')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tiponov">Tipo Novedad:</label>
                        <select class="inpt form-select" wire:model="novedad.tipo_novedad_id" name="tipo_novedad_id" id="tiponov">
                            <option value="">Seleccione su opcion</option>
                            @forelse($Tiponov as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                                <option value="">Ups! No hay disponibles. </option>
                            @endforelse
                        </select>
                        @error('novedad.tipo_novedad_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="DescripcionN">Descripción Novedad:</label><br>
                        <textarea wire:model="novedad.DescripcionN" id="DescripcionN" class="form-control" name="novedad.DescripcionN" rows="3"></textarea>
                        @error('novedad.DescripcionN') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="Activity">Actividad:</label>
                        <x-select2 class="inpt form-control" style="width:801px;" id="actividad_idReg" name="novedad.actividad_id" modalTipo="CreateNovedad" wire:model="novedad.actividad_id" :options="$Act"></x-select2>
                        <select class="inpt form-select" name="actividad_id" wire:model="novedad.actividad_id" id="Activity">
                            <option value="">Seleccione fijo</option>
                            @forelse($Act as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                                <option value="">Ups! No hay disponibles. </option>
                            @endforelse
                        </select>
                        @error('novedad.actividad_id') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="Usu">Empleado:</label>
                        <select class="inpt form-select" wire:model="novedad.empleado_id" name="empleado_id" id="Usu">
                            <option value="">Seleccione</option>
                            @forelse ($Usua as $cl)
                                <option value="{{ $cl->id }}">{{ $cl->NombreCompleto }}</option>
                            @empty
                                <option value="">Ups! Selecciona alguno para continuar </option>
                            @endforelse
                        </select>
                        @error('novedad.empleado_id') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="Cl">Cliente:</label>
                        <select class="inpt form-select" wire:model="novedad.cliente_id" name="cliente_id" id="Cl">
                            <option value="">Seleccione</option>
                            @forelse ($Client as $cl)
                                <option value="{{ $cl->id }}">{{ $cl->NombreCC }}</option>
                            @empty
                                <option value="">Ups! Selecciona algun cliente para continuar </option>
                            @endforelse
                        </select>
                        @error('novedad.cliente_id') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div> --}}


                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateNovedad')">Close</button>
            </div>
        </div>
    </div>
</div>
