<x-guest-layout>
    <section class="text-center mb-12 mt-6">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            {{ __('Welcome to') }}
        </h1>
        <span
            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400 text-4xl font-extrabold leading-none tracking-tight ">{{ __("MKM's Company") }}</span>
        <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
            <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">
                {{ __("MKM's Company is a leading provider of innovative solutions in web sites. Our team of experts is dedicated to delivering exceptional results for our clients, with a focus on quality, efficiency, and customer satisfaction. Whether you're looking for a website, or a system, we have the expertise and experience to meet your needs.") }}
            </p>
        </blockquote>
    </section>

    <!-- Our Mission Section -->
    <section class="bg-indigo-200 shadow-md rounded-lg p-6 mb-12 mt-6 mx-16">
        <h2 class="text-3xl font-semibold mb-4 text-center">{{ __('Our Mission') }}</h2>
        <p class="text-gray-700 leading-relaxed">
            {{ __("At MKM's Company, our mission is to provide cutting-edge solutions that empower our clients to achieve their goals. We are committed to innovation, excellence, and building lasting relationships with our customers. Our goal is to be a trusted partner in your success, offering comprehensive services that drive growth and efficiency.") }}
        </p>
    </section>

    <!-- Our Values Section -->
    <section class="mb-12 mt-6 mx-12">
        <h2 class="text-3xl font-semibold mb-4 text-center">{{ __('Our Values') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-indigo-200 shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">{{ __('Integrity') }}</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ __('We uphold the highest standards of integrity in all of our actions.') }}
                </p>
            </div>
            <div class="bg-indigo-200 shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">{{ __('Innovation') }}</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ __('We pursue new creative ideas that have the potential to change the world.') }}
                </p>
            </div>
            <div class="bg-indigo-200 shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">{{ __('Excellence') }}</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ __('We strive for excellence in everything we do, ensuring our clients receive the best possible service.') }}
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>
