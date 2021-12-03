@if ($openShow)
<div wire:ignore.self class="modal fade overflow-scroll" id="ShowDiseno" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 890px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="float-left" style="flex: auto;margin-right: 34px;">
                    <p class="modal-title display-6 ml-2 max-w-md text-3xl" id="exampleModalLabel">Obra: {{ $diseno->Obra->NombreObra }}</p>
                </div>
                <div class="float-right w-72 text-right" style="flex: auto;margin-right: 2px;">
                    <p><strong>Información actualizada en: </strong><br>{{ $diseno?date('d-m-Y h:i A', strtotime($diseno->updated_at )) :'-' }}</p>
                </div>

                <div class="position-relative" style="width: 40px;">
                    <button type="button" class="close position-absolute" wire:click.prevent="cerrarmodal('#ShowDiseno')" aria-label="Close">
                        <span aria-hidden="true close-btn">X</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    {{ $diseno }}
                </div>
                <div>
                    <br><br><br>
                    {{ $diseno?$diseno->Images:'' }}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#ShowDiseno')">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

