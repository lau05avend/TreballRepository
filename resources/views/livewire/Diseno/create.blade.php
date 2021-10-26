<div wire:ignore.self class="modal fade overflow-scroll" id="CreateDiseno" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Diseño</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateDiseno')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body -mb-3">
                <form class="px-14" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="ImagenPlano">Imagen:</label>
                        <input type="file" name="ImagenPlano" wire:model="image" id="ImagenPlano"><br>
                        @error('image')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <label class="custom-file-label" for="customFile"> --}}
                        @if (isset($image))
                          <div class="mb-4 mx-4 inline-block">
                            <img src="{{ $image->temporaryUrl() }}" class="img mt-2 w-32 rounded"><br>
                            <label>{{ $image->getClientOriginalName() }}</label>
                          </div>
                        @else
                          Elegir Imagen
                        @endif
                    {{-- </label> --}}
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

                    {{-- <div class="form-group">
                        <h3>Asignar Materiales </h3><br>
                        <form method="POST" class="form-as" wire:submit.prevent="ObraUsuarios" }}">

                            @forelse ($users as $u)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model.defer="Usuarios" name="Usuarios" value="{{$u->id}}" id="{{ $u->id }}">
                                <label class="form-check-label" for="{{ $u->id }}">
                                    {{$u->id.' . '.$u->NombreCompleto}}
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$u->EstadoUsuario }}
                                </label>
                            </div><br>
                            @empty
                            <p>
                                NO HAY USUARIOS DISPONIBLES.
                            </p>
                            @endforelse
                            <br><br>
                        </form>
                    </div> --}}

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary close-modal">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateDiseno')">Close</button>
            </div>
        </div>
    </div>
</div>


