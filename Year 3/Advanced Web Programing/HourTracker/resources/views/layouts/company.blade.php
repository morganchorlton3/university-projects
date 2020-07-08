<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | @yield('title')</title>	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Style -->
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

	<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  

	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

	<style>
		.bg-black-alt  {
			background:#191919;
		}
		.text-black-alt  {
			color:#191919;
		}
		.border-black-alt {
			border-color: #191919;
		}

		body{
            font-family: 'Poppins', sans-serif;
			overflow-x: hidden;
		}

	</style>

	<!-- Livewire styles -->
    @livewireStyles
	@yield('style')


</head>
<body class="bg-gray-1000 leading-normal tracking-normal">
	@include('sweetalert::alert')
	@include('layouts.partials.nav')
	<!--<main id="swup" class="transition-swipe">-->
	<!--Container-->
	<div class="container w-full mx-auto pt-20">
		
		<div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
			
			@yield('content')
					
		</div>
		

	</div>

	<!--</main> -->
	<!--/container-->
	{{--
	<footer class="bg-gray-900 border-t border-gray-400 shadow">	
		<div class="container max-w-md mx-auto flex py-8">
			<div class="w-full mx-auto flex flex-wrap">
				<h3 class="font-bold font-bold text-gray-100">Created By Morgan Chorlton</h3>
			</div>		
		</div>
	</footer>--}}
<!-- LiveWire scripts -->
    @livewireScripts
<script>
	
	
	/*Toggle dropdown list*/
	/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

	var userMenuDiv = document.getElementById("userMenu");
	var userMenu = document.getElementById("userButton");
	
	var navMenuDiv = document.getElementById("nav-content");
	var navMenu = document.getElementById("nav-toggle");
	
	document.onclick = check;

	function check(e){
	  var target = (e && e.target) || (event && event.srcElement);

	  //User Menu
	  if (!checkParent(target, userMenuDiv)) {
		// click NOT on the menu
		if (checkParent(target, userMenu)) {
		  // click on the link
		  if (userMenuDiv.classList.contains("invisible")) {
			userMenuDiv.classList.remove("invisible");
		  } else {userMenuDiv.classList.add("invisible");}
		} else {
		  // click both outside link and outside menu, hide menu
		  userMenuDiv.classList.add("invisible");
		}
	  }
	  
	  //Nav Menu
	  if (!checkParent(target, navMenuDiv)) {
		// click NOT on the menu
		if (checkParent(target, navMenu)) {
		  // click on the link
		  if (navMenuDiv.classList.contains("hidden")) {
			navMenuDiv.classList.remove("hidden");
		  } else {navMenuDiv.classList.add("hidden");}
		} else {
		  // click both outside link and outside menu, hide menu
		  navMenuDiv.classList.add("hidden");
		}
	  }
	  
	}

	function checkParent(t, elm) {
	  while(t.parentNode) {
		if( t == elm ) {return true;}
		t = t.parentNode;
	  }
	  return false;
	}


</script>
<script>
	const swup = new Swup();
</script>
@yield('scripts')
</body>
</html>