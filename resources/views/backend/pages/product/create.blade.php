@extends('backend.layouts.default')
@seoTitle('Create Product')
@section('content')
    <x-backend.page-title heading="Products"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('products.store') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2  mr-8 mt-4 sm:mt-0" name="name" label="Name"/>
                <x-splade-input disabled class="sm:w-1/2 sm:w-1/2 mt-4 sm:mt-0" name="slug" label="Slug"/>
            </div>
            <x-splade-data remember="menu" default="{ general_tab: true, seo_tab: false}">
                <div class="flex space-x-1 mb-4 mt-2">
                    <button
                        type="button"
                        @click="data.general_tab = true; data.relations_tab = false; data.seo_tab = false; data.images_tab = false;"
                        :class="{'bg-cyan-600 text-white': data.general_tab, 'bg-gray-200 text-black': !data.general_tab}"
                        class="px-4 py-2 rounded mt-2 mr-1"
                    >
                        General
                    </button>
                    <button
                        type="button"
                        @click="data.general_tab = false; data.relations_tab = true; data.seo_tab = false; data.images_tab = fase;"
                        :class="{'bg-cyan-600 text-white': data.relations_tab, 'bg-gray-200 text-black': !data.relations_tab}"
                        class="px-4 py-2 rounded mt-2 mr-1"
                    >
                        Relations
                    </button>
                    <button
                        type="button"
                        @click="data.general_tab = false; data.relations_tab = false; data.seo_tab = true; data.images_tab = false;"
                        :class="{'bg-cyan-600 text-white': data.seo_tab, 'bg-gray-200 text-black': !data.seo_tab}"
                        class="px-4 py-2 rounded mt-2 mr-2"
                    >
                        SEO
                    </button>
                    <button
                        type="button"
                        @click="data.general_tab = false; data.relations_tab = false; data.seo_tab = false; data.images_tab = true;"
                        :class="{'bg-cyan-600 text-white': data.images_tab, 'bg-gray-200 text-black': !data.images_tab}"
                        class="px-4 py-2 rounded mt-2 mr-2"
                    >
                        Images
                    </button>
                </div>
                <aside v-show="data.general_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-input type="number" class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="quantity" label="Quantity"/>
                        <x-splade-input type="number"  class="w-full sm:w-1/2 mt-4 sm:mt-0" name="price" label="Price"/>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-wysiwyg class="w-full mt-4 sm:mt-0" name="description" label="Description"/>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-checkbox name="is_active" value="1" label="Is active?" />
                    </div>
                </aside>
                <aside v-show="data.relations_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="purchase_id" :options="$toy_purchases" placeholder="Purchase" choices option-label="name" option-value="id" />
                        <x-splade-select class="w-full sm:w-1/2 mt-4 sm:mt-0" name="category_ids[]" :options="$categories" placeholder="Categories" multiple relation choices option-label="name" option-value="id" />
                    </div>
                </aside>
                <aside v-show="data.seo_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="meta_title" label="Meta title"/>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-textarea class="w-full sm:w-1/2 mt-4 sm:mt-0" name="meta_description"
                                           label="Meta description"/>
                    </div>
                </aside>
                <aside v-show="data.images_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-file name="image" multiple filepond preview class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" label="Main Image" />
                        <x-splade-file name="images[]" multiple filepond preview class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" label="Other Images" />
                    </div>
                </aside>
            </x-splade-data>
            <!-- Submit Button -->
            <div class="mt-4 mb-2">
                <x-splade-submit class="bg-cyan-600 text-white" label="Update" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection
