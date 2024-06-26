<x-splade-toggle data="isSidebarHidden">
@include('backend.partials._top_bar')
<div class="flex overflow-hidden bg-white pt-16">
    @include('backend.partials._sidebar')
    <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
    <div id="main-content" style="min-height: calc(100vh - 64px)" class="w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main class="mt-8 px-4  top-0 left-0 flex lg:flex flex-shrink-0 flex-col " >
            {{ Breadcrumbs::render() }}
            <div style="min-height: calc(100vh - 364px)">
                @yield('content')
            </div>
            @include('backend.partials._footer')
        </main>
    </div>
</div>
</x-splade-toggle>
