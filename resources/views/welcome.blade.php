<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="BoasFarConvert - The ultimate file conversion platform. Convert documents, images, audio and more with our powerful tools.">
    <title>{{ config('app.name', 'BoasFarConvert') }} - File Conversion Made Easy</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.8s ease-in-out, visibility 0.8s;
        }

        .dark .preloader {
            background-color: #111827;
        }

        .preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .preloader-content {
            text-align: center;
            max-width: 90%;
            width: 600px;
            padding: 0 16px;
            margin: 0 auto;
        }

        .preloader-logo {
            max-width: 60%;
            width: 240px;
            height: auto;
            margin: 0 auto 30px;
            animation: logo-pulse 2s ease-in-out infinite;
        }

        @keyframes logo-pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.9;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .preloader-text {
            font-size: clamp(16px, 4vw, 20px);
            font-weight: 600;
            color: #4f46e5;
            margin-bottom: 20px;
            opacity: 0;
            animation: fade-in 0.6s ease forwards;
            animation-delay: 0.4s;
        }

        .preloader-description {
            font-size: clamp(14px, 3vw, 16px);
            line-height: 1.6;
            color: #6b7280;
            margin-bottom: 35px;
            opacity: 0;
            animation: fade-in 0.6s ease forwards;
            animation-delay: 0.6s;
        }

        .dark .preloader-description {
            color: #9ca3af;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .preloader-progress-container {
            width: 100%;
            height: 6px;
            background-color: rgba(99, 102, 241, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 15px;
            position: relative;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .preloader-progress {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #4f46e5, #6366f1, #818cf8);
            background-size: 200% 100%;
            animation: loading-progress 3s ease forwards, gradient-shift 2s linear infinite;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.3);
        }

        @keyframes loading-progress {
            0% {
                width: 0%;
            }

            10% {
                width: 5%;
            }

            20% {
                width: 15%;
            }

            30% {
                width: 25%;
            }

            40% {
                width: 40%;
            }

            50% {
                width: 50%;
            }

            60% {
                width: 65%;
            }

            70% {
                width: 75%;
            }

            80% {
                width: 85%;
            }

            90% {
                width: 95%;
            }

            100% {
                width: 100%;
            }
        }

        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .preloader-status {
            font-size: 14px;
            color: #6b7280;
            text-align: center;
            margin-top: 5px;
            min-height: 20px;
            font-weight: 500;
        }

        .preloader-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            opacity: 0;
            animation: fade-in 0.6s ease forwards;
            animation-delay: 1s;
        }

        .preloader-stat {
            text-align: center;
            padding: 0 5px;
        }

        .preloader-stat-number {
            font-size: clamp(18px, 5vw, 24px);
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 4px;
        }

        .preloader-stat-label {
            font-size: clamp(12px, 3vw, 14px);
            color: #6b7280;
        }

        /* Animated Background */
        .animated-bg {
            background: linear-gradient(-45deg, #4f46e5, #3b82f6, #10b981, #8b5cf6);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Floating animation */
        .float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Button hover effects */
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-primary:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120%;
            height: 0;
            padding-bottom: 120%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
            transition: transform 0.5s ease, opacity 0.3s ease;
        }

        .btn-primary:hover:after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        /* Card hover effects */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Animation for the blob */
        @keyframes blob-animation {

            0%,
            100% {
                border-radius: 66% 34% 33% 67% / 55% 27% 73% 45%;
            }

            25% {
                border-radius: 45% 55% 62% 38% / 53% 51% 49% 47%;
            }

            50% {
                border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%;
            }

            75% {
                border-radius: 49% 51% 43% 57% / 44% 67% 33% 56%;
            }
        }

        .animate-blob {
            animation: blob-animation 10s linear infinite;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Professional Preloader -->
    <div class="preloader">
        <div class="preloader-content">
            <div class="flex justify-center items-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="BoasFarConvert Logo" class="preloader-logo mx-auto">
            </div>
            <div class="preloader-text">The Ultimate File Conversion Platform</div>
            <p class="preloader-description">
                We're preparing our powerful conversion tools to help you transform your files quickly, accurately, and
                securely.
                Our platform is optimized to give you the best conversion experience possible.
            </p>
            <div class="preloader-progress-container">
                <div class="preloader-progress"></div>
            </div>
            <div class="preloader-status">Loading application...</div>

            <div class="preloader-stats">
                <div class="preloader-stat">
                    <div class="preloader-stat-number">50+</div>
                    <div class="preloader-stat-label">File Formats</div>
                </div>
                <div class="preloader-stat">
                    <div class="preloader-stat-number">10M+</div>
                    <div class="preloader-stat-label">Conversions</div>
                </div>
                <div class="preloader-stat">
                    <div class="preloader-stat-number">99.9%</div>
                    <div class="preloader-stat-label">Accuracy</div>
                </div>
            </div>
        </div>
    </div>

    <div class="min-h-screen flex flex-col overflow-hidden">
        <!-- Header -->
        <x-header />

        <!-- Hero Section -->
        <section class="animated-bg text-white py-12 md:py-24 relative">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/70 to-blue-900/70"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                    <div data-aos="fade-right" data-aos-duration="1000">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                            Transform Your Files <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-blue-400">Effortlessly</span>
                        </h1>
                        <p class="text-lg sm:text-xl mb-8 text-gray-200">Powerful conversion tools that make file
                            transformation
                            simple, fast, and reliable.</p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="btn-primary px-8 py-4 bg-white text-indigo-600 font-medium rounded-md hover:bg-gray-100 text-center shadow-lg">
                                        Go to Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('register') }}"
                                        class="btn-primary px-8 py-4 bg-white text-indigo-600 font-medium rounded-md hover:bg-gray-100 text-center shadow-lg">
                                        Get Started for Free
                                    </a>
                                    <a href="{{ route('login') }}"
                                        class="btn-primary px-8 py-4 border-2 border-white text-white font-medium rounded-md hover:bg-white/10 text-center">
                                        Log In
                                    </a>
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="hidden lg:flex justify-center" data-aos="zoom-in" data-aos-duration="1000"
                        data-aos-delay="300">
                        <div class="relative">
                            <div
                                class="absolute -top-6 -left-6 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -right-8 w-72 h-72 bg-teal-400 rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-blob">
                            </div>
                            <img src="https://placehold.co/600x400/667eea/FFFFFF/png?text=File+Conversion+Tools&font=montserrat"
                                alt="File Conversion" class="float relative rounded-lg shadow-2xl">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wave separator -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden">
                <svg class="relative block w-full h-12 md:h-24" viewBox="0 0 1440 60"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,50 C221.6,75.4 401.8,41 580,29 C757.6,17 938.6,45.6 1440,30 L1440,112 L0,112 Z"
                        fill="#ffffff" class="dark:fill-gray-800"></path>
                </svg>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-12 md:py-20 bg-white dark:bg-gray-800 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-12 md:mb-16" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Powerful
                        Conversion Features</h2>
                    <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">Our platform
                        offers a wide
                        range of conversion tools designed to handle all your file transformation needs.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <!-- Document Conversion -->
                    <div class="feature-card bg-gray-50 dark:bg-gray-700 p-6 md:p-8 rounded-xl shadow-md"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                        <div
                            class="w-14 h-14 md:w-16 md:h-16 bg-indigo-100 dark:bg-indigo-900 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 dark:text-indigo-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white mb-4">PDF & Word
                            Conversion</h3>
                        <p class="text-base text-gray-600 dark:text-gray-300 mb-4">Convert PDF to Word and Word to PDF
                            with
                            perfect formatting and layout preservation.</p>
                        <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Maintain tables and layouts</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Preserve fonts and styles</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Image Conversion -->
                    <div class="feature-card bg-gray-50 dark:bg-gray-700 p-6 md:p-8 rounded-xl shadow-md"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <div
                            class="w-14 h-14 md:w-16 md:h-16 bg-indigo-100 dark:bg-indigo-900 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white mb-4">Image Format
                            Conversion
                        </h3>
                        <p class="text-base text-gray-600 dark:text-gray-300 mb-4">Convert JPG and PNG images to WebP
                            format for
                            faster websites and reduced file sizes.</p>
                        <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Reduce file size by up to 80%</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Maintain image quality</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Audio/Voice Conversion -->
                    <div class="feature-card bg-gray-50 dark:bg-gray-700 p-6 md:p-8 rounded-xl shadow-md"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                        <div
                            class="w-14 h-14 md:w-16 md:h-16 bg-indigo-100 dark:bg-indigo-900 rounded-2xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white mb-4">Voice & Text
                            Conversion
                        </h3>
                        <p class="text-base text-gray-600 dark:text-gray-300 mb-4">Transform voice recordings to text
                            and convert
                            text to natural-sounding speech.</p>
                        <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>High accuracy speech recognition</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Multiple voice options</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Background decoration -->
            <div class="absolute top-0 right-0 -mt-16 -mr-16 hidden md:block">
                <svg width="300" height="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                    class="text-indigo-100 dark:text-indigo-900/30 opacity-50">
                    <path fill="currentColor"
                        d="M31.9,-54.1C40.1,-45.2,44.7,-34.2,51.8,-23.5C58.9,-12.7,68.5,-2.3,67.8,7.8C67.1,17.9,56.1,27.7,45.9,35.9C35.7,44.2,26.3,51,15.2,55.7C4.1,60.4,-8.6,62.9,-20.6,60.3C-32.5,57.7,-43.5,50,-51.5,39.7C-59.5,29.4,-64.4,16.4,-65.8,2.9C-67.2,-10.7,-65.1,-24.8,-58.3,-35.6C-51.5,-46.4,-40,-53.8,-28.6,-61C-17.1,-68.2,-5.7,-75.1,3.4,-80.2C12.5,-85.3,23.7,-63,31.9,-54.1Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="absolute bottom-0 left-0 -mb-16 -ml-16 hidden md:block">
                <svg width="300" height="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                    class="text-blue-100 dark:text-blue-900/30 opacity-50">
                    <path fill="currentColor"
                        d="M49.2,-15.3C55.8,6.1,48.2,32.2,30.8,44.9C13.4,57.6,-13.8,57,-33.7,43.1C-53.6,29.3,-66.2,2.2,-59.9,-19.5C-53.6,-41.2,-28.3,-57.5,-3.3,-56.6C21.8,-55.7,42.7,-36.7,49.2,-15.3Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
        </section>

        <!-- Workflow Section -->
        <section class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">How It Works</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">Converting your files is
                        simple with our streamlined process</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-16">
                    <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-duration="800"
                        data-aos-delay="100">
                        <div
                            class="w-20 h-20 bg-indigo-600 rounded-full text-white flex items-center justify-center text-2xl font-bold mb-6">
                            1</div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Upload Your File</h3>
                        <p class="text-gray-600 dark:text-gray-400">Simply drag and drop your file or select it from
                            your device.</p>
                    </div>
                    <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-duration="800"
                        data-aos-delay="200">
                        <div
                            class="w-20 h-20 bg-indigo-600 rounded-full text-white flex items-center justify-center text-2xl font-bold mb-6">
                            2</div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Choose Conversion Type
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Select the output format you want from our
                            conversion options.</p>
                    </div>
                    <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-duration="800"
                        data-aos-delay="300">
                        <div
                            class="w-20 h-20 bg-indigo-600 rounded-full text-white flex items-center justify-center text-2xl font-bold mb-6">
                            3</div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Download Converted File
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Get your converted file instantly—ready to use
                            wherever you need it.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Simple Pricing</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">Choose the plan that works
                        for your needs.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <!-- Free Plan -->
                    <div class="feature-card bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                        <span
                            class="inline-block bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium px-3 py-1 rounded-full mb-4">Free</span>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Basic</h3>
                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mb-6">
                            Rp 0 <span class="text-base font-normal text-gray-500">/month</span>
                        </p>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300">Up to 50 file conversions</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300">All conversion types</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300">Email support</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-gray-400 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span class="text-gray-500 dark:text-gray-400">Limit increases with donation</span>
                            </li>
                        </ul>
                        <a href="{{ route('register') }}"
                            class="btn-primary block text-center px-6 py-4 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all w-full font-medium shadow-lg shadow-indigo-500/20">
                            Get Started
                        </a>
                    </div>

                    <!-- Premium Plan -->
                    <div class="feature-card bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-indigo-900/50 dark:to-blue-900/50 p-8 rounded-2xl shadow-xl border border-indigo-200 dark:border-indigo-800"
                        data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <span
                            class="inline-block bg-indigo-600 text-white text-sm font-medium px-3 py-1 rounded-full mb-4">Premium</span>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Pro</h3>
                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mb-6">
                            Rp 50,000 <span class="text-base font-normal text-gray-500">/month</span>
                        </p>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300"><strong>Unlimited</strong> file
                                    conversions</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300">Priority processing</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300">Higher quality conversions</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-green-500 mt-0.5 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-300">Priority support</span>
                            </li>
                        </ul>
                        <a href="{{ route('register') }}"
                            class="btn-primary block text-center px-6 py-4 bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-xl hover:from-indigo-700 hover:to-blue-700 transition-all w-full font-medium shadow-lg shadow-indigo-500/30">
                            Upgrade Now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 bg-gradient-to-r from-indigo-600 to-blue-600 text-white" data-aos="fade-up"
            data-aos-duration="800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to transform your files?</h2>
                <p class="text-xl text-indigo-100 mb-8 max-w-3xl mx-auto">Join thousands of satisfied users who trust
                    our conversion tools</p>
                <a href="{{ route('register') }}"
                    class="inline-block px-8 py-4 bg-white text-indigo-600 font-medium rounded-xl shadow-xl hover:bg-gray-100 transition-all">
                    Get Started For Free
                </a>
            </div>
        </section>

        <!-- Footer -->
        <x-footer />
    </div>

    <!-- Scripts -->
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

            // Enhanced preloader with status updates
            const preloader = document.querySelector('.preloader');
            const preloaderStatus = document.querySelector('.preloader-status');

            if (preloader) {
                const statusMessages = [
                    'Loading application...',
                    'Initializing conversion tools...',
                    'Setting up file handlers...',
                    'Preparing user interface...',
                    'Optimizing performance...',
                    'Loading almost complete...',
                    'Ready to transform your files!'
                ];

                let messageIndex = 0;

                // Update status message every 400ms
                const statusInterval = setInterval(function() {
                    if (messageIndex < statusMessages.length) {
                        preloaderStatus.textContent = statusMessages[messageIndex];
                        messageIndex++;
                    } else {
                        clearInterval(statusInterval);
                    }
                }, 400);

                // Simulate counter animation for stats
                document.querySelectorAll('.preloader-stat-number').forEach(function(stat) {
                    const finalValue = stat.textContent;
                    stat.textContent = '0';

                    setTimeout(function() {
                        // Simple counter animation
                        let currentValue = 0;
                        const targetValue = parseFloat(finalValue.replace(/[^0-9.]/g, ''));
                        const suffix = finalValue.replace(/[0-9.]/g, '');
                        const duration = 1500; // ms
                        const interval = 30; // ms
                        const steps = duration / interval;
                        const increment = targetValue / steps;

                        const counter = setInterval(function() {
                            currentValue += increment;
                            if (currentValue >= targetValue) {
                                currentValue = targetValue;
                                clearInterval(counter);
                            }

                            // Format the number appropriately
                            if (targetValue >= 1000) {
                                stat.textContent = Math.floor(currentValue)
                                    .toLocaleString() + suffix;
                            } else {
                                stat.textContent = currentValue.toFixed(1).replace(/\.0$/,
                                    '') + suffix;
                            }
                        }, interval);
                    }, 1000); // Delay start of counter animation
                });

                // Hide preloader after animations complete
                setTimeout(function() {
                    preloader.classList.add('fade-out');

                    setTimeout(function() {
                        preloader.style.display = 'none';
                    }, 800);
                }, 3500);
            }
        });
    </script>
</body>

</html>
