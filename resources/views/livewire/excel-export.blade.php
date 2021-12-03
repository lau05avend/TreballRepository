{{-- <button wire:click="export" type="button" class="btn btn-secondary disabled:opacity-50 disabled:cursor-not-allowed" wire:loading.attr="disabled">
    <i wire:loading class="fas fa-spinner fa-spin"></i>
    {{ $format }}
</button> --}}
<div class="dropdown">
    {{-- {{ $formatEsp }} --}}
    <button class="btn btn-secondary btn-sm dropdown-toggle" wire:loading.attr="disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i wire:loading.class="fas fa-spinner fa-spin" class="fas fa-file-import"></i>
        Reporte General
    </button>
    <div class="dropdown-menu" style="border: 1px solid rgba(0,0,0,.15) !important;" aria-labelledby="dropdownMenuButton">
        @foreach ($format as $format)
            <a class="dropdown-item" wire:click="export('{{$format}}')" type="button" class="btn btn-secondary disabled:opacity-50 disabled:cursor-not-allowed" wire:loading.attr="disabled">
                <i wire:loading class="fas fa-spinner fa-spin"></i>
                {{ $format }}
            </a>
        @endforeach
        {{-- <livewire:excel-export model="Material" format="csv" /> --}}
    </div>
</div>
