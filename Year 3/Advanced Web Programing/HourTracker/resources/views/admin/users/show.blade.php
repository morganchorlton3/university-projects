@extends('layouts.dashboard')

@section('title', 'Admin Users')

@section('content')  
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Users</h5>
        </div>
        <div class="p-5 text-white">
            <h1>Name:<span class="ml-2">{{ $user->firstName }} {{ $user->lastName }}</span></h1><br/>
            <h1>Email:<span class="ml-2">{{ $user->email }}</span></h1>
            
        </div>
    </div>
</div>
@endsection