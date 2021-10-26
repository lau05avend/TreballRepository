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
                <form class="px-14" wire:submit.prevent="update()">
                    <div class="form-group">
                        <label for="ImagenPlano">Imagen:</label>
                        <input type="file" name="ImagenPlano" wire:model="image" id="ImagenPlano"><br>
                        @error('image')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <label class="custom-file-label" for="customFile"> --}}
                        @if (isset($image))
                          <div class="m-2 mx-4 inline-block">
                            <img src="{{ $image->temporaryUrl() }}" class="img mt-2 w-32 rounded"><br>
                            <label>{{ $image->getClientOriginalName() }}</label>
                          </div>
                        @elseif ($diseno->ImagenPlano == null)
                            <div class="mb-4 mx-4 inline-block">
                                <img src="{{ 'storage/'.$diseno->ImagenPlano }}" class="img mt-2 w-32 rounded"><br>
                            </div>
                        @else
                            <p>Elegir Imagen</p>
                        @endif
                    {{-- </label> --}}
                    <br>
                    <div class="form-group">
                        <label for="ObservacionDiseno">Observacion Diseño:</label><br>
                        <textarea  name="ObservacionDiseno" class="textarea-form" wire:model="diseno.ObservacionDiseno" id="ObservacionDiseno"><br>
                        </textarea><br>
                        @error('diseno.ObservacionDiseno')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="obra">Obra:</label><br>
                        <select name="obra" wire:model="diseno.obra_id" class="form-select" id="obra">
                            <option value="">Seleccione</option>
                            @forelse ($obra as $o)
                                <option value="{{ $o->id }}">{{ $o->NombreObra }}</option>
                            @empty
                                <option value="">NO HAY OBRAS</option>
                            @endforelse
                        </select><br>
                        @error('diseno.obra_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary close-modal">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditDiseno')">Close</button>
            </div>
        </div>
    </div>
</div>

