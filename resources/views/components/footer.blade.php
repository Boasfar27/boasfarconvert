<!-- Footer Component -->
<footer class="bg-white dark:bg-gray-800 py-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="text-center md:text-left">
                <img src="{{ asset('images/logo.png') }}" alt="BoasFarConvert Logo" class="h-12 mx-auto md:mx-0 mb-4" />
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    The ultimate file conversion platform to transform your files efficiently and securely.
                </p>
            </div>

            <div class="text-center">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/"
                            class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Home</a>
                    </li>
                    <li><a href="{{ route('login') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Login</a>
                    </li>
                    <li><a href="{{ route('register') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Register</a>
                    </li>
                </ul>
            </div>

            <div class="text-center md:text-right">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-2">support@boasfarconvert.com</p>
                <div class="flex justify-center md:justify-end space-x-4 mt-4">
                    <a href="#"
                        class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                        <i class="bi bi-facebook text-xl"></i>
                    </a>
                    <a href="#"
                        class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                        <i class="bi bi-twitter text-xl"></i>
                    </a>
                    <a href="#"
                        class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                        <i class="bi bi-instagram text-xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-center md:text-left text-gray-500 dark:text-gray-400 mb-4 md:mb-0">
                    &copy; {{ date('Y') }} BoasFarConvert. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#"
                        class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                        Privacy Policy
                    </a>
                    <a href="#"
                        class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                        Terms of Service
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
