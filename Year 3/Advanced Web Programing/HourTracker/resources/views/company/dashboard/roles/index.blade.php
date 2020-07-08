@extends('layouts.dashboard')

@section('title', 'Company Roles')


@section('content') 
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Roles</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Pay Rate</th>
                        <th class="text-center text-gray-600">Staff Assigned</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr class="text-white pt-2">
                        <td class="text-center">{{ $role->name }}</td>
                        <td class="text-center">{{ $role->payRate }}</td>
                        <td class="text-center">{{ $role->staffAssigned }}</td>
                    </tr>
                    @endforeach                  
                </tbody>
            </table>
              
            <div class="mt-8 mb-4">
                {{--{{ $staff->links() }}--}}
            </div> 
        </div>
    </div>
</div>
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Create Roles</h5>
        </div>
        <form action="{{ route('company.role.store')}}" method="POST" class="w-full flex justify-start px-8 my-4">
        @CSRF
            <div class="w-5/12 px-2">
                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                    @error('name') border-red-500 @enderror" name="name" placeholder="{{ __("Name") }}" required autocomplete="roleName">
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-5/12 px-2">
                <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                    <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                    @error('payRate') border-red-500 @enderror" name="payRate" placeholder="{{ __("Pay Rate") }}" required autocomplete="payRate">
                    @error('payRate')
                    <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
            <div class=" w-2/12 px-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded 
                    focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
                    {{ __('Create Role') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection