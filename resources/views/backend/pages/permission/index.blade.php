@extends('backend.layouts.default')
@seoTitle('Permissions')
@section('content')
    <x-backend.page-title heading="Permissions" can="create permission" url="{{ route('permissions.create')  }}"
                          title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$permissions" as="$permission">
            <x-splade-cell actions>
                @can('update permission')
                    <Link href="{{ route('permissions.edit', $permission->id) }}"
                          class="mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete permission')
                    <Link
                        confirm="You are deleting permission"
                        confirm-text="Are you sure?"
                        confirm-button="Yes"
                        cancel-button="No"
                        method="DELETE"
                        href="{{ route('permissions.destroy', $permission->id) }}"
                        class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
