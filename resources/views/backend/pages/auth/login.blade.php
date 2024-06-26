@extends('backend.layouts.auth')
@seoTitle('Login To Dashboard')
@seoDescription('Login To Abashenici Dashboard')
@section('content')
    <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
        <a href="http://gocars.ge"
           class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
            <span class="self-center text-2xl font-bold whitespace-nowrap">OptimoGroup</span>
        </a>
        <!-- Card -->
        <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
            <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    Sign in to dashboard
                </h2>
                <x-splade-form :action="route('backend.auth')" class="mt-8 space-y-6">
                    <div>
                        <x-splade-input name="login" label="Login"
                                        class="text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"/>
                    </div>
                    <div>
                        <div>
                            <x-splade-input type="password" name="password" label="Password"
                                            class="text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"/>
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <x-splade-checkbox class="w-1/2" name="remember" value="1" label="Remember me"/>
                    </div>
                    <button type="submit"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                        Login to your account
                    </button>
                </x-splade-form>
            </div>
        </div>
    </div>
@endsection
