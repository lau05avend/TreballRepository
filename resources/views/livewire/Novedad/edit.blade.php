<div wire:ignore.self class="modal fade overflow-scroll" id="EditNovedad" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Novedad</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditNovedad')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="update()">
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
                        <x-select2 class="form-control" id="actividad_idActu" modalTipo="EditNovedad" name="novedad.actividad_id" wire:model="novedad.actividad_id" :options="$Act"></x-select2>
                        <select class="inpt form-select" name="actividad_id" wire:model="novedad.actividad_id" id="Activity">
                            <option value="">Seleccione</option>
                            @forelse($Act as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                                <option value="">Ups! No hay disponibles. </option>
                            @endforelse
                        </select>
                        @error('novedad.actividad_id') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditNovedad')">Close</button>
            </div>
        </div>
    </div>
</div>
