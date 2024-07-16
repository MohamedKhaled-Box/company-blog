<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                <div class="mb-6 grid place-content-evenly px-8">
                    <a href="{{ route('projects.edit', $project->id) }}"> <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            edit</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
