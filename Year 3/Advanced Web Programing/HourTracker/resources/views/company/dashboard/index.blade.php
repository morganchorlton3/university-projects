@extends('layouts.dashboard')

@section('title', 'Company Dashboard')

@section('content')  
@if($staff != null)
<h1 class="text-white pl-5 text-xl">Current Staff:</h1>
<div class="flex flex-wrap">
    <!-- Weekly Earnings -->
    <div class="w-full md:w-1/3 xl:w-1/3 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fa fa-user-tie fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Active Staff</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ $staff->where('companyStatus', 1)->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Monthly Earnings -->
    <div class="w-full md:w-1/3 xl:w-1/3 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-orange-600"><i class="fas fa-user-tie fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Staff To Aprove</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ $staff->where('companyStatus', 0)->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Earnings -->
    <div class="w-full md:w-1/3 xl:w-1/3 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-orange-600"><i class="fas fa-user-tie fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Deactivate staff</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ $staff->where('companyStatus', 2)->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection