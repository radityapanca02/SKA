@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" id="pagination-container">
        <div class="flex flex-col items-center gap-2">
            <p class="text-sm text-gray-600">
                Menampilkan halaman ke-{{ $paginator->currentPage() }} dari {{ $paginator->lastPage() }}
            </p>
            <ul class="flex justify-center space-x-2">
                
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                            &laquo;
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}"
                                class="px-3 py-2 text-blue-600 hover:text-blue-800 transition-colors">
                            &laquo;
                        </a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li>
                            <span class="px-3 py-2 text-gray-400">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page">
                                    <span class="px-3 py-2 bg-blue-600 text-white rounded">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                            class="px-3 py-2 text-blue-600 hover:text-blue-800 transition-colors">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}"
                                class="px-3 py-2 text-blue-600 hover:text-blue-800 transition-colors">
                            &raquo;
                        </a>
                    </li>
                @else
                    <li>
                        <span class="px-3 py-2 text-gray-400 cursor-not-allowed">
                            &raquo;
                        </span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
