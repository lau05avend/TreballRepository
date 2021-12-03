@if (count($breadcrumbs))

    <nav aria-label="breadcrumb" wire:ignore style="margin-top: -1.5%;">
        <ol class="breadcrumb" style="justify-content: flex-end;">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb->url }}">
                            <i class="{{ $breadcrumb->icon }}"></i>
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page"><i class="{{ $breadcrumb->icon }}"></i> {{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ol>
    </nav>

@endif
