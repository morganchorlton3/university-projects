<nav id="header" class="bg-gray-1000 fixed w-full z-10 top-0 shadow">

    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-3">
            
        <div class="w-1/2 pl-2 md:pl-0">
            <a class="text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold"  href="#"> 
                Hour Tracker
            </a>
        </div>
        <div class="w-1/2 pr-0">
            <div class="flex relative inline-block float-right">

                <div class="relative text-sm text-gray-100 flex items-center justify-center">
                    @if(Auth::user()->unreadNotifications->count() != 0)
                    <button id="userButton" class="flex items-center focus:outline-none mr-3 align-middle">
                      <span class="text-gray-100"><i class="fa fa-bell fa-fw mr-3"></i></span>
                    </button>
                    <div id="userMenu" class="bg-gray-700 rounded shadow-md mt-2 absolute mt-8 top-0 right-0 min-w-full w-64 overflow-auto z-30 invisible">
                        <p class="p-2">Notifications</p>
                        <ul class="list-reset">
                            @foreach(Auth::user()->unreadNotifications as $notification)
                                @if($notification ->type == "App\Notifications\CompanyNewUserRegisterd")
                                    <li><a href="{{ route('admin.notification.read', $notification->id) }}" 
                                        class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline border-l-2 border-red-400">
                                        User Register Reqeust Recived
                                    </a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="w-full text-center p-3">
                            <a class=" hover:text-blue-400" href="">Clear Notifications</a>
                        </div>
                    </div>
                    @endif
                </div>
            
                <div class="block lg:hidden pr-4">
                <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-100 hover:border-teal-500 appearance-none focus:outline-none">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            </div>

        </div>


        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-900 z-20" id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0 text-gray-500">
                    <a href="{{ route('company.home') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                    hover:text-gray-100 border-b-2 border-gray-900  hover:border-blue-400 {{Request::path() == 'company' ? 'border-blue-400 text-white' : ''}}">
                        <i class="fa fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0 text-gray-500">
                    <a href="{{ route('admin.users') }}--}}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                    hover:text-gray-100 border-b-2 border-gray-900  hover:border-red-400 {{Request::path() == 'company/users' ? 'text-gray-100 border-red-400 ' : ''}}">
                        <i class="fa fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Users</span>
                    </a>
                </li>
            </ul>				
        </div>
        
    </div>
</nav>