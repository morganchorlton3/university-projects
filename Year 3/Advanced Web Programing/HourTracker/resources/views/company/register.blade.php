@extends('layouts.auth')

@section('title', 'Register Company')

@section('content')
<div class="absolute top-0 w-full h-full bg-gray-900 flex content-center items-center justify-center ">
    <div class="container">
        <div class="flex flex-wrap justify-center">
            <div class="lg:w-8/12">
                <div class="flex flex-col break-words">
                    <form class="w-full p-6" method="POST" action="{{ route('company.register.store') }}">
                        @csrf

                        <h1 class="text-gray-500 pb-4 text-2xl text-center">Register Your Company</h1>
                        <div class="w-full flex justify-start my-8">
                            <!-- Business Name-->
                            <div class="w-1/2 px-2" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3
                                @error('name') border-red-500 @enderror" name="name" placeholder="{{ __("Company Name") }}" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-1/2 px-2" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3 
                                @error('employees') border-red-500 @enderror" type="number" name="employees" placeholder="{{ __("Number Of Employees") }}" value="{{ old('employees') }}">
                                @error('employees')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full my-8 px-1" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3
                            @error('line1') border-red-500 @enderror" name="line1" placeholder="{{ __("Address line 1") }}" value="{{ old('line1') }}">
                            @error('line1')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full my-8 px-1" data-aos="zoom-in">
                            <input class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3
                            @error('line2') border-red-500 @enderror" name="line2" placeholder="{{ __("Address Line 2") }}" value="{{ old('line2') }}">
                            @error('line2')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full flex justify-start my-8">
                            <!-- Post Code-->
                            <div class="w-1/2 px-2" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3
                                @error('postCode') border-red-500 @enderror" name="postCode" placeholder="{{ __("Post Code") }}" value="{{ old('postCode') }}">
                                @error('postCode')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-1/2 px-2" data-aos="zoom-in">
                                <input class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3 
                                @error('phoneNumber') border-red-500 @enderror" type="text" name="phoneNumber" placeholder="{{ __("Phone Number") }}" value="{{ old('phoneNumber') }}">
                                @error('phoneNumber')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full flex justify-start my-8">
                            <!-- Pay Type--> 
                            <div class="w-1/2 px-2" data-aos="zoom-in">
                                <select name="payFrequency" class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3 
                                @error('payFrequency') border-red-500 @enderror">
                                    <option value="">Pay Frequency</option>
                                    <option value="1">Weekly</option>
                                    <option value="2">Monthly</option>
                                    <option value="3">4 Weekly</option>
                                </select>
                                @error('payFrequency')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div> 
                            <!-- SundayPremium -->
                            <div class="w-1/2 px-2" data-aos="zoom-in">
                                <select name="sundayPremium" class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 px-3 mb-3 
                                @error('sundayPremium') border-red-500 @enderror">
                                    <option value="">Sunday Premium</option>
                                    <option value="1">2X Pay</option>
                                    <option value="2">Pay + 1/2</option>
                                    <option value="3">Pay + 1/4</option>
                                </select>
                                @error('sundayPremium')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div> 
                        </div>     
                        <div class="w-full flex justify-start my-8">
                            <!-- Pay date -->
                            <div class="w-full px-2 z-50" data-aos="zoom-in">
                                @include('partials.datePicker')
                            </div>                            
                            @error('date')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- Reason -->
                        <div class="w-full flex justify-start px-8 mb-8" data-aos="zoom-in">
                            <div class="w-full" data-aos="zoom-in">
                                <textarea class="appearance-none bg-transparent border-b bg-gray-900 text-gray-500 w-full py-2 mb-3 h-32
                                @error('reason') border-red-500 @enderror" name="reason" placeholder="{{ __("Reason For Registering (min 100 characters)") }}" value="{{ old('reason') }}"></textarea>
                                @error('reason')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

        
                        <div class="flex flex-wrap items-center" data-aos="zoom-in">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded 
                            focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
                                {{ __('Register Company') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection