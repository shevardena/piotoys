@extends('backend.layouts.default')
@seoTitle('Create Admin')
@section('content')
    <x-backend.page-title heading="Create admin"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('administrators.store') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input  class="w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4" name="first_name" label="First name" />
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="last_name" label="Last name" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4" name="login" label="Login" />
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" type="email" name="email" label="Email" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" type="password" name="password" label="Password" />
            </div>
            @can('grant super admin')
                <div class="mt-4 mb-2">
                    <x-splade-checkbox class="w-full sm:w-1/2 mt-4 sm:mt-0" name="super_admin" value="1" label="Super Admin" />
                </div>
            @endcan
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-select class="w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4" label="Roles" placeholder="Select roles" relation name="roles" multiple :options="$roles" choices option-label="name" option-value="id" />
            </div>
            <div class="mt-4 mb-2">
                <x-splade-submit label="Create" :spinner="false" />
            </div>
        </x-splade-form>
    </div>
@endsection
