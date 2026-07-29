@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="disabled"><span>&larr; Previous</span></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr; Previous</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="disabled"><span>{{ $element }}</span></span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active" aria-current="page"><span>{{ $page }}</span></span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next &rarr;</a>
        @else
            <span class="disabled"><span>Next &rarr;</span></span>
        @endif

        <span class="muted small" style="border:none;background:none">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>
    </nav>
@endif
