@extends('backend.layouts.default')
@seoTitle('Edit Toy Purchase')
@section('content')
    <x-backend.page-title heading="Toy Purchases" can="edit role" url=""/>
    <div class="mx-4 mt-5 h-full">
        <x-splade-form action="{{ route('toy_purchases.update', $toy_purchase) }}"
                       method="PUT"
                       :default="$toy_purchase">
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input class="w-full sm:w-1/2 mt-4 sm:mt-0" name="name" label="Name" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input type="number" class="w-full sm:w-1/2 mt-4 sm:mt-0" name="box_count" label="Box Count" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input type="number" class="w-full sm:w-1/2 mt-4 sm:mt-0" name="price_per_kg" label="Price Per Kg" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input type="number" class="w-full sm:w-1/2 mt-4 sm:mt-0" name="amount_paid" label="Amount Paid" />
            </div>
            <div class="flex flex-col sm:flex-row mt-4">
                <x-splade-input date class="w-full sm:w-1/2 mt-4 sm:mt-0" name="purchase_date" label="Purchase Date" />
            </div>
            <!-- Submit Button -->
            <div class="mt-4 mb-2">
                <x-splade-submit label="Update" :spinner="true"/>
            </div>
        </x-splade-form>
    </div>
@endsection


