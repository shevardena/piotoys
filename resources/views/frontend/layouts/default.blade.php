<div class="flex flex-col min-h-screen">
    <!-- Header -->
    @include('frontend.partials.header')

    <!-- Content -->
    <div class="flex-grow">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('frontend.partials.footer')
</div>
