<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emails') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">

            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="box-body">
                    <form action="{{ route('send.mail') }}" method="POST">
                        @csrf
                        <div class="mx-6 my-6">
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="small-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Subject') }}
                                        :
                                    </label>
                                    <input type="text" id="small-input" name="subject" value="{{ old('subject') }}"
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                            <div>
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('body') }}
                                </label>
                                <textarea id="message" rows="4" name="body"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here...">{{ old('body') }}</textarea>
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
