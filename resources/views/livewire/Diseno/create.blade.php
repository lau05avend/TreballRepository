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
                <div class="px-14">
                    <x-dropzone id="photo" name="photo" paramName="fileUpload" collection-name="fileUpload" max-file-size="2" max-width="4096" max-height="4096" max-files="4" />
                    <form wire:submit.prevent="store()" id="DisenoMCreate">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="ImagenPlano">Imagen:</label>
                            <input type="file" name="ImagenPlano" wire:model="image" id="ImagenPlano"><br>
                            @error('image')<span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="ObservacionDiseno">Observacion Diseño:</label><br>
                            <textarea  name="ObservacionDiseno" class="textarea-form" wire:model="diseno.ObservacionDiseno" id="ObservacionDiseno"><br>
                            </textarea><br>
                            @error('diseno.ObservacionDiseno')<span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="obraDisenoC">Obra:</label><br>
                            <x-select2 wire:ignore class="inpt form-control" id="obraDisenoC" name="obraDisenoC" :options="$obra"></x-select2>
                            @error('diseno.obra_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{ $diseno->obra_id }}

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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateDiseno')">Close</button>
            </div>
        </div>
    </div>
</div>
@push('jss')
<script>
    // Dropzone.options.mydropzone = {
    //     dictDefaultMessage: "Arrastre o seleccione las imagenes",
    //     paramName: 'fileUpload'
    //     method: "post",
    //     header:{
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     // maxFilesize: 2,
    //     acceptedFiles: ".png, .jpg, .gif"
    // }
    document.addEventListener("DOMContentLoaded", () => {

        if( $('#obraDisenoC').val() == "null"){
            $("#obraDisenoC option[value='null']").remove();
            $('#obraDisenoC').val(null).trigger('change');
        }

        $('#obraDisenoC').on('change', function(dataInput) {
            let data = dataInput.target.value;
            @this.set('diseno.obra_id', data)
        })

    })
</script>
@endpush

