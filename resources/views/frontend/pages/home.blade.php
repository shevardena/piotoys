@extends('frontend.layouts.default')

@seoTitle('Pio Toys - Coming Soon')
@seoKeywords('toys,child toys,toy,სათამაშო,მეორადი სათამაშოები')
@seoDescription('Poy Toys')

@section('content')
    <div class="bg-cover bg-center min-h-screen flex items-center justify-center py-10 md:py-20 responsive-bg" style="background-image: url('{{ asset('images/bg.png') }}');">
        <div class="text-center">
            <h1 class="text-6xl font-bold">
                <span class="text-pio-green">Com</span>
                <span class="text-pio-orange">ing</span>
                <span class="text-pio-blue"> Soon</span>
            </h1>
        </div>
    </div>
@endsection
