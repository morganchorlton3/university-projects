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
<div class="flex flex-wrap">
  <!--User Count -->
  <div class="w-full md:w-1/2 p-3">
      <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
          <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                  <div class="rounded p-3 bg-gray-700"><i class="text-gray-1000 fa fa-user fa-2x fa-fw fa-inverse"></i></div>
              </div>
              <div class="flex-1 text-right md:text-center">
                  <h5 class="font-bold uppercase text-gray-400">Total Users</h5>
                  <h3 class="font-bold text-3xl text-gray-600">{{ App\User::all()->count()}}</h3>
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
                <h3 class="font-bold text-3xl text-gray-600">{{ App\User::all()->count()}} <span class="text-green-500"></i></span></h3>
            </div>
        </div>
    </div>
</div>
</div>
<div class="w-full p-3">
    <div class="bg-gray-900 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-600">Users</h5>
        </div>
        <div class="p-5">
            <table class="w-full p-5 text-gray-700">
                <thead>
                    <tr>
                        <th class="text-center text-gray-600">#</th>
                        <th class="text-center text-gray-600">Name</th>
                        <th class="text-center text-gray-600">Email</th>
                        <th class="text-center text-gray-600">Role</th>
                        <th class="text-center text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="text-white pt-2">
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->firstName }} {{ $user->lastName }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td class="text-center">
                            {{--<a href="{{ route('admin.users.show', $user->id) }}"><i class="fas fa-pen"></i></a>--}}
                            {{--<input class="text-black" type="text" wire:model="idToEdit" value="{{ $user->id }}">
                            <button @click="open = true"><i class="fas fa-pen"></i></button>--}}
                            @livewire('user-edit', ['user' => $user, 'roles' => $roles])    
                        </td>
                    </tr>
                    @endforeach                  
                </tbody>
            </table>
              
            <div class="mt-8 mb-4">
                {{ $users->links() }}
            </div> 
        </div>
    </div>
    {{--@include('admin.users.edit')--}}
</div>

@endsection