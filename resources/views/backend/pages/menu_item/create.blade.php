@extends('backend.layouts.default')
@seoTitle('Create MenuItem')
@section('content')
    <x-backend.page-title heading="MenuItem"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form :default="['menu_id' => request()->menu_id, 'parent_id' => request()->parent_id]" action="{{ route('menu_items.store') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="name" label="Name"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="menu_id" :options="$menus" choices option-label="name" option-value="id" placeholder="Root Menu Item"/>
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="parent_id" :options="$menu_items" choices option-label="name" option-value="id" placeholder="Parent Menu Item"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="type" :options="$types" choices option-label="name" option-value="id" placeholder="Type"/>
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" v-if="form.type == 'model'" name="model" :options="$models" choices option-label="name" option-value="id" placeholder="Model"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4" v-if="form.type == 'url'">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="url" label="URL" placeholder="e.g https://example.com" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4" v-if="form.type == 'url'">
                <x-splade-checkbox  class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="open_in_new_tab" value="1" label="Open in new tab?" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" v-if="form.model == 'category'" name="category_id" :options="$categories" choices option-label="name" option-value="id" placeholder="Category"/>
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" v-if="form.model == 'product'" name="product_id" :options="$products" choices option-label="name" option-value="id" placeholder="Product"/>
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
