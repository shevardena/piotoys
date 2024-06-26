@extends('backend.layouts.default')
@seoTitle('Administrators')
@section('content')
    <x-backend.page-title heading="Administrators" can="create administrator" url="{{ route('administrators.create')  }}"
                          title="Create"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-table :for="$users" as="$user">
            <x-splade-cell super_admin>
                {{ $user->super_admin ? 'Yes' : 'No' }}
            </x-splade-cell>
            <x-splade-cell actions>
                @can('update administrator')
                    <Link href="{{ route('administrators.edit', $user->id) }}"
                          class="mr-2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </Link>
                @endcan
                @can('delete administrator')
                    <Link confirm="You are deleting administrator"
                          confirm-text="Are you sure?"
                          confirm-button="Yes"
                          cancel-button="No"
                          method="DELETE"
                          href="{{ route('administrators.destroy', $user->id) }}"
                          class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:ring-red-200 font-medium rounded-sm text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="fa-solid fa-trash-can mr-1"></i>
                        Delete
                    </Link>
                @endcan
            </x-splade-cell>
        </x-splade-table>
    </div>
@endsection
