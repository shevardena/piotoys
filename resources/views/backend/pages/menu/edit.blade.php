@extends('backend.layouts.default')
@seoTitle('Edit Menu')
@section('content')
    <x-backend.page-title heading="Menu" can="edit menu" url=""/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-data default="{ locale: '{{ $locales->first()->code }}' }">
            <x-splade-form action="{{ route('menus.update', $menu) }}" method="PUT" :default="$menu">
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
                        <x-splade-input class="w-full sm:w-1/2 mr-8 mt-4 sm:mt-0" name="name[{{ $locale->code }}]" label="Name" :value="$menu->getTranslation('name', $locale->code)"/>
                    </div>
                @endforeach

                @can('create menu item')
                    <div class="m-4">
                        <div class="flow-root">
                            <Link modal href="{{ route('menu_items.create', ['menu_id' => $menu->id]) }}"
                                  class="float-right mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Add menu item
                            </Link>
                        </div>
                    </div>
                @endcan

                <x-splade-table :for="$menu_items" as="$menu">
                    <x-splade-cell is_active>
                        {{ $menu->is_active == 1 ? 'true' : 'false' }}
                    </x-splade-cell>
                    <x-splade-cell actions>
                        @can('update menu')
                            <Link href="{{ route('menus.edit', $menu->id) }}" class="mr-2 text-white bg-cyan-600 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="fa-solid fa-pen-to-square mr-1"></i>
                            Edit
                            </Link>
                        @endcan
                        @can('delete menu')
                            <Link confirm="You are deleting menu" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No" method="DELETE" href="{{ route('menus.destroy', $menu->id) }}" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="fa-solid fa-trash-can mr-1"></i>
                            Delete
                            </Link>
                        @endcan
                    </x-splade-cell>
                </x-splade-table>

                <div class="flex flex-col sm:flex-row mt-4">
                    <x-splade-checkbox name="is_active" value="1" label="Is active?" />
                </div>
                <div class="mt-4 mb-2">
                    <x-splade-submit class="bg-cyan-600 text-white" label="Update" :spinner="true"/>
                </div>
            </x-splade-form>
        </x-splade-data>
    </div>
@endsection
