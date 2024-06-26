@extends('backend.layouts.default')
@seoTitle('Edit Profile')
@section('content')
    <x-backend.page-title heading="Edit profile"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form  method="PUT" unguarded="password" :default="$user" action="{{ route('profile.update', $user) }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4" name="first_name" label="First name" />
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="last_name" label="Last name" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" type="email" name="email" label="Email" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4" type="password" name="current_password" label="Current Password" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0 sm:mr-4" type="password" name="new_password" label="New Password" />
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" type="password" name="new_password_confirmation" label="Confirm New Password" />
            </div>
            <div class="mt-4 mb-2">
                <x-splade-submit label="Update" :spinner="true" />
            </div>
        </x-splade-form>
    </div>
@endsection
