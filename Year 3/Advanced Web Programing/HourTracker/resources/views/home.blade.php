@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="flex flex-col text-white">
                <h1 class=" flex justify-center text-6xl" data-aos="zoom-in" data-aos-duration="500">Hour Tracker</h1>
                <div class="inline-flex flex justify-center pt-10">
                    <form class="content-block" method="POST" action="{{ route('clock.in') }}">
                        {{ csrf_field() }}
                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l" data-aos="fade-right" data-aos-duration="1000">
                            Clock In
                        </button>
                    </form>
                    <form class="content-block" method="POST" action="{{ route('clock.out') }}">
                        {{ csrf_field() }}
                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r" data-aos="fade-left" data-aos-duration="1000">
                            Clock Out
                        </button>
                    </form>
                </div>
                @if($clock != null)
                <div class="inline-flex flex justify-center pt-10">
                    <h1 data-aos="zoom-in" data-aos-duration="500">You Clocked in at {{ $clock->clockIn }}</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection