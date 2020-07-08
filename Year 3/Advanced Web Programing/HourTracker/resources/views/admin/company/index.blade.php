@extends('layouts.dashboard')

@section('title', 'Admin Company')

@section('content') 
@if($requests->count() > 0)
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Company Requests</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">#</th>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Employees</th>
                        <th class="text-center text-gray-600">Reason</th>
                        <th class="text-center text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr class="text-white pt-2">
                            <td class="text-center">{{ $request->id }}</td>
                            <td class="text-center">{{ $request->name }}</td>
                            <td class="text-center">{{ $request->employees }}</td>
                            <td class="text-center">{{ $request->reason }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.company.approve', $request->id) }}"><i class="fas fa-thumbs-up pr-6"></i></a>
                                <a href="{{ route('admin.company.deny', $request->id) }}"><i class="fas fa-thumbs-down"></i></a>
                            </td>
                        </tr>
                    @endforeach                            
                </tbody>
            </table>
            <div class="mt-8 mb-4">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
@endif

<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Companies</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">#</th>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Employees</th>
                        <th class="text-center text-gray-600">Reason</th>
                        <th class="text-center text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr class="text-white pt-2">
                            <td class="text-center">{{ $company->id }}</td>
                            <td class="text-center">{{ $company->name }}</td>
                            <td class="text-center">{{ $company->employees }}</td>
                            <td class="text-center">{{ $company->reason }}</td>
                            <td class="text-center"><a href=""><i class="fas fa-eye"></i></a></td>
                        </tr>
                    @endforeach                            
                </tbody>
            </table>
            <div class="mt-8 mb-4">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection