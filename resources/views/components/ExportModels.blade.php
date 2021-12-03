<div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" wire:loading.attr="disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i wire:loading class="fas fa-spinner fa-spin"></i>
            Reporte General
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <livewire:excel-export model="Material" format="csv" />
            <livewire:excel-export model="Material" format="xlsx" />
            <livewire:excel-export model="Material" format="pdf" />
        </div>
    </div>
</div>
