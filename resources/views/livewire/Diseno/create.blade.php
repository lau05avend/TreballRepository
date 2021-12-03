<div wire:ignore.self class="modal fade overflow-scroll" id="CreateDiseno" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" style="max-width: 100%; width: 700px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Diseño</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateDiseno')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body -mb-3">
                <div class="px-14 mt-6">
                    <p style="font-weight: 500; color: #43475e; font-size: 15px; letter-spacing: 0.5px;" name="photoDiseno">Imagen de planos y diseños:</p>
                    <x-dropzone id="photo" name="photo" acceptedFiles=".png, .jpg, .gif" model="diseno" paramName="fileUpload"  collection-name="fileUpload" max-file-size="2" max-width="4096" max-height="4096" max-files="12" />
                    <form wire:submit.prevent="store()" id="DisenoMCreate">
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

                        @can('material_diseno_save')
                            <div class="form-group">
                                <h3>Asignar Materiales </h3><br>
                                {{-- <form method="POST" class="form-as" wire:submit.prevent="MaterialDiseno"> --}}
                                    @forelse ($materials as $m)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Usuarios" value="{{$m->id}}" id="{{ $m->id }}">
                                        <label class="form-check-label" for="{{ $m->id }}">
                                            {{$m->id.' . '.$m->NombreCompleto}}
                                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$m->EstadoUsuario }}
                                        </label>
                                    </div><br>
                                    @empty
                                    <p>
                                        NO HAY USUARIOS DISPONIBLES.
                                    </p>
                                    @endforelse
                                    <br><br>
                                {{-- </form> --}}
                            </div>
                        @endcan

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

    var form = document.getElementById('photo');
    @this.on('modalOpen', function(){
            form.reset();
    })

    @this.on('disenosUpdate', function (){
        @this.images = JSON.parse(localStorage.getItem('upload'));
    })
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

