@extends('backend.layouts.default')
@seoTitle('Create Menu')
@section('content')
    <x-backend.page-title heading="Menu"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-data default="{ locale: '{{ $locales->first()->code }}' }">
            <x-splade-form action="{{ route('menus.store') }}" method="POST">
                <x-splade-errors>
                    {{-- Display Locale Icons --}}
                    <div class="flex justify-start space-x-4">
                        @foreach($locales as $locale)
                            <div class="cursor-pointer" @click="data.locale = '{{ $locale->code }}'"
                                 :class="{ 'opacity-100': data.locale === '{{ $locale->code }}', 'opacity-50': data.locale !== '{{ $locale->code }}' }">
                                {!! $locale->icon !!}
                            </div>
                        @endforeach
                    </div>
                    {{-- Locale Specific Name Fields --}}
                    @foreach($locales as $locale)
                        <div v-show="data.locale === '{{ $locale->code }}'" class="flex flex-col sm:flex-row mt-4">
                            <x-splade-input
                                class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0"
                                name="name[{{ $locale->code }}]"
                                label="Name"
                                validation-key="{{ $locale->code == $defaultLocale ? 'name.'. $locales->first()->code: 'name' }}"
                            />

                        </div>
                    @endforeach
                    <div class="flex flex-col sm:flex-row mt-4">
                        <x-splade-checkbox name="is_active" value="1" label="Is active?"/>
                    </div>
                    <div class="mt-4 mb-2">
                        <x-splade-submit class="bg-cyan-600 text-white" label="Create" :spinner="true"/>
                    </div>
                </x-splade-errors>
            </x-splade-form>
        </x-splade-data>
    </div>
@endsection
