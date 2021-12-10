<div wire:ignore.self class="modal fade overflow-scroll" id="EditMaterial" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Material</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditMaterial')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="update()">
                    <div class="form-group">
                        <label for="tipo_material_idAct">Tipo de Material:</label>
                        {{-- <x-select2 class="inpt form-control" style="width:801px;" id="tipo_material_idAct" name="material.tipo_material_id" modalTipo="EditMaterial" :options="$TipoMaterial"></x-select2> --}}
                        <select class="form-control" wire:model="material.tipo_material_id" class="inpt" name="tipo_material_id" id="tipo_material_id">
                            <option value="">Seleccione</option>
                            @forelse ($TipoMaterial as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            <option value="">Ups! Registra clientes para continuar</option>
                            @endforelse
                        </select>
                        @error('material.tipo_material_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="color_idAct">Color del Material:</label>
                        {{-- <x-select2 class="inpt form-control" style="width:801px;" id="color_idAct" name="material.color_id" modalTipo="CreateMaterial" :options="$color"></x-select2> --}}
                        <select class="form-control" wire:model="material.color_id" class="inpt" name="color_id" id="color_id">
                            <option value="">Seleccione</option>
                            @forelse ($color as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            <option value="">Ups! Registra clientes para continuar</option>
                            @endforelse
                        </select>
                        @error('material.color_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DescripcionMat">Descripción del Material: </label>
                        <textarea wire:model="material.DescripcionMat" id="DescripcionMat" class="form-control" name="material.DescripcionMat" rows="3"></textarea>
                        @error('material.DescripcionMat') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div><br>

                    <button type="submit" class="btn btn-primary close-modal">Editar material</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditMaterial')">Close</button>
            </div>
        </div>
    </div>
</div>

