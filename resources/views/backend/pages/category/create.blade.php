@extends('backend.layouts.default')
@seoTitle('Create Category')
@section('content')
    <x-backend.page-title heading="Category"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('categories.store') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2  mr-8 mt-4 sm:mt-0" name="name" label="Name"/>
                <x-splade-input disabled class="sm:w-1/2 sm:w-1/2 mt-4 sm:mt-0" name="slug" label="Slug"/>
            </div>
            <x-splade-data remember="menu" default="{ general_tab: true, seo_tab: false}">
                <div class="flex space-x-1 mb-4 mt-2">
                    <button
                        type="button"
                        @click="data.general_tab = true; data.seo_tab = false"
                        :class="{'bg-cyan-600 text-white': data.general_tab, 'bg-gray-200 text-black': !data.general_tab}"
                        class="px-4 py-2 rounded mt-2 mr-1"
                    >
                        General
                    </button>
                    <button
                        type="button"
                        @click="data.general_tab = false; data.seo_tab = true"
                        :class="{'bg-cyan-600 text-white': data.seo_tab, 'bg-gray-200 text-black': !data.seo_tab}"
                        class="px-4 py-2 rounded mt-2 mr-2"
                    >
                        SEO
                    </button>
                </div>
                <aside v-show="data.general_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-wysiwyg class="w-full mt-4 sm:mt-0" name="description" label="Description"/>
                    </div>
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-checkbox name="is_active" label="Is active?" />
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
            </x-splade-data>
            <!-- Submit Button -->
            <div class="mt-4 mb-2">
                <x-splade-submit class="bg-cyan-600 text-white" label="Create" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection
