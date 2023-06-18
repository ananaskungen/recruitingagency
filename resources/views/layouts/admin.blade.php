<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
       <div class="relative min-h-screen md:flex" x-data="{ open: true }">
        
        <aside :class="{ '-translate-x-full': !open }" class="z-10 bg-blue-800 text-blue-100 w-64 px-2 py-4 absolute inset-y-0 
        left-0 md:relative transform  md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
            <div class="flex items-center justify-between px-2">
            <div class="flex items-center space-x-2">
                <a href="{{ route('dashboard')}}">
                    <x-application-logo class="block h-9 w-auto fill-current text-blue-100" /> 
                </a>
                <span class="text-2xl font-extrabold">Admin</span>
            </div>
                <button type="button" @click="open = !open" class="md:hideen inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        {{-- Nav Link --}}
            <nav class="mt-4">

                <div class="relative">

                    <ul class="block w-11/12 my-4 mx-auto" x-data="{ selected: null }">
                        <li class="flex bg-gray-400 flex-col">
                            <h4 @click="selected !== 0 ? selected = 0 : selected = null" class="cursor-pointer px-5 py-3 bg-gray-700 text-center" @click.stop="">
                                Recruiting
                            </h4>
                            <div x-show="selected === 0 || '{{ request()->routeIs('job-seeker-applications') }} || '{{ request()->routeIs('case-manager-applications') }}' || '{{ request()->routeIs('employer-applications') }}'">
                                <x-side-nav-link href="{{ route('job-seeker-applications') }}" :active="request()->routeIs('job-seeker-applications')" @click="selected = 0">
                                    Job Seekers
                                </x-side-nav-link>
                                <x-side-nav-link href="{{ route('case-manager-applications') }}" :active="request()->routeIs('case-manager-applications')" @click="selected = 0">
                                    Case Managers
                                </x-side-nav-link>
                                <x-side-nav-link href="{{ route('employer-applications') }}" :active="request()->routeIs('employer-applications')" @click="selected = 0">
                                    Employer
                                </x-side-nav-link>
                            </div>
                        </li>
                        
                        <li class="flex bg-gray-500 mt-3 flex-col">
                            <h4 @click="selected !== 1 ? selected = 1 : selected = null" class="cursor-pointer px-5 py-3 bg-gray-700 text-center" @click.stop="">
                                Approved Applicants
                            </h4>
                            <div x-show="selected === 1 || '{{ request()->routeIs('approved-job-seeker') }}'">
                                <x-side-nav-link  href="{{ route('approved-job-seeker') }}" :active="request()->routeIs('approved-job-seeker')" @click="selected = 1">
                                    Job Seekers
                                </x-side-nav-link>
                                <x-side-nav-link href="{{ route('approved-case-manager') }}" :active="request()->routeIs('approved-case-manager')" @click="selected = 1">
                                    Case Managers
                                </x-side-nav-link>
                                <x-side-nav-link href="{{ route('approved-employer') }}" :active="request()->routeIs('approved-employer')" @click="selected = 1">
                                    Employer
                                </x-side-nav-link>
                            </div>
                        </li>
                    </ul>
                    
                    
                    
                    
                    
                    
                </div>
            </nav>
                            
     
        </aside>

        <main class="flex-1 bg-gray-100 h-screen">
            <nav class="bg-blue-900 shadow-lg">
                <div class="mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between md:justify-end h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                            {{-- Mobile button --}}
                            <button type="button" @click="open = !open" @click.away="open = false" class="inline-flex items-center justify-center 
                            p-2 rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                              </svg>
                            </button>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
            
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
            
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
          
                    </div>
                </div>

            </nav>

            {{  $slot   }}
            
        </main>
    </div>
    </body>
</html>

