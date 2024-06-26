<div class="m-4">
    <div class="flow-root">
        <h2 class="float-left text-2xl font-extrabold dark:text-white">
            {{ $heading }}
        </h2>
        @if(isset($links) && is_array($links) && count($links) > 0)
            @foreach($links as $link)
                @can($link['can'])
                    @if(isset($link['url']))
                        <Link href="{{ $link['url'] }}"
                              class="float-right mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center {{ $link['class'] ?? '' }}">
                        @if(isset($link['icon']))
                            <i class="{{ $link['icon'] }} mr-1"></i>
                            @endif
                            {{ $link['title'] }}
                            </Link>
                        @endif
                    @endcan
                    @endforeach
                @elseif(isset($can) && isset($url) && !empty($url))
                    @can($can)
                        <Link href="{{ $url }}"
                              class="float-right mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        @if(isset($title))
                            <i class="fa-solid fa-plus mr-1"></i>
                            {{ $title }}
                            @endif
                            </Link>
                        @endcan
                    @endif
    </div>
</div>
