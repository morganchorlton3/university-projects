@extends('layouts.auth')

@section('title', 'Create a Job')

@section('content')
<div class="top-0 w-full h-full bg-gray-900 flex content-center items-center justify-center ">
    <div class="container">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words">

                    <form class="w-full p-6" method="POST" action="{{ route('job.create') }}">
                        @csrf

                        <h1 class="text-gray-500 pb-8 text-2xl text-center">Job</h1>
                        <!-- Company -->
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <label class="text-gray-600 text-m pb-2 text-center w-full">Company</label>
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 @error('Company') 
                            border-red-500 @enderror" name="company" placeholder="Hour Tracker" required autocomplete="Company">

                            @error('company')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- Job Title --> 
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <label class="text-gray-600 text-m pb-2 text-center w-full">Job Title</label>
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 @error('jobTitle') 
                            border-red-500 @enderror" name="jobTitle" placeholder="Sales Assistant" required autocomplete="jobTitle">

                            @error('jobTitle')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- Hourly Pay --> 
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <label class="text-gray-600 text-m pb-2 text-center w-full">Hourly Pay</label>
                            <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 @error('hourlyPay') 
                            border-red-500 @enderror" name="hourlyPay" placeholder="£9.68" required autocomplete="hourly Pay">
                            @error('hourlyPay')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- Pay Type--> 
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                           <label class="text-gray-600 text-m pb-2 text-center w-full">Pay Frequency</label>
                            <select name="payFrequency" class="block appearance-none w-full bg-transparent border-b border-gray-200 text-gray-600 py-3 px-4 pr-8 leading-tight focus:outline-none" id="grid-state">
                                <option value="1">Weekly</option>
                                <option value="2">Monthly</option>
                                <option value="3">4 Weekly</option>
                            </select>
                            @error('hourlyPay')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Pay date -->
                        <div class="flex flex-wrap mb-6 z-50" data-aos="zoom-in">
                            <label class="text-gray-600 text-m pb-2 text-center w-full">Pay Date</label>
                            @include('partials.datePicker')
                        </div>

                        <!-- Sunday Premium --> 
                        <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                            <label class="text-gray-600 text-m pb-2 text-center w-full">Sunday Premium</label>
                             <select name="sundayPremium" class="block appearance-none w-full bg-transparent border-b border-gray-200 text-gray-600 py-3 px-4 pr-8 leading-tight focus:outline-none" id="grid-state">
                                 <option value="0">No Premium</option>
                                 <option value="1">X2 pay</option>
                                 <option value="2">Pay + 1/2</option>
                                 <option value="3">Pay + 1/4</option>
                             </select>
                             @error('hourlyPay')
                                 <p class="text-red-500 text-xs italic mt-4">
                                     {{ $message }}
                                 </p>
                             @enderror
                         </div>


                        <div class="flex flex-wrap items-center" style="z-index:0;" data-aos="zoom-in">
                            <button type="submit" class=" bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" style="z-index:0;">
                                {{ __('Add your job') }}
                            </button>
                        </div>
                        <h1 class="flex justify-center text-gray-600 pt-4 pb-4">or</h1>
                        <div class="flex flex-wrap items-center w-full flex justify-center">
                           <a href="{{ route('company.register.create') }}"><h1 class="text-gray-600 underline hover:text-blue-900 content-center">Register Your Company</h1></a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection