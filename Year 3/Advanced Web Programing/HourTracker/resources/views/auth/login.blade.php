@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="absolute top-0 w-full h-full bg-gray-900 flex content-center items-center justify-center ">
    <div class="container">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words">

                    <form class="w-full p-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <h1 class="text-gray-500 pb-4 text-2xl text-center">Login</h1>

                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('password') border-red-500 @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                        </div>

                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
    
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                            @error('password') border-red-500 @enderror" name="password" type="password" required placeholder="Password" autocomplete="email">
                            
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex mb-6" data-aos="zoom-in">
                            <label class="inline-flex items-center text-sm text-white" for="remember">
                                <input type="checkbox" name="remember" id="remember" 
                                class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-white hover:text-white whitespace-no-wrap no-underline ml-auto" 
                                href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-center" data-aos="zoom-in">
                            <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded 
                            focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
                                {{ __('Login') }}
                            </button>

                           {{-- @if (Route::has('password.request'))
                                <a class="text-sm text-white hover:text-white whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif--}}

                            @if (Route::has('register'))
                                <p class="w-full text-s text-center text-gray-200 mt-8 -mb-4">
                                    <a class="text-gray-300 hover:text-blue-500 no-underline" href="{{ route('register') }}">
                                        {{ __("Don't have an account?") }}
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