<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .liked {
            color: #3333ff;
        }

    </style>
    <title>{{ config('app.name', 'MKM') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/597cb1f685.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased flex flex-col min-h-screen {{ App::getLocale() == 'ar' ? 'rtl' : '' }}">
    <nav class="bg-indigo-400 border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('flags/MKM.png') }}" class="h-10" alt="MKM Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MKM</span>
            </a>
            @if (Auth::guest())
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('LogIn') }}
                </x-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('register') }}
                </x-nav-link>
            </div>
            @else

            @can('Admin')
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('projects.index') }}" :active="request()->routeIs('projects.index')">
                    {{ __('Admin Dashboard') }}
                </x-nav-link>
            </div>
            @endcan
            <div class="ms-3 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md">
                                {{ Auth::user()->name }}

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('edit.profile') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endif
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('pro') }}" :active="request()->routeIs('pro')">
                    {{ __('projects') }}
                </x-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('contactus') }}" :active="request()->routeIs('contactus')">
                    {{ __('Stay in touch') }}
                </x-nav-link>
            </div>

            <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
                <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    @if (App::getLocale() == 'ar')
                    <div class="inline-flex items-center">
                        <img class="rounded-full w-6 h-6 pr-2" src="{{ asset('flags/eg.svg') }}" alt="EGYPT FLAG">
                        اللغه العربيه
                    </div>
                    @else
                    <div class="inline-flex items-center">
                        <img class="rounded-full w-6 h-6 pr-2" src="{{ asset('flags/us.svg') }}" alt="USA FLAG">
                        English
                    </div>
                    @endif
                </button>
                <!-- Dropdown -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="language-dropdown-menu">
                    <ul class="py-2 font-medium" role="none">
                        <li>
                            <a href="{{ route('switch.language', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                <div class="inline-flex items-center">
                                    <img class="rounded-full w-6 h-6 pr-2" src="{{ asset('flags/us.svg') }}" alt="USA FLAG">
                                    English
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('switch.language', 'ar') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                <div class="inline-flex items-center">
                                    <img class="rounded-full w-6 h-6 pr-2" src="{{ asset('flags/eg.svg') }}" alt="EGYPT FLAG">
                                    اللغه العربيه
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="bg-indigo-400 rounded-lg shadow m-4 dark:bg-gray-800 bg-gray-800 text-white p-4 mt-auto">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">MKM™</a>. {{ __('All Rights Reserved.') }}
            </span>
            <div class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <form action="{{ route('send-mail') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subscribe to our mail service :') }}</label>
                        <input type="email" id="email" name="mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@mail.com" required />
                    </div>
                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        {{ __('Subscribe') }}</button>
                </form>
            </div>
        </div>
    </footer>
    @yield('scripts')
    @stack('modals')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
