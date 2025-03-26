<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Limit Reached') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <div class="text-center">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 dark:bg-red-900 mb-6">
                            <svg class="h-8 w-8 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Conversion Limit Reached
                        </h2>

                        <p class="text-gray-600 dark:text-gray-400 max-w-lg mx-auto mb-6">
                            You've reached your limit of <span
                                class="font-medium text-gray-900 dark:text-white">{{ $limit }}</span> file
                            conversions.
                            To continue converting files, you can:
                        </p>

                        <div class="max-w-2xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 text-left">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Increase Your Limit
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4">
                                    Make a small donation to increase your conversion limit. Choose a package that suits
                                    your needs.
                                </p>
                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400 mb-6">
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        +10 conversions for Rp 5,000
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        +25 conversions for Rp 10,000
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        +60 conversions for Rp 20,000
                                    </li>
                                </ul>
                                <a href="{{ route('show.limit.upgrade') }}"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                                    Increase My Limit
                                </a>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 text-left">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Upgrade to Premium
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4">
                                    Get unlimited conversions and more features with our premium plan.
                                </p>
                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400 mb-6">
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="font-medium">Unlimited</span> file conversions
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Priority support
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Lifetime access
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        One-time payment of Rp 50,000
                                    </li>
                                </ul>
                                <a href="{{ route('show.premium.upgrade') }}"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                                    Upgrade to Premium
                                </a>
                            </div>
                        </div>

                        @if (!$isPremium)
                            <div class="mt-8 text-center">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                    Need to convert more files for free?
                                </p>
                                <div class="space-x-4">
                                    <a href="https://facebook.com/sharer/sharer.php?u={{ url('/') }}"
                                        target="_blank"
                                        class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500">
                                        <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Share on Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20amazing%20file%20converter!&url={{ url('/') }}"
                                        target="_blank"
                                        class="inline-flex items-center text-sm font-medium text-sky-600 dark:text-sky-400 hover:text-sky-500">
                                        <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path
                                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                        Share on Twitter
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300">
                    <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
