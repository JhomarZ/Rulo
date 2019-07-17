@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="previous-page disabled"><a class="page-link">&lt;</a></li>
        @else
            <li class="previous-page"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">&lt;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item current-page active"><a class="page-link" >{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item current-page active"><a class="page-link" >{{ $page }}</a></li>
                    @else
                        <li class="page-item current-page"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next-page"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">&gt;</a></li>
        @else
        <li class="next-page" ><a disabled class="page-link" >&gt;</a></li>
        @endif
    </ul>
@endif
