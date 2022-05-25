<!-- Start properties content bottom -->
@if ($paginator->lastPage() != 1)
    <div class="aa-properties-content-bottom">
        <nav>
            <ul class="pagination">
                <li>
                    <!-- Link alla pagina precedente -->
                    @if ($paginator->currentPage() != 1)
                        <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                    @else
                        <span aria-hidden="true">&laquo;</span>
                    @endif
                </li>
                @for($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="{{ $paginator->currentPage()==$i ? 'active' : '' }}"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li>
                    <!-- Link alla pagina successiva -->
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                    @else
                        <span aria-hidden="true">&raquo;</span>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
@endif
<!-- / End properties content bottom -->
