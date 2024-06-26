@extends('backend.layouts.default')
@seoTitle('Import Product Images')
@section('content')
    <x-backend.page-title heading="Products"/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('products.store_from_images') }}">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-file class="w-full sm:w-1/2  mr-8 mt-4 sm:mt-0" name="images[]" multiple server filepond preview />
            </div>
            <!-- Submit Button -->
            <div class="mt-4 mb-2">
                <x-splade-submit class="bg-cyan-600 text-white" label="Import" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection
