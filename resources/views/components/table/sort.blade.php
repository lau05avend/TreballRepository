@if($field)
    @if($sortBy !== $field)
        <i wire:click="sortBy('{{ $field }}')" class="fa fa-fw fa-sort cursor-pointer sorting" aria-hidden="true"></i>
    @elseif($sortBy === $field && $sortDirection == 'desc')
        <i wire:click="sortBy('{{ $field }}')" class="fa fa-fw fa-sort-down cursor-pointer sorting text-blue-500" aria-hidden="true"></i>
        {{-- <i wire:click="sortBy('{{ $field }}')" class="ion-ios-arrow-thin-down text-blue-500" aria-hidden="true"></i> --}}
    @else
        <i wire:click="sortBy('{{ $field }}')" class="fa fa-fw fa-sort-up cursor-pointer sorting text-blue-500" aria-hidden="true"></i>
    @endif
@endif
