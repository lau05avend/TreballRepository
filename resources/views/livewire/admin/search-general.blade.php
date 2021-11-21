<div>
    <style>
        .div-search{
            width: 520px;
        }
        .list-item{
            padding-left: 2px;
        }
        .list-data{
            /* padding-bottom:1.75rem !important; */
        }
    </style>


    <div class="form-inline mr-auto">
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Buscar"
                aria-label="Search"
                data-width="250" style="width: 250px;"
                wire:model="query" wire:keydown.escape="resetData" wire:keydown.tab="resetData"
                wire:keydown.arrow-up="decrementHighlightIndex()"
                wire:keydown.arrow-down="incrementHighlightIndex()"
                wire:keydown.enter="SelectItem"
            />

            <button class="btn" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div wire:loading class="div-search absolute z-10 list-group bg-white rounded rounded-t-none shadow-lg">
        <div class="list-item py-1 pl-1">
            Buscando...
        </div>
    </div>

    @if (!empty($query))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetData"></div>
        <div id="scroll-search" class="div-search absolute z-10 list-group divide-y h-auto border overflow-y-auto border-gray-200 divide-gray-400 bg-white rounded shadow-lg" style="max-height: 16.5rem;">
            @if (!empty($obras))
                @foreach ($obras as $i => $obra)
                    <div class="flex hover:bg-gray-200">
                        <a
                            href="{{ route('obra.edit', $obra['id'] ) }}"
                            class="truncate px-3 py-1 w-full hover:no-underline leading-6 list-data
                            {{ $highlightIndex === $i ? 'bg-blue-100' : '' }}"> {{ $obra['NombreObra'] }}
                        </a>
                    </div>
                @endforeach
            @else
                <div class="list-item py-1">Sin Resultados</div>
            @endif
        </div>
    @endif
</div>
