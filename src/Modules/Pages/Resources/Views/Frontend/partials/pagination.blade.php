<?php
$link_limit = 7; // maximum number of links
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination" role="navigation" aria-label="Pagination">

        @if($paginator->currentPage() == 1)
            <li class="pagination-previous disabled"><span class="show-for-sr">page</span></li>
        @else
            <li class="pagination-previous">
                <a href="{{ $paginator->url($paginator->currentPage()-1) }}" aria-label="Previous page"><span class="show-for-sr">page</span></a>
            </li>
        @endif

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
			<?php
			$half_total_links = floor($link_limit / 2);
			$from = $paginator->currentPage() - $half_total_links;
			$to = $paginator->currentPage() + $half_total_links;
			if ($paginator->currentPage() < $half_total_links) {
				$to += $half_total_links - $paginator->currentPage();
			}
			if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
				$from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
			}
			?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' current' : '' }}">
                    <a href="{{ $paginator->url($i) }}" aria-label="Page {{ $i }}">{{ $i }}</a></li>
            @endif
        @endfor

        @if($paginator->currentPage() == $paginator->lastPage())
            <li class="pagination-next disabled"><span class="show-for-sr">page</span></li>
        @else
            <li class="pagination-next">
                <a href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next page"><span class="show-for-sr">page</span></a>
            </li>
        @endif
    </ul>
@endif
