@extends('layouts.dashboard')

@section('title', 'Admin Users')

@section('style')
<style>
    .modal {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
    .custom-label input:checked + svg {
        display: block !important;
    }
</style>
<style>

	.duration-300 {
		transition-duration: 300ms;
	}
	.ease-in {
		transition-timing-function: cubic-bezier(0.4, 0, 1, 1);      
	}
	.ease-out {
		transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
	}
	.scale-90 {
		transform: scale(.9);
	}
	.scale-100 {
		transform: scale(1);
	}
	
  </style>
@endsection

@section('content') 
<div class="w-full flex justify-center">
    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded 
    focus:outline-none focus:shadow-outline ease-in-out text-l mb-4" href="{{ env('APP_URL') . "/register/" . $company->name }}">User Register Link</a>
</div> 
<div class="flex flex-wrap">
  <!--User Count -->
  <div class="w-full md:w-1/2 p-3">
      <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
          <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                  <div class="rounded p-3 bg-gray-700"><i class="text-gray-1000 fa fa-user fa-2x fa-fw fa-inverse"></i></div>
              </div>
              <div class="flex-1 text-right md:text-center">
                  <h5 class="font-bold uppercase text-gray-400">Total Staff</h5>
                  <h3 class="font-bold text-3xl text-gray-600">{{ $staff->count() }}</h3>
              </div>
          </div>
      </div>
  </div>
  <!--User Count -->
    <div class="w-full md:w-1/2 p-3">
        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-gray-700"><i class="text-gray-1000 fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-400">Total Users</h5>
                    <h3 class="font-bold text-3xl text-gray-600">{{ $staff->count()}} <span class="text-green-500"></i></span></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@if($staffToApprove->count() > 0)
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Staff To Approve</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">#</th>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Email</th>
                        <th class="text-center text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffToApprove as $staff)
                    <tr class="text-white pt-2">
                        <td class="text-center">{{ $staff->employeeNumber }}</td>
                        <td class="text-center">{{ $staff->firstName }} {{ $staff->lastName }}</td>
                        <td class="text-center">{{ $staff->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('company.staff.approve', $staff->id) }}"><i class="fas fa-thumbs-up pr-6"></i></a>
                            <a href="{{ route('company.staff.deny', $staff->id) }}"><i class="fas fa-thumbs-down"></i></a>
                        </td>
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
@endif
@if($activeStaff->count() >= 1)
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Active Staff</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">#</th>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Email</th>
                        <th class="text-center text-gray-600">Add Shifts</th>
                        <th class="text-center text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activeStaff as $staff)
                    <tr class="text-white pt-2 mb-4">
                        <td class="text-center">{{ $staff->employeeNumber }}</td>
                        <td class="text-center">{{ $staff->firstName }} {{ $staff->lastName }}</td>
                        <td class="text-center">{{ $staff->email }}</td>
                        <td class="text-center">
                            @livewire('add-shifts', ['staff' => $staff])  
                        </td>
                        <td class="text-center">
                            <form action="{{ route('company.staff.update') }}" method="POST" class="flex justify-center">
                                @CSRF
                                <input type="text" name="id" value="{{ $staff->id }}" hidden>
                                <select name="status" class="block appearance-none bg-transparent border-b border-gray-200 text-gray-600 py-3 px-4 pr-8 focus:outline-none">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                                <button type="submit"><i class="fa fa-sync"></i></button>
                            </form>
                        </td>
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
@endif
@if($inactiveStaff->count() >= 1)
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Inactive Staff</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">#</th>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Email</th>
                        <th class="text-center text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inactiveStaff as $staff)
                    <tr class="text-white pt-2">
                        <td class="text-center">{{ $staff->employeeNumber }}</td>
                        <td class="text-center">{{ $staff->firstName }} {{ $staff->lastName }}</td>
                        <td class="text-center">{{ $staff->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('company.staff.reinstate', $staff->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 my-2 rounded">
                                Reinstate
                            </a>
                        </td>
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
@endif
@endsection