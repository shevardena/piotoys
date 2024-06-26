@extends('backend.layouts.default')
@seoTitle('Products')
@section('content')
    <x-backend.page-title
        heading="Products"
        :links="[
            ['title' => 'Create', 'can' => 'create product', 'url' => route('products.create'), 'icon' => 'fa-solid fa-plus', 'class' => 'bg-cyan-600 hover:bg-cyan-700'],
            ['title' => 'Import', 'can' => 'import product', 'url' => route('products.import_images'), 'icon' => 'fa-solid fa-file-import', 'class' => 'bg-green-600 hover:bg-green-700'],
        ]"
    />
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$products" as="$product">
            <x-splade-cell description>
                {!! $product->description !!}
            </x-splade-cell>
            <x-splade-cell image>
                {{ $product->getFirstMedia('image')}}
            </x-splade-cell>
            <x-splade-cell is_active>
                {{ $product->is_active == 1 ? 'true' : 'false' }}
            </x-splade-cell>
            <x-splade-cell actions>
                @can('update product')
                    <Link href="{{ route('products.edit', $product->id) }}"
                          class="mr-2 text-white bg-cyan-600 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete product')
                    <Link confirm="You are deleting toy product"
                          confirm-text="Are you sure?"
                          confirm-button="Yes"
                          cancel-button="No"
                          method="DELETE"
                          href="{{ route('products.destroy', $product->id) }}"
                          class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
