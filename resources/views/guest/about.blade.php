<x-guest-layout>
    <section class="mx-16 text-center mb-12 mt-6">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            {{ __('About') }}
        </h1>
        <span
            class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400 text-4xl font-extrabold leading-none tracking-tight ">{{ __("MKM's Company") }}</span>
        <blockquote class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">
            <p class="text-gray-700 text-lg leading-relaxed mt-2">
                {{ __("MKM's Company has been a trusted name in web services since 2024. We specialize in providing top-notch websites, tailored to meet the unique needs of our clients. Our commitment to excellence and innovation has made us a leader in the industry.") }}
            </p>
        </blockquote>

    </section>

    <!-- Our Mission Section -->
    <section class="mx-16 bg-indigo-200 shadow-md rounded-lg p-6 mb-12 mt-6">
        <h2 class="text-3xl font-semibold mb-4">{{ __('Our Mission') }}</h2>
        <p class="text-gray-700 leading-relaxed">
            {{ __("Our mission is to deliver exceptional solutions that empower our clients to succeed. We strive to innovate and excel in every aspect of our work, ensuring that our customers receive the highest quality of service  and support. At MKM's Company, we believe in building long-lasting relationships based on trust and transparency.") }}
        </p>
    </section>

    <!-- Our Story Section -->
    <section class="mx-16 mb-12 mt-6">
        <h2 class="text-3xl font-semibold mb-4 text-center">{{ __('Our Story') }}</h2>
        <p class="text-gray-700 leading-relaxed text-center">
            {{ __("Founded in 2024, MKM's Company started with a small team of passionate professionals dedicated to Coding Dreams into Reality. we continue to push the boundaries of what's possible in web services.") }}
        </p>
    </section>

    <!-- Meet the Team Section -->
    <section class="mx-16 mb-12 mt-6">
        <h2 class="text-3xl font-semibold mb-4 text-center">{{ __('Meet the Team') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-indigo-200 shadow-md rounded-lg p-6 text-center">

                <h3 class="text-xl font-semibold mb-2">Ahmed</h3>
                <p class="text-gray-700">Front-end</p>
                <p class="text-gray-500 text-sm mt-2">
                    {{ __('Aenean ligula enim, tempor vel elementum tincidunt, luctus ac lorem. Praesent quis pellentesque quam. Donec dapibus sapien interdum sapien posuere, sed interdum libero feugiat. Curabitur dolor nisi, mollis a mi luctus, euismod commodo nisi. In et aliquam arcu. Nunc sit amet mattis lorem. Maecenas pretium mauris sapien, eu lacinia enim.') }}
                </p>

            </div>
            <div class="bg-indigo-200 shadow-md rounded-lg p-6 text-center">

                <h3 class="text-xl font-semibold mb-2">Mohamed</h3>
                <p class="text-gray-700">Backend</p>
                <p class="text-gray-500 text-sm mt-2">
                    {{ __('Aenean ligula enim, tempor vel elementum tincidunt, luctus ac lorem. Praesent quis pellentesque quam. Donec dapibus sapien interdum sapien posuere, sed interdum libero feugiat. Curabitur dolor nisi, mollis a mi luctus, euismod commodo nisi. In et aliquam arcu. Nunc sit amet mattis lorem. Maecenas pretium mauris sapien, eu lacinia enim.') }}
                </p>

            </div>
            <div class="bg-indigo-200 shadow-md rounded-lg p-6 text-center">

                <h3 class="text-xl font-semibold mb-2">Samy</h3>
                <p class="text-gray-700">Designer</p>
                <p class="text-gray-500 text-sm mt-2">
                    {{ __('Aenean ligula enim, tempor vel elementum tincidunt, luctus ac lorem. Praesent quis pellentesque quam. Donec dapibus sapien interdum sapien posuere, sed interdum libero feugiat. Curabitur dolor nisi, mollis a mi luctus, euismod commodo nisi. In et aliquam arcu. Nunc sit amet mattis lorem. Maecenas pretium mauris sapien, eu lacinia enim.') }}
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>
