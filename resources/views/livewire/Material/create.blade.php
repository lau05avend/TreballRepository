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
                        <x-select2 class="inpt form-control" style="width:801px;" id="tipo_material_idReg" name="material.tipo_material_id" modalTipo="CreateMaterial" :options="$TipoMaterial"></x-select2>
                        @error('material.tipo_material_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="color_idReg">Color del Material:</label>
                        <x-select2 class="inpt form-control" style="width:801px;" id="color_idReg" name="material.color_id" modalTipo="CreateMaterial" :options="$color"></x-select2>
                        @error('material.color_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="DescripcionMat">Descripción del Material: </label>
                        <textarea wire:model="material.DescripcionMat" id="DescripcionMat" class="form-control" name="material.DescripcionMat" rows="3"></textarea>
                        @error('material.DescripcionMat') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div><br>

                    <button type="submit" class="btn btn-primary close-modal">Registrar Material</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateMaterial')">Close</button>
            </div>
        </div>
    </div>
</div>


