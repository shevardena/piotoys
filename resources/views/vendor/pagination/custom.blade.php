@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="mr-2 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-md">
                    Previous
                </span>
            @else
                <Link href="{{ $paginator->previousPageUrl() }}"
                      class="mr-2 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500">
                Previous
                </Link>
            @endif

            @if ($paginator->hasMorePages())
                <Link href="{{ $paginator->nextPageUrl() }}"
                      class="mr-2 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500">
                Next
                </Link>
            @else
                <span
                    class="mr-2 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-md">
                    Next
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <!-- Previous Page Link -->
                    @if ($paginator->onFirstPage())
                        <span
                            class="mr-2 relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-l-md">
                            <span aria-hidden="true">&laquo;</span>
                        </span>
                    @else
                        <Link href="{{ $paginator->previousPageUrl() }}"
                              class="mr-2 relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:text-gray-400">
                        <span aria-hidden="true">&laquo;</span>
                        </Link>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($elements as $element)
                        <!-- Array Of Links -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page"
                                          class="mr-2 relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-700 cursor-default rounded-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <Link href="{{ $url }}"
                                       class="mr-2 relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:text-gray-400 hover:bg-gray-100 rounded-md">
                                        {{ $page }}
                                    </Link>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($paginator->hasMorePages())
                        <Link href="{{ $paginator->nextPageUrl() }}"
                              class="mr-2 relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:text-gray-400">
                        <span aria-hidden="true">&raquo;</span>
                        </Link>
                    @else
                        <span
                            class="mr-2 relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-not-allowed rounded-r-md">
                            <span aria-hidden="true">&raquo;</span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
