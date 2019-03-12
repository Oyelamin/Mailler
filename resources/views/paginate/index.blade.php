@if ($paginator->hasPages())
<nav class="pagination is-rounded" style="margin-top:-25px;border: 1px solid silver;border-radius:10px;padding:5px;background:rgb(233, 233, 233);color: white;-webkit-border-radius: 10px;-moz-border-radius: 10px;" role="navigation" aria-label="pagination">
    <ul class="pagination">
            
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled pagination-previous"><span>Previous Page</span></li>
        @else
            <li><a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous Page</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span class="pagination-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li style="background: #DD0202;border:1px solid #dd0202;" class="pagination-link active is-current is-danger"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next page</a></li>
        @else
            <li class="disabled pagination-next"><span>Next page</span></li>
        @endif
    </ul>
</nav>
@endif