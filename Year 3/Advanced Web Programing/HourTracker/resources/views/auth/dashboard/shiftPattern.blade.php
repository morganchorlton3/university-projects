@extends('layouts.dashboard')

@section('title', 'Shifts')

@section('content')
@if($shifts == null)
@hasrole('companyUser')
<div class="w-full p-3">
    <div class="bg-transparent rounded mt-12">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Please Wait for Your Manager to add your Shifts</h5>
        </div>
    </div>
</div>
@endhasrole
@else
<div class="w-full p-3">
    <div class="bg-transparent rounded mt-12">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Shift Pattern</h5>
        </div>
        <div class="p-5">
            @if($shifts == null)
            <form action="{{ route('shifts.create') }}" method="POST">
            @else
            <form action="{{ route('dashboard.shifts.update') }}" method="POST">
            @endif
            <input type="text" value="{{ Auth::id() }}" hidden name="id">
                @CSRF
                <table class="w-full p-5 text-gray-700">
                    <thead>
                        <tr>
                            <th class="text-center text-gray-600">#</th>
                            <th class="text-center text-gray-600">Monday</th>
                            <th class="text-center text-gray-600">Tuesday</th>
                            <th class="text-center text-gray-600">Wednesday</th>
                            <th class="text-center text-gray-600">Thursday</th>
                            <th class="text-center text-gray-600">Friday</th>
                            <th class="text-center text-gray-600">Saturday</th>
                            <th class="text-center text-gray-600">Sunday</th>
                        </tr>
                    </thead>
                    @if($shifts == null)
                    <tbody>
                        <tr class="h-24">
                            <th>Start Time</th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="mondayCI">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="tuesdayCI">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="WednesdayCI">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="thursdayCI">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="fridayCI">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="saturdayCI">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="sundayCI">
                            </th>
                        </tr>
                        <tr>
                            <th class="cell100 column8 p-2" scope="row">End Time</th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="mondayCO">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="tuesdayCO">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="WednesdayCO">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="thursdayCO">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="fridayCO">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="saturdayCO">
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="sundayCO">
                            </th>
                        </tr>               
                    </tbody>
                    @else
                    <tbody>
                        <tr class="h-24">
                            <th>Start Time</th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="mondayCI" 
                                    @if($shifts->mondayCI != null) value="{{ Carbon\Carbon::parse($shifts->mondayCI)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="tuesdayCI"
                                    @if($shifts->tuesdayCI != null) value="{{ Carbon\Carbon::parse($shifts->tuesdayCI)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="WednesdayCI"
                                    @if($shifts->wednesdayCI != null) value="{{ Carbon\Carbon::parse($shifts->wednesdayCI)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="thursdayCI"
                                    @if($shifts->thursdayCI != null) value="{{ Carbon\Carbon::parse($shifts->thursdayCI)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="fridayCI"
                                    @if($shifts->fridayCI != null) value="{{ Carbon\Carbon::parse($shifts->fridayCI)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="saturdayCI"
                                    @if($shifts->saturdayCI != null) value="{{ Carbon\Carbon::parse($shifts->saturdayCI)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="sundayCI"
                                    @if($shifts->sundayCI != null) value="{{ Carbon\Carbon::parse($shifts->sundayCI)->format('H:i') }}" @endif>
                            </th>
                        </tr>
                        <tr>
                            <th class="cell100 column8 p-2" scope="row">End Time</th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="mondayCO"
                                    @if($shifts->mondayCO != null) value="{{ Carbon\Carbon::parse($shifts->mondayCO)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="tuesdayCO"
                                    @if($shifts->tuesdayCO != null) value="{{ Carbon\Carbon::parse($shifts->tuesdayCO)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="WednesdayCO"
                                    @if($shifts->wednesdayCO != null) value="{{ Carbon\Carbon::parse($shifts->wednesdayCO)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="thursdayCO"
                                    @if($shifts->thursdayCO != null) value="{{ Carbon\Carbon::parse($shifts->thursdayCO)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="fridayCO"
                                    @if($shifts->fridayCO != null) value="{{ Carbon\Carbon::parse($shifts->fridayCO)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="saturdayCO"
                                    @if($shifts->saturdayCO != null) value="{{ Carbon\Carbon::parse($shifts->saturdayCO)->format('H:i') }}" @endif>
                            </th>
                            <th>
                                <input class="bg-transparent  text-white focus:outline-none border-b border-gray-300 py-2 
                                    px-4 w-20 appearance-none leading-normal" placeholder="00:00" name="sundayCO"
                                    @if($shifts->sundayCO != null) value="{{ Carbon\Carbon::parse($shifts->sundayCO)->format('H:i') }}" @endif>
                            </th>
                        </tr>               
                    </tbody>
                    @endif
                </table>
                
                <div class="flex justify-center">
                    <button class="bg-gray-800 hover:bg-gray-700 w-3/4 mt-12 mb-4 text-white font-bold py-2 px-4 rounded">
                        @if($shifts == null)Save @else Update @endif
                    </button>
                </div>
                  
            </form>

        </div>
    </div>
</div>
@endif
@endsection