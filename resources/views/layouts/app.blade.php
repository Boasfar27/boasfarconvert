<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="BoasFarConvert - The ultimate file conversion platform">

    <title>{{ config('app.name', 'BoasFarConvert') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|instrument-sans:400,500,600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased h-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <x-banner />

    <div class="min-h-screen flex flex-col">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 shadow-inner py-6 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center md:flex-row md:justify-between">
                    <div class="flex items-center mb-4 md:mb-0">
                        <img src="{{ asset('images/logo.png') }}" alt="BoasFarConvert Logo" class="h-8 mr-3">
                        <span class="text-gray-600 dark:text-gray-400 text-sm">&copy; {{ date('Y') }}
                            BoasFarConvert</span>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#"
                            class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                            Terms
                        </a>
                        <a href="#"
                            class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                            Privacy
                        </a>
                        <a href="#"
                            class="text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                            Contact
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                disable: 'phone',
                duration: 700,
                easing: 'ease-out-cubic',
            });

            // Dark mode toggle - if using a toggle button
            const darkModeToggle = document.getElementById('dark-mode-toggle');
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function() {
                    document.documentElement.classList.toggle('dark');

                    // Save preference
                    if (document.documentElement.classList.contains('dark')) {
                        localStorage.setItem('theme', 'dark');
                    } else {
                        localStorage.setItem('theme', 'light');
                    }
                });
            }

            // Check for saved theme preference or use OS preference
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
