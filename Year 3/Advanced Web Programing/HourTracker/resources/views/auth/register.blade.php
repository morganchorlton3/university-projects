@extends('layouts.app')

@section('content')
<div class="absolute top-0 w-full h-full bg-gray-900 flex content-center items-center justify-center ">
    <div class="container">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words">
                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf

                        <h1 class="text-gray-500 pb-4 text-2xl text-center">Register</h1>

                        <!-- First Name-->
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('firstName') border-red-500 @enderror" name="firstName" placeholder="{{ __("First Name") }}" required autocomplete="name">
                            @error('firstName')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                         <!-- Last Name-->
                         <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('lastName') border-red-500 @enderror" name="lastName" placeholder="{{ __("Last Name") }}" required autocomplete="name">
                            @error('lastName')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                         <!-- Email-->
                         <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('email') border-red-500 @enderror" name="email" placeholder="{{ __("Email") }}" required autocomplete="email">
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('password') border-red-500 @enderror" name="password" type="password" required placeholder="{{ __("Password") }}" autocomplete="email">
                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Confirm Password -->
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('password_confirm') border-red-500 @enderror" name="password_confirmation" 
                            type="password" required placeholder="{{ __("Confirm Password") }}" id="password_confirm" >
                            @error('password')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="flex flex-wrap items-center" data-aos="zoom-in">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded 
                            focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
                                {{ __('Register') }}
                            </button>

                            @if (Route::has('register'))
                                <p class="w-full text-s text-center text-gray-200 mt-8 -mb-4">
                                    <a class="text-gray-300 hover:text-blue-500 no-underline" href="{{ route('login') }}">
                                        {{ __("Already Have any Account!") }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection