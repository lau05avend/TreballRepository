<div wire:ignore.self class="modal fade overflow-scroll" id="CreateMaterial" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Material</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateMaterial')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="tipo_material_id">Tipo de Material:</label>
                        <select class="form-select" wire:model="material.tipo_material_id" class="inpt" name="tipo_material_id" id="tipo_material_id">
                            <option value="">Seleccione</option>
                            @forelse ($TipoMaterial as $tipoM)
                            <option value="{{ $tipoM->id }}">{{ $tipoM->NombreTipoM }}</option>
                            @empty
                            <option value="">Ups! Registra clientes para continuar</option>
                            @endforelse
                        </select>
                        @error('material.tipo_material_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="color_id">Color del Material:</label>
                        <select class="form-select" wire:model="material.color_id" class="inpt" name="color_id" id="color_id">
                            <option value="">Seleccione</option>
                            @forelse ($color as $cl)
                            <option value="{{ $cl->id }}">{{ $cl->Ncolor }}</option>
                            @empty
                            <option value="">Ups! Registra clientes para continuar</option>
                            @endforelse
                        </select>
                        @error('material.color_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="DescripcionMat">Descripción del Material: </label>
                        <textarea wire:model="material.DescripcionMat" id="DescripcionMat" class="form-control" name="material.DescripcionMat" rows="3"></textarea>
                        @error('material.DescripcionMat') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div><br>

                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateMaterial')">Close</button>
            </div>
        </div>
    </div>
</div>
