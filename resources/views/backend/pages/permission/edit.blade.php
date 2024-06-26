@extends('backend.layouts.default')
@seoTitle('Edit Permission')
@section('content')
    <x-backend.page-title heading="Permissions"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form method="PUT" :for="$form" />
    </div>
@endsection
