@extends('layouts.auth')

@section('title', 'Company Not Found')

@section('content')
<div class="absolute top-0 w-full h-full bg-gray-900 flex content-center items-center justify-center ">
    <div class="container">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words">
                    <h1 class="text-white text-center text-4xl mb-4">Sorry!</h1>
                    <h1 class="text-white text-xl text-center"> That Company doesn't exist please check you have the correct registration link.</h1>
                    <p class="text-white text-center mt-24">You will be redirected in 10 seconds.</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection