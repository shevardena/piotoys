@extends('backend.layouts.default')
@seoTitle('Create Setting')
@section('content')
    <x-backend.page-title heading="Setting"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('settings.store') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="name" label="Name"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="type" :options="$setting_types" placeholder="Type" choices option-label="name" option-value="id" />

            </div>
            <x-splade-data remember="menu" default="{ general_tab: true, seo_tab: false}" v-if="form.type === 'website_parameters'">
                <div class="flex space-x-1 mb-4 mt-2">
                    <button
                        type="button"
                        @click="data.general_tab = true; data.seo_tab = false; data.images_tab = false;"
                        :class="{'bg-cyan-600 text-white': data.general_tab, 'bg-gray-200 text-black': !data.general_tab}"
                        class="px-4 py-2 rounded mt-2 mr-1"
                    >
                        General
                    </button>
                    <button
                        type="button"
                        @click="data.general_tab = false; data.seo_tab = true; data.images_tab = false;"
                        :class="{'bg-cyan-600 text-white': data.seo_tab, 'bg-gray-200 text-black': !data.seo_tab}"
                        class="px-4 py-2 rounded mt-2 mr-2"
                    >
                        SEO
                    </button>
                    <button
                        type="button"
                        @click="data.general_tab = false; data.seo_tab = false; data.images_tab = true;"
                        :class="{'bg-cyan-600 text-white': data.images_tab, 'bg-gray-200 text-black': !data.images_tab}"
                        class="px-4 py-2 rounded mt-2 mr-2"
                    >
                        Images
                    </button>
                </div>
                <aside v-show="data.general_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="store_name" label="Store name"/>
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
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-file name="og_image" filepond preview class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" label="OG Image" />
                    </div>
                </aside>
                <aside v-show="data.images_tab">
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-file name="logo" filepond preview class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" label="Logo" />
                    </div>
                </aside>
            </x-splade-data>
            <div class="flex flex-col sm:flex-row mt-4" v-if="form.type === 'contact_information'">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="phone" label="Phone"/>
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="email" label="Email"/>
            </div>
            <div class="flex flex-col sm:flex-row mt-4" v-if="form.type === 'contact_information'">
                <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="address" label="Address"/>
            </div>
            <div class="mt-6 grid gap-6 mb-6" v-if="form.type === 'contact_information'">
                <repeater-component
                    v-model="form.social_networks"
                    :initial-fields="[
                        {
                            input1: { name: 'social_networks[0][icon]', value: '', placeholder: 'Icon' },
                            input2: { name: 'social_networks[0][url]', value: '', placeholder: 'URL' }
                        }
                    ]"
                    add-button-text="Add Social Network"
                    remove-button-text="Remove"
                    :placeholders="['Icon', 'URL']"
                />
            </div>
            <div class="mt-4 mb-2">
                <x-splade-submit class="bg-cyan-600 text-white" label="Create" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection
