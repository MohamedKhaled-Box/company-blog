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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

@if (App::getLocale() == 'ar')

    <body class="font-sans antialiased" style="direction: rtl;">
    @else

        <body class="font-sans antialiased">
@endif

<nav class="bg-indigo-400 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('flags/MKM.png') }}" class="h-10" alt="MKM Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MKM</span>
        </a>
        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
            <button type="button" data-dropdown-toggle="language-dropdown-menu"
                class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
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
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                id="language-dropdown-menu">
                <ul class="py-2 font-medium" role="none">
                    <li>
                        <a href="{{ route('switch.language', 'en') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                                <img class="rounded-full w-6 h-6 pr-2" src="{{ asset('flags/us.svg') }}" alt="USA FLAG">
                                English
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('switch.language', 'ar') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                                <img class="rounded-full w-6 h-6 pr-2" src="{{ asset('flags/eg.svg') }}"
                                    alt="EGYPT FLAG">
                                اللغه العربيه
                            </div>
                        </a>
                    </li>


                </ul>
            </div>
            <button data-collapse-toggle="navbar-language" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-language" aria-expanded="false">
                <span class="sr-only">{{ __('Open main menu') }}</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

    </div>
</nav>
@foreach ($projects as $project)
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white grid place-content-evenly">
                        {{ $project->title }}</h1>
                    @if ($project->picture)
                        <div class="grid place-content-evenly px-8">
                            <img class="h-auto max-w-full mx-auto" src="{{ asset('pictures/' . $project->picture) }}"
                                alt="image description">
                        </div>
                    @endif
                    <div class="mt-8 px-8">
                        <p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400">
                            {{ $project->description }}</p>
                    </div>
                </div>
                {{-- <div class="mb-6 grid place-content-evenly px-8">
                        <a href="{{ route('projects.edit', $project->id) }}"> <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Edit') }}</button></a>
                    </div> --}}
            </div>
        </div>
    </div>
@endforeach
{{ $projects->links() }}


<footer class="bg-indigo-400 rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#"
                class="hover:underline">MKM™</a>. {{ __('All Rights Reserved.') }}
        </span>
        <div class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <form action="{{ route('send-mail') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subscribe to our maile service :') }}</label>
                    <input type="email" id="email" name="mail"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@mail.com" required />
                </div>
                <button type="submit"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    {{ __('Subscribe') }}</button>
            </form>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
