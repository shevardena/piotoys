@extends('backend.layouts.default')
@seoTitle('Create Permission')
@section('content')
<x-backend.page-title heading="Permissions"/>
<div class="mx-4 mt-5 h-full">
    <x-splade-form :for="$form" />
</div>
@endsection
