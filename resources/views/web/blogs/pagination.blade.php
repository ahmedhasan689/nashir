@if ($paginator->hasPages())
    <ul class="pagination clearfix">
        @if ($paginator->onFirstPage())
            <li>
                <a href="category-details.html">
                    <i class="far fa-angle-left"></i>
                    {{ __('lang.prev') }}
                </a>
            </li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="far fa-angle-left"></i>
                    {{ __('lang.prev') }}
                </a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if(is_string($element))
                <li>
                    <a href="category-details.html" class="current">
                        {{ $element }}
                    </a>
                </li>
            @endif
            @if(is_array($element))
                @foreach( $element as $page => $url )
                    @if( $page == $paginator->currentPage() )
                            <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if( $paginator->hasMorePages() )
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    {{ __('lang.next') }}
                    <i class="far fa-angle-right"></i>
                </a>
            </li>
        @else
            <li class="disabled">
                <a href="{{ $paginator->nextPageUrl() }}">
                    {{ __('lang.next') }}
                    <i class="far fa-angle-right"></i>
                </a>
            </li>
       @endif

    </ul>
@endif
