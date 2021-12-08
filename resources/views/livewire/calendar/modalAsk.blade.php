<div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" id="modalAsk" data-backdrop="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Elegir Obra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class=" text-2xl">X</span>
                </button>
            </div>
            <div class="modal-body -mb-3" id="formAsk">
                <form class="px-14" wire:submit.prevent="defineObra()" id="DisenoMCreate">
                    <div class="form-group">
                        <label for="ImagenPlano">Seleccione la obra a la que pertenece el Cronograma que desea consultar:</label><br>
                        <x-select2 class="inpt form-control" id="selectObra" modalTipo="staticBackdrop" name="selectObra" :options="$obrasdisp" ></x-select2>
                        {{-- <input type="text" class="form-control" wire:model="inputA"> --}}
                        @error('inputA')<span class="error text-danger">{{ $message }}</span> @enderror

                        <br>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary close-modal">Cambiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('jss')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('#selectObra').on('change', function(event){
            let value = event.target.value;
            console.log(value)
            @this.set('inputA',value);
        });
    })
</script>
@endpush

