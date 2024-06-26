@extends('backend.layouts.default')
@seoTitle('Create Role')
@section('content')
    <x-backend.page-title heading="Roles"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('roles.store') }}">
            <!-- Role Name -->
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="name" label="Name" />
            </div>
            <!-- Guard -->
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mt-4 sm:mt-0" placeholder="Guard name" name="guard_name">
                    <option value="" disabled>Guard name</option>
                    <option value="admin">admin</option>
                    <option value="web">web</option>
                </x-splade-select>
            </div>
            <!-- Permissions Select Box -->
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mt-4 sm:mt-0" name="guard_name" placeholder="Permissions">
                    <option disabled>Permissions</option>
                    @forelse($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name . ' (guard: ' . $permission->guard_name .')' }}</option>
                    @empty
                    @endforelse
                </x-splade-select>
            </div>
            <!-- Submit Button -->
            <div class="mt-4 mb-2">
                <x-splade-submit label="Create" :spinner="true" />
            </div>
        </x-splade-form>
    </div>
@endsection
