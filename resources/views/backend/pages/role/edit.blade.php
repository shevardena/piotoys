@extends('backend.layouts.default')
@seoTitle('Edit Role')
@section('content')
    <x-backend.page-title heading="Roles" can="edit role" url=""/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('roles.update', $role) }}"
                       method="PUT"
                       :default="$role">
            <!-- Role Name -->
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="name" label="Name"/>
            </div>
            <!-- Guard -->
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mt-4 sm:mt-0" name="guard_name" :options="$guards" option-label="Guard" />
            </div>
            <!-- Permissions Select Box -->
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mt-4 sm:mt-0" label="Permissions" placeholder="Select permissions" relation
                                 name="permissions" multiple :options="$permissions" choices option-label="name"
                                 option-value="id"/>
            </div>
            <!-- Submit Button -->
            <div class="mt-4 mb-2">
                <x-splade-submit label="Update" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection


