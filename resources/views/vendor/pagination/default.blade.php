@if ($paginator->hasPages())
	<div class="pagination-wrapper m-t-10">
		<nav class="pagination is-centered" role="navigation" aria-label="pagination">
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
					<a class="pagination-previous" disabled>&laquo;</a>
			@else
				<a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
			@endif
			<ul class="pagination-list">
				{{-- Pagination Elements --}}
				@foreach ($elements as $element)
					{{-- Array Of Links --}}
					@if (is_array($element))
						@foreach ($element as $page => $url)
							@if ($page == $paginator->currentPage())
							<li>
								<a class="pagination-link is-current" aria-label="{{ $page }}" aria-current="page">{{ $page }}</a>
							</li>
							@else
								<li>
									<a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
								</li>
							@endif
						@endforeach
					@endif
				@endforeach
			</ul>
			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
			<a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
			@else
			<a class="pagination-next" disabled>&raquo;</a>
			@endif
		</nav>
	</div>
@endif
