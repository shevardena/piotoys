@extends('backend.layouts.default')
@seoTitle('Menus')
@section('content')
    <x-backend.page-title heading="Menus" can="create menu" url="{{ route('menus.create') }}" title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$menus" as="$menu">
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
    </div>
@endsection
