<div wire:ignore.self class="modal fade overflow-scroll" data-backdrop="modal" id="modalMessage" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class=" text-2xl">X</span>
                </button>
            </div>
            <div class="modal-body -mb-3" id="formMessage">
                <div class="px-14" id="DisenoMCreate">
                    <span></span>
                    <p>
                        Usted no esta asignado a ninguna obra, por lo tanto, no esta autorizado para consultar el calendario.
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>
@push('jss')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var obraModal = {!! json_encode(session('noObra')) !!}

        if(obraModal){
            $('#modalMessage').modal('show');
        }

    })


</script>
@endpush

