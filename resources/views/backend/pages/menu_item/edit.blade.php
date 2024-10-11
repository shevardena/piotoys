@extends('backend.layouts.default')
@seoTitle('Edit MenuItem')
@section('content')
    <x-backend.page-title heading="MenuItem" can="edit menuitem" url=""/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('menu_items.update', $menuItem) }}" method="PUT" :default="$menuItem">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="name" label="Name"/>
                <x-splade-input disabled class="sm:w-1/2 sm:w-1/2 mt-4 sm:mt-0" name="slug" label="Slug"/>
            </div>

            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-checkbox name="is_active" value="1" label="Is active?" />
            </div>
            <div class="mt-4 mb-2">
                <x-splade-submit class="bg-cyan-600 text-white" label="Update" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection
