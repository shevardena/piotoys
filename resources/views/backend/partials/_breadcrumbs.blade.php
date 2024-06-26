@unless ($breadcrumbs->isEmpty())
    <div class="bg-white mx-4 p-4 mt-8 flex items-center flex-wrap">
        <ol class="flex items-center whitespace-nowrap min-w-0" aria-label="Breadcrumb">
            @foreach($breadcrumbs as $breadcrumb)
                @if($loop->first && $breadcrumbs->count() > 1)
                    <li class="text-sm">
                        <Link class="flex items-center text-gray-500 hover:text-blue-600" href="{{ $breadcrumb->url }}">
                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path
                                d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/>
                        </svg>
                        {{ $breadcrumb->title }}
                        <svg
                            class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        </Link>
                    </li>
                @endif
                @if($loop->first && $breadcrumbs->count() == 1)
                    <li class="text-sm">
                        <a class="flex items-center text-gray-500 hover:text-blue-600">
                            <svg class="flex-shrink-0 mr-3 h-4 w-4 text-gray-600 dark:text-gray-600" width="16"
                                 height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd"
                                      d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @endif
                @if($loop->index === 2 && $breadcrumbs->count() > 2)
                    <li class="text-sm">
                        <Link class="flex items-center text-gray-500 hover:text-blue-600" href="{{ $breadcrumb->url }}">
                        {{ $breadcrumb->title }}
                        <svg
                            class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                            width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        </Link>
                    </li>
                @endif
                @if($loop->last && ($breadcrumbs->count() > 2 || $breadcrumbs->count() == 2))
                    <li class="text-sm">
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
@endunless



