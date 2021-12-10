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
                    <x-dropzone id="photo" name="photo" acceptedFiles=".png, .jpg, .gif, .pdf" model="diseno" paramName="fileUpload"  collection-name="fileUpload" max-file-size="2" max-width="4096" max-height="4096" max-files="12" />
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

                        {{-- @can('material_diseno_save')
                            <div class="mt-12">
                                <h3>Asignar Materiales </h3><br>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="resinaM">Tipo de resina:</label>
                                      <x-select2 wire:ignore class="inpt form-control" modalTipo="CreateDiseno" id="resinaM" name="resinaM" :options="$resina" ></x-select2>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label for="inputPassword4">Cantidad del Material</label>
                                      <input type="number" class="form-control" id="material" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-2 text-right">
                                        <button style="margin-top: 30px; font-size: 18px;" class="btn btn-primary">+</button>
                                    </div>
                                </div>

                                {{ var_dump($resinaC) }}
                                <div class="form-group">
                                    <label for="baseM">Base</label><br>
                                    <x-select2 wire:ignore class="inpt form-control" modalTipo="CreateDiseno" id="baseM" name="baseM" :options="$base" multiple></x-select2>
                                </div>
                                <div class="form-group">
                                    <label for="cauchoM">Caucho EPDM</label><br>
                                    <x-select2 wire:ignore class="inpt form-control" modalTipo="CreateDiseno" id="cauchoM" name="cauchoM" :options="$caucho" multiple></x-select2>
                                </div>
                                <div class="form-group">
                                    <label for="pisoM">Pisos en caucho</label><br>
                                    <x-select2 wire:ignore class="inpt form-control" modalTipo="CreateDiseno" id="pisoM" name="pisoM" :options="$pisos" multiple></x-select2>
                                </div>

                                <br><br>
                            </div>
                        @endcan --}}

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary close-modal">Registrar diseño</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('jss')

<script>

    $('#resinaM').on('change',function(event){
        console.log($('#resinaM').val());
        @this.resinaC = $('#resinaM').val();
    })

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

