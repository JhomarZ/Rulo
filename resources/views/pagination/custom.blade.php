@if($paginator->count()>1)
    <ul class="pagination  pagination-sm">
          <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="previous-page disabled"><a class="page-link">&lt;</a></li>
        @else
            <li class="previous-page"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">X</a></li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
            <?php  var_dump("es cadena"); ?>
                <li class="page-item current-page"><a class="page-link" >{{ $element }}</a></li>

            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item current-page active"><span>{{ $page }}</span></li>
                        <?php  var_dump("es idual a currente"); ?>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        <?php  var_dump("es diferente"); ?>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if($paginator->hasMorePages())
            <li class="next-page"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">&gt;</a></li>
        @else
            <li class="next-page" disabled><a disabled class="page-link" href="{{ $paginator->nextPageUrl() }}">&gt;</a></li>
        @endif

    </ul>
@endif
