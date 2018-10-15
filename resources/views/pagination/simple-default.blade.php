  @if ($paginator->hasPages())
  <ul class="pagination text-center" role="navigation" aria-label="Pagination" style="margin-top: 0;">

          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
                <li class="pagination-previous disabled">Previous</li>
          @else
              <li class="pagination-previous"><a href="{{ $paginator->previousPageUrl() }}">Predhodno</a></li>
          @endif

          {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
            <li class="pagination-next"><a href="{{ $paginator->nextPageUrl() }}">Sljedeće</a></li>
          @else
            <li class="pagination-next disabled">Sljedeće</li>
          @endif
  </ul>
  @endif
