@extends('layouts.app')

@section('title', 'Register with ' .  $company->name)

@section('content')
<div class="absolute top-0 w-full h-full bg-gray-900 flex content-center items-center justify-center ">
    <div class="container">
        <div class="flex flex-wrap justify-center">
            <div class=" lg:w-8/12">
                <div class="flex flex-col break-words">
                    <form class="w-full p-6" method="POST" action="{{ route('company.register.user', $company) }}">
                        @csrf

                        <h1 class="text-gray-500 pb-4 text-2xl text-center mb-8">Register with {{ $company->name }}</h1>
                        <div class="w-full flex justify-start">
                            <!-- First Name-->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('firstName') border-red-500 @enderror" name="firstName" placeholder="{{ __("First Name") }}" value="{{ old('firstName') }}" autocomplete="name">
                                    @error('firstName')
                                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- Last Name-->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('lastName') border-red-500 @enderror" name="lastName" placeholder="{{ __("Last Name") }}" value="{{ old('lastName') }}"  autocomplete="name">
                                    @error('lastName')
                                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div> 
                            </div>
                        </div>
                        <!-- Email-->
                        <div class="w-full px-2">
                            <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                @error('email') border-red-500 @enderror" name="email" placeholder="{{ __("Email") }}" value="{{ old('email') }}"  autocomplete="email">
                                @error('email')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> 
                        <div class="w-full flex justify-start">
                            <!-- Employee Number-->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('email') border-red-500 @enderror" name="employeeNumber" placeholder="{{ __("Employee Number") }}" value="{{ old('employeeNumber') }}"  autocomplete="employeeNumber">
                                    @error('email')
                                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> 
                            <!-- Role -->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <select name="role" class="appearance-none bg-transparent border-b bg-gray-900 text-gray-400 w-full py-2 px-3 mb-3" value="{{ old('role') }}" >
                                        <option>Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="w-full px-2">
                            <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                @error('line1') border-red-500 @enderror" name="line1" type="text" placeholder="{{ __("Address Line 1") }}" value="{{ old('line1') }}"  autocomplete="address-line1">
                                @error('line1')
                                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full px-2">
                            <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                @error('line2') border-red-500 @enderror" name="line2" type="text" placeholder="{{ __("Address line 2") }}" value="{{ old('line2') }}"  autocomplete="address-line2">
                                @error('line2')
                                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full flex justify-start">
                            <!-- PostCode -->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('postCode') border-red-500 @enderror" name="postCode" type="text" placeholder="{{ __("Post Code") }}" value="{{ old('postCode') }}">
                                    @error('postCode')
                                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- PhoneNumber -->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('phoneNumber') border-red-500 @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}"  
                                    type="text" placeholder="{{ __("Phone Number") }}" id="phoneNumber" >
                                    @error('phoneNumber')
                                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex justify-start">
                            <!-- Password -->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('password') border-red-500 @enderror" name="password" type="password" placeholder="{{ __("Password") }}">
                                    @error('password')
                                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- Confirm Password -->
                            <div class="w-1/2 px-2">
                                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                                    @error('password_confirm') border-red-500 @enderror" name="password_confirmation" 
                                    type="password" placeholder="{{ __("Confirm") }}" id="password_confirm" >
                                    @error('password')
                                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="flex flex-wrap items-center" data-aos="zoom-in">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded 
                            focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
                                {{ __('Register') }}
                            </button>

                            {{--@if (Route::has('register'))
                                <p class="w-full text-s text-center text-gray-200 mt-8 -mb-4">
                                    <a class="text-gray-300 hover:text-blue-500 no-underline" href="{{ route('company.register.user', $company) }}">
                                        {{ __("Already Have any Account, Link them here!") }}
                                    </a>
                                </p>
                            @endif--}}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection