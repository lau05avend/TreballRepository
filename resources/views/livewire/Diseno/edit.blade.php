<div wire:ignore.self class="modal fade overflow-scroll" id="EditDiseno" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Diseños</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditDiseno')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-14 mt-6">
                    <p style="font-weight: 500; color: #43475e; font-size: 15px; letter-spacing: 0.5px;" name="photoDiseno">Imagen de planos y diseños:</p>
                    <x-dropzone id="photo" name="photo" acceptedFiles=".png, .jpg, .gif" model="diseno" paramName="fileUpload"  collection-name="fileUpload" max-file-size="2" max-width="4096" max-height="4096" max-files="12" />
                    <form wire:submit.prevent="update()" id="DisenoMCreate">
                        <div class="form-group">
                            @error('images')<span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="ObservacionDiseno">Observacion Diseño:</label><br>
                            <textarea  name="ObservacionDiseno" class="textarea-form" wire:model="diseno.ObservacionDiseno" id="ObservacionDiseno"><br>
                            </textarea><br>
                            @error('diseno.ObservacionDiseno')<span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="obraDisenoC">Obra:</label><br>
                            <x-select2 wire:ignore class="inpt form-control" modalTipo="DisenoMCreate" id="obraDisenoC" name="obraDisenoC" :options="$obra"></x-select2>
                            @error('diseno.obra_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary close-modal">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditDiseno')">Close</button>
            </div>
        </div>
    </div>
</div>

