<nav id="header" class="bg-gray-900 fixed w-full z-10 top-0 shadow">

    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-3">
            
        <div class="w-1/2 pl-2 md:pl-0">
            <a class="text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold"  href="#"> 
                Hour Tracker
            </a>
        </div>
        <div class="w-1/2 pr-0">
            <div class="flex relative inline-block float-right">
            
              <div class="relative text-sm text-gray-100 flex items-center justify-center ">
                @if(Auth::user()->unreadNotifications->count() != 0)
                    <button id="notificationsButton" class="flex items-center focus:outline-none mr-3 align-middle">
                        <span class="text-gray-100"><i class="fa fa-bell fa-fw mr-3"></i></span>
                    </button>
                    <div id="notificationsMenu" class="bg-gray-800 rounded shadow-md mt-10 absolute mt-8 top-0 right-0 min-w-full w-64 overflow-auto z-30 invisible">
                        <p class="p-2">Notifications</p>
                        <ul class="list-reset">
                            @foreach(Auth::user()->unreadNotifications as $notification)
                                @if($notification ->type == "App\Notifications\CompanyNewUserRegisterd")
                                    <li><a href="{{ route('admin.notification.read', $notification->id) }}" 
                                        class="px-4 py-2 block text-gray-100 hover:bg-gray-700 no-underline hover:no-underline border-l-2 border-red-400">
                                        User Register Reqeust Recived
                                    </a></li>
                                @elseif($notification ->type == "App\Notifications\ConfirmCompany")
                                    <li><a href="{{ route('admin.notification.read', $notification->id) }}" 
                                        class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline border-l-2 border-red-400">
                                        New Company Register Request
                                    </a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="w-full text-center p-3">
                            <a class=" hover:text-blue-400" href="">Clear Notifications</a>
                        </div>
                    </div>
                @endif
                  <button id="userButton" class="flex items-center focus:outline-none mr-3 align-middle">
                    <span class="text-gray-100">Hi, {{ Auth::user()->firstName }}</span>
                    <svg class="pl-2 h-2 fill-current text-gray-100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
                  </button>
                  <div id="userMenu" class="bg-gray-800 rounded shadow-md mt-2 absolute mt-10 top-0 right-0 min-w-full w-40 overflow-auto z-30 invisible">
                      <ul class="list-reset">
                        <li><a href="{{  route('account') }}" class="px-4 py-2 block text-gray-100 hover:bg-gray-700 no-underline hover:no-underline">Profile</a></li>
                        <li><hr class="border-t border-gray-400"></li>
                        <li><a href="{{ route('logout') }}" class="px-4 py-2 block text-gray-100 hover:bg-gray-700 no-underline hover:no-underline">Logout</a></li>
                      </ul>
                  </div>
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
                @hasrole('admin')
                    {{--<li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('admin.home') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-blue-400 {{Request::path() == 'dashboard' ? 'border-blue-400 text-white' : ''}}">
                            <i class="fa fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>--}}
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('admin.users.index') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-red-400 {{Request::path() == 'admin/users' ? 'text-gray-100 border-red-400 ' : ''}}">
                            <i class="fa fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Users</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('admin.company.index') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400 {{Request::path() == 'admin/companies' ? 'text-gray-100 border-purple-400 ' : ''}}">
                            <i class="fa fa-building fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Companies</span>
                        </a>
                    </li>
                @endhasrole
                @hasrole('manager')
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('dashboard.home') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-blue-400 {{Request::path() == 'dashboard' ? 'border-blue-400 text-white' : ''}}">
                            <i class="fa fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('company.staff.index') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-red-400 {{Request::path() == 'company/staff' ? 'text-gray-100 border-red-400 ' : ''}}">
                            <i class="fa fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Staff</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('company.roles.index') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400 {{Request::path() == 'company/roles' ? 'text-gray-100 border-red-400 ' : ''}}">
                            <i class="fa fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Roles</span>
                        </a>
                    </li>
                @endhasrole
                @hasrole('user')
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('dashboard.home') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-blue-400 {{Request::path() == 'dashboard' ? 'border-blue-400 text-white' : ''}}">
                            <i class="fa fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('dashboard.shifts') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-red-400 {{Request::path() == 'dashboard/shifts' ? 'text-gray-100 border-red-400 ' : ''}}">
                            <i class="fa fa-calendar fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Shifts</span>
                        </a>
                    </li>
                @hasrole('companyUser')
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('dashboard.payslips.index') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-green-400 {{Request::path() == 'dashboard/payslips' ? 'text-gray-100 border-green-400 ' : ''}}">
                            <i class="fa fa-file-invoice fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Pay Slips</span>
                        </a>
                    </li>
                @endhasrole
                    <li class="mr-6 my-2 md:my-0 text-gray-500">
                        <a href="{{ route('dashboard.clocks.index') }}" class="block py-1 md:py-3 pl-1 align-middle no-underline 
                        hover:text-gray-100 border-b-2 border-gray-900  hover:border-purple-400 {{Request::path() == 'dashboard/clocks' ? 'text-gray-100 border-purple-400 ' : ''}}">
                            <i class="fa fa-clock fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Clocks</span>
                        </a>
                    </li>
                @endhasrole
              
            </ul>				
        </div>
        
    </div>
</nav>