<div wire:ignore.self class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#deleteConfirm')" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                {{ $body }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#deleteConfirm')">Close</button>
                {{ $method }}
            </div>
        </div>
    </div>
</div>
