@extends('backend.layouts.default')
@seoTitle('Settings')
@section('content')
    <x-backend.page-title heading="Settings" can="create setting" url="{{ route('settings.create') }}" title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$settings" as="$setting">
            <x-splade-cell is_active>
                {{ $setting->is_active == 1 ? 'true' : 'false' }}
            </x-splade-cell>
            <x-splade-cell actions>
                @can('update setting')
                    <Link href="{{ route('settings.edit', $setting->id) }}" class="mr-2 text-white bg-cyan-600 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete setting')
                    <Link confirm="You are deleting setting" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No" method="DELETE" href="{{ route('settings.destroy', $setting->id) }}" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
