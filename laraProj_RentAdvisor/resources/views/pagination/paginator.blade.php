<!-- Start properties content bottom -->
@isset($paginator)
    @if ($paginator->lastPage() != 1)
        <div class="aa-properties-content-bottom">
            <div class="col-md-4">
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
                        @for($i = ($paginator->currentPage()-2 >= 1 ? $paginator->currentPage()-2 : 1); $i <= $paginator->lastPage() and $i <= $paginator->currentPage()+2; $i++)
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
        </div>
    @endif
@endisset
<!-- / End properties content bottom -->
