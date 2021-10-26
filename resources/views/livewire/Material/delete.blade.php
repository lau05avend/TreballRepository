<div wire:ignore.self class="modal fade" id="deleteMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#deleteMaterial')" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <p>¿Esta seguro que desea eliminar el registro {{$idM}}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#deleteMaterial')">Close</button>
                <button type="button" wire:click.prevent="deleteConfirm({{$idM}})" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
