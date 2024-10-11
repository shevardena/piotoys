@extends('backend.layouts.default')
@seoTitle('Create Locale')
@section('content')
    <x-backend.page-title heading="Locale"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('locales.store') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="name" label="Name"/>
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="short_name" label="Short Name"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="sm:w-1/2 sm:w-1/2 mr-8 mt-4 sm:mt-0" name="code" label="Code"/>
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="icon" label="Icon"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-checkbox name="is_active" value="1" label="Is active?" />
            </div>
            <div class="mt-4 mb-2">
                <x-splade-submit class="bg-cyan-600 text-white" label="Create" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection
