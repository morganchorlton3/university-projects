@extends('layouts.dashboard')

@section('title', 'Account')

@section('content')
<div class="flex">
  <div class="w-1/2 bg-gray-900 shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-4 flex flex-col my-2 mt-20 text-white">
    <h1>Update Details:</h1>
    <form action="{{ route('change.details') }}" method="POST">
      <input type="text" name="id" value="{{ $user->id }}" hidden>
      @CSRF
      <div class="w-full flex justify-start mt-4">
        <!--First Name-->
        <div class="w-1/2 px-2">
            <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                @error('firstName') border-red-500 @enderror" name="firstName" placeholder="{{ __("First Name") }}" required value="{{ $user->firstName }}">
                @error('firstName')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- Last Name -->
        <div class="w-1/2 px-2">
            <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                @error('lastName') border-red-500 @enderror" name="lastName" placeholder="{{ __("Last Name") }}" required value="{{ $user->lastName }}">
                @error('lastName')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
          </div> 
        </div>
      </div>
      <div class="w-full">
         <!-- Notifications Preferances --> 
         <div class="flex flex-wrap mb-6" data-aos="zoom-in">
          <label class="text-gray-600 text-m pb-2 text-center w-full">Notification Preferances</label>
           <select name="notificationPreferances" class="block appearance-none w-full bg-transparent border-b border-gray-200 text-gray-600 py-3 px-4 pr-8 leading-tight">   
            <option value="mail" @if($user->notificationPref == 'mail') selected @endif>Email</option>
            <option value="database" @if($user->notificationPref == 'database') selected @endif>Web</option>
            <option value="mail, database" @if($user->notificationPref == 'mail, database') selected @endif>Email and Web</option>
           </select>
           @error('notificationPreferances')
               <p class="text-red-500 text-xs italic mt-4">
                   {{ $message }}
               </p>
           @enderror
        </div>
      </div>
      <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded 
          focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
          {{ __('Update details') }}
        </button>
    </form>
  </div>
<div class=" w-1/2 bg-gray-900 shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-4 flex flex-col my-2 mt-20 text-white">
    <h1>Change Password:</h1>
    <form action="{{ route('change.password') }}" method="POST">
      <div class="w-full flex justify-start mt-4">
      @CSRF
          <!--Password-->
          <div class="w-1/2 px-2">
              <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                  <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                  @error('password') border-red-500 @enderror" name="password" placeholder="{{ __("New Password") }}" required>
                  @error('password')
                  <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                  @enderror
              </div>
          </div>
          <!-- Confirm Password-->
          <div class="w-1/2 px-2">
              <div class="flex flex-wrap mb-6" data-aos="zoom-in">
                  <input class="appearance-none bg-transparent border-b text-white w-full py-2 px-3 mb-3 
                  @error('confirmPassword') border-red-500 @enderror" name="confirmPassword" placeholder="{{ __("Confirm Password") }}" required>
                  @error('confirmPassword')
                  <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                  @enderror
              </div> 
          </div>
        </div>
        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded 
          focus:outline-none focus:shadow-outline w-full transition duration-150 ease-in-out ">
          {{ __('Update Password') }}
        </button>
      </form>
 
  </div>
</div>
@endsection