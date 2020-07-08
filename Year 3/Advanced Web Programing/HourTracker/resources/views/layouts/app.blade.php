<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Style -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css" integrity="sha256-eacfEFFt07So0i0jcf0GCoJfYEnTpTelDK3/9zN+P0g=" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <style>
        [x-cloak] {
          display: none;
        }
        body{
            font-family: 'Poppins', sans-serif;
        }
      </style>


    <!-- Livewire styles -->
    @livewireStyles
<body>
    @include('sweetalert::alert')
    <div class="absolute top-0 w-full h-full bg-gray-900">
        <div class="fixed w-full pt-4 z-50 flex items-start">
            <div class="fixed top-0 left-0 mt-2 ml-2" data-aos="fade-down-right">
                <a href="" class="text-white text-3xl pr-4 mt-4">
                    <i class="far fa-clock"></i>
                </a>
            </div>
            <div class="mx-auto sm:mt-0" data-aos="fade-down">
                @livewire('search')
                {{--@include('partials.datePicker')--}}
            </div>
            <div class="fixed top-0 right-0 mt-2 mr-2 " data-aos="fade-down-left">
                @auth
                    <a href="/account" class="text-white text-3xl pr-4 mt-4"><i class="far fa-user"></i></a>
                @endauth
                @guest
                    <a href="{{ route('register') }}" class="text-white text-3xl pr-4 mt-4"><i class="far fa-user"></i></a>
                @endguest
            </div>
        </div>

        
        @yield('content')
       
    </div>

    <!-- LiveWire scripts -->
    @livewireScripts

    <script
  src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @yield('scripts')
</body>
</html>
