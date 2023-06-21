<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
              
                
                    <div x-data="{ isOpen: false }">
                        <div class="relative">
                          <button @click="isOpen = !isOpen" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            I am a
                            <svg :class="{'transform rotate-180': isOpen}" class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M6.707 9.293a1 1 0 0 1 1.414 0L10 11.586l1.879-1.879a1 1 0 1 1 1.414 1.414l-2.828 2.828a1 1 0 0 1-1.414 0L6.707 10.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"></path>
                            </svg>
                          </button>
                      
                          <div x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 w-40 py-2 mt-2 bg-white rounded-md shadow-lg">
                            <a href="{{ route('job_seeker') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Job Seeker</a>
                            <a href="{{ route('employer') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Employer</a>
                            <a href="{{ route('case_manager') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Case Manager</a>
                          </div>
                        </div>
                    </div>

                    <a href="{{ route('how-it-works') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">How it works</a>
                    <a href="{{ route('contact') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Contact Us</a>


                    
                   
                @endauth
            </div>
        @endif

 
                {{ $slot }}
            
    </body>
</html>
