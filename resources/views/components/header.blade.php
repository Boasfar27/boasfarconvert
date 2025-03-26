<!-- Header Component -->
<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">BoasFarConvert</h1>
        </div>
        <div>
            @if (Route::has('login'))
                <div class="space-x-4 flex items-center">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-medium text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                            Dashboard
                        </a>
                        <a href="{{ url('/payment-history') }}"
                            class="font-medium text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                            Payment History
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-medium text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="font-medium px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>
