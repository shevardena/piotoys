@extends('backend.layouts.default')
@seoTitle('Locales')
@section('content')
    <x-backend.page-title heading="Locales" can="create locale" url="{{ route('locales.create') }}" title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$locales" as="$locale">
            <x-splade-cell icon>
                {!! $locale->icon !!}
            </x-splade-cell>
            <x-splade-cell is_active>
                {{ $locale->is_active == 1 ? 'Yes' : 'No' }}
            </x-splade-cell>
            <x-splade-cell actions>
                @can('update locale')
                    <Link href="{{ route('locales.edit', $locale->id) }}" class="mr-2 text-white bg-cyan-600 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete locale')
                    <Link confirm="You are deleting locale" confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No" method="DELETE" href="{{ route('locales.destroy', $locale->id) }}" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
