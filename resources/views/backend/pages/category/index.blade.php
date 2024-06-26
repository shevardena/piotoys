@extends('backend.layouts.default')
@seoTitle('Categories')
@section('content')
    <x-backend.page-title heading="Categories" can="create category" url="{{ route('categories.create')  }}"
                          title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$categories" as="$category">
            <x-splade-cell description>
                {!! $category->description !!}
            </x-splade-cell>
            <x-splade-cell is_active>
                {{ $category->is_active == 1 ? 'true' : 'false' }}
            </x-splade-cell>
            <x-splade-cell actions>
                @can('update category')
                    <Link href="{{ route('categories.edit', $category->id) }}"
                          class="mr-2 text-white bg-cyan-600 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete category')
                    <Link confirm="You are deleting toy category"
                          confirm-text="Are you sure?"
                          confirm-button="Yes"
                          cancel-button="No"
                          method="DELETE"
                          href="{{ route('categories.destroy', $category->id) }}"
                          class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
