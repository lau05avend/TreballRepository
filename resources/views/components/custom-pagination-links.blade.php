<div style="width: 98.5%;">
    <div class="row" style="margin-left: 1px !important;">
        @if ($paginator->hasPages())
            <div class="col-sm-12 col-md-5">
                {{-- {{ $paginator }} --}}
                <div class="dataTables_info text-sm text-gray-700 leading-5" id="save-stage_info" role="status" aria-live="polite">
                    <span>{!! __('Mostrando') !!}</span>
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    <span>{!! __('a') !!}</span>
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    <span>{!! __('de') !!}</span>
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    <span>{!! __('resultados') !!}</span>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination" role="navigation">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="{!! __('pagination.previous') !!}">
                                <span class="page-link" aria-hidden="true">
                                    <span class="d-md-block">{!! __('pagination.previous') !!}</span>
                                </span>
                            </li>
                        @else
                        <li class="page-item">
                            <button type="button" class="page-link paginate_button" wire:click="previousPage" rel="prev" aria-label="{!! __('pagination.previous') !!}">
                                <span class="d-md-block">{!! __('pagination.previous') !!}</span>
                            </button>
                        </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled d-md-block" aria-disabled="true">
                                    <span class="page-link">{{ $element}}</span>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active d-md-block" aria-current="page">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item d-md-block">
                                            <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <button type="button" class="page-link paginate_button" wire:click="nextPage" rel="next" aria-label="{!! __('pagination.next') !!}">
                                    <span class="d-md-block">{!! __('pagination.next') !!}</span>
                                </button>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="{!! __('pagination.next') !!}">
                                <span class="page-link" aria-hidden="true">
                                    <span class="d-md-block">{!! __('pagination.next') !!}</span>
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

        @endif

    </div>
</div>
