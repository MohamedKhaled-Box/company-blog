<x-guest-layout>


    <section class="bg-gray-50 dark:bg-gray-900 my-24 mx-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
            <div class="flex flex-col justify-center">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    {{ __('Stay Updated With Our News') }}</h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                    {{ __('Subscribe to our newsletter and never miss an update! Get the latest news, insights, and exclusive offers delivered straight to your inbox.') }}
                </p>
                <a href="#"
                    class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center"><a
                        href="{{ route('about') }}">{{ __('Read more about our us') }}</a>
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div>
                <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('Subscribe to Our Newsletter') }}
                    </h2>
                    <form class="mt-8 space-y-6" action="{{ route('send-mail') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subscribe to our mail service :') }}</label>
                            <input type="email" name="mail" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required />
                        </div>
                        <button type="submit"
                            class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
