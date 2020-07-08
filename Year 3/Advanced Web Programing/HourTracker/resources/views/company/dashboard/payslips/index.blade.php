@extends('layouts.dashboard')

@section('title', 'Company Roles')


@section('content') 
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Pay Slips</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">Date</th>
                        <th class="text-center text-gray-600">Total Pay</th>
                        <th class="text-center text-gray-600">Hours Worked</th>
                        <th class="text-center text-gray-600">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paySlips as $paySlip)
                    <tr class="text-white pt-2">
                        <td class="text-center">{{ Carbon\Carbon::parse($paySlip->date)->format('l jS M') }}</td>
                        <td class="text-center">{{ $paySlip->totalPay }}</td>
                        <td class="text-center">{{ $paySlip->hoursWorked }}</td>
                        <td class="text-center"><a href="{{ route('dashboard.payslips.download', $paySlip->id) }}" class="hover:text-gray-400"><i class="fa fa-download"></i></a></td>
                    </tr>
                    @endforeach                  
                </tbody>
            </table>
              
            <div class="mt-8 mb-4">
            </div> 
        </div>
    </div>
</div>
@endsection