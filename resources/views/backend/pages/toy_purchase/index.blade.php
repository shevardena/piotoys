@extends('backend.layouts.default')
@seoTitle('Toy Purchase')
@section('content')
    <x-backend.page-title heading="Toy Purchases" can="create toy purchase" url="{{ route('toy_purchases.create')  }}"
                          title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$toy_purchases" as="$toy_purchase">
            <x-splade-cell actions>
                @can('update toy purchase')
                    <Link href="{{ route('toy_purchases.edit', $toy_purchase->id) }}"
                          class="mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete toy purchase')
                    <Link confirm="You are deleting toy purchase"
                          confirm-text="Are you sure?"
                          confirm-button="Yes"
                          cancel-button="No"
                          method="DELETE"
                          href="{{ route('toy_purchases.destroy', $toy_purchase->id) }}"
                          class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
