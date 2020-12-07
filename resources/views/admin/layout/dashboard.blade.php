<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- SEO  -->
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script> --}}



</head>

<body class="bg-grey-lightest font-sans leading-normal tracking-normal">

    <nav id="header" class="bg-white fixed w-full z-10 pin-t shadow">


        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                {{--  <a class="text-black text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
                    <i class="fas fa-sun text-orange-dark pr-3"></i> Admin Day Mode
                </a>  --}}
            </div>
            <div class="w-1/2 pr-0">

                <div class="flex relative inline-block float-right">

                    <div class="relative text-sm">

                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            {{-- <span class=" md:inline-block mr-3 text-green-600"> ₦{{Auth::user()->account_balance}}</span>                   --}}
                            <img class="w-8 h-8 rounded-full mr-4" src="{{ asset('images/profile') }}/{{Auth::user()->profile_photo_path }}" alt=""> <span class="hidden md:inline-block"> {{Auth::user()->name }} </span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 pin-t pin-r min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="{{ route('admin.profile', Auth::user()->id) }}" class="px-4 py-2 block text-black hover:bg-grey-light no-underline hover:no-underline">Profile</a></li>
                                {{-- <li><a href="#" class="px-4 py-2 block text-black hover:bg-grey-light no-underline hover:no-underline">Notifications</a></li> --}}
                                <li>
                                    <hr class="border-t mx-2 border-grey-light">
                                </li>
                                <li><a href="{{ route('logout') }}"
                                    class="px-4 py-2 block text-black hover:bg-grey-light no-underline hover:no-underline"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        {{ csrf_field() }}
                                    </form>
                            </ul>
                        </div>
                    </div>


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-black hover:border-teal appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('admin') }}" class="block py-1 md:py-3 pl-1 align-middle text-orange-dark no-underline hover:text-purple-400 {{ request()->is('admin') ? 'border-b-2 border-orange-dark text-purple-300' : '' }}  hover:border-orange-dark ">
                            <i class="fas fa-home fa-fw mr-3 text-orange-dark"></i><span class="pb-1 md:pb-0 text-sm">Dashboard</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-grey no-underline hover:text-purple-400 {{ request()->is('admin/users') ? 'border-b-2 border-orange-dark text-purple-300' : '' }} hover:border-orange-dark">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Users</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('transactions.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-grey no-underline hover:text-purple-400 {{ request()->is('admin/transactions') ? 'border-b-2 border-orange-dark text-purple-300' : '' }} hover:border-orange-dark">
                            <i class="fa fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Transactions</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('withdrawal.request') }}" class="block py-1 md:py-3 pl-1 align-middle text-grey no-underline hover:text-purple-400 {{ request()->is('admin/withdrawal-requests') ? 'border-b-2 border-orange-dark text-purple-300' : '' }} hover:border-orange-dark">
                            <i class="fas fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm"> Withdrawal Requests </span>
                        </a>
                    </li>

                </ul>

                @hasSection('search')
                    @yield('search')
                @endif

            </div>

        </div>
    </nav>

    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-grey-darkest leading-normal">
             <!--Console Content-->


             {{-- Section to yield contents --}}

             @yield('content')



            <!--/ Console Content-->

        </div>

    </div>
    <!--/container-->

    <footer class="bg-white border-t border-grey-light shadow">
        <div class="container max-w-md mx-auto flex py-8">

            <div class="w-full mx-auto flex flex-wrap">
                <div class="flex w-full md:w-1/1 ">
                    <div class="px-8">
                        <p class="font-normal text-gray-600 text-sm">© All rights reserved. 1minuteTrade</p>
                        <p class="py-4 text-grey-dark text-sm">

                        </p>
                    </div>
                </div>

               {{--   <div class="flex w-full md:w-1/2">
                    <div class="px-8">
                        <h3 class="font-bold text-black">Social</h3>
                        <ul class="list-reset items-center text-sm pt-3">
                            <li>
                                <a class="inline-block text-grey-dark no-underline hover:text-black hover:text-underline py-1" href="#">Add social link</a>
                            </li>
                            <li>
                                <a class="inline-block text-grey-dark no-underline hover:text-black hover:text-underline py-1" href="#">Add social link</a>
                            </li>
                            <li>
                                <a class="inline-block text-grey-dark no-underline hover:text-black hover:text-underline py-1" href="#">Add social link</a>
                            </li>
                        </ul>
                    </div>
                </div>  --}}

            </div>



        </div>
    </footer>

    <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else { userMenuDiv.classList.add("invisible"); }
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
                } else { navMenuDiv.classList.add("hidden"); }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) { return true; }
            t = t.parentNode;
        }
        return false;
    }
    </script>



</body>

</html>
