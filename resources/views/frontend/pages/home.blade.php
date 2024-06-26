@extends('frontend.layouts.default')

@seoTitle('Pio Toys - Coming Soon')
@seoKeywords('toys,child toys,toy,სათამაშო,მეორადი სათამაშოები')
@seoDescription('Poy Toys')

@section('content')
    <div style="background-image: url('{{ asset('images/bg.png') }}'); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: flex-start; justify-content: center; padding-top: 10%;">
        <div class="text-center">
            <h1 class="text-6xl font-bold">
                <span class="text-pio-green">Com</span>
                <span class="text-pio-orange">ing</span>
                <span class="text-pio-blue"> Soon</span>
            </h1>
        </div>
    </div>
@endsection
