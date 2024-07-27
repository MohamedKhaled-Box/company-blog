<x-guest-layout>
    @foreach ($projects as $project)
        <div class="py-12 flex">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <a href="{{ route('pro.show', $project->id) }}">
                            <h1
                                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white grid place-content-evenly">
                                {{ $project->title }}</h1>
                        </a>
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
                        <div class="inline-flex font-medium items-center text-gray-600">
                            {{ $project->created_at->format('Y-m-d') }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $projects->links() }}
</x-guest-layout>
