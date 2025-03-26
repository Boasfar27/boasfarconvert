<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="BoasFarConvert - The ultimate file conversion platform">

    <title>{{ config('app.name', 'BoasFarConvert') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|instrument-sans:400,500,600"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
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
        .auth-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .auth-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-5px);
        }

        /* Input focus effects */
        .form-input:focus {
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
            border-color: #6366f1;
        }

        /* Social button hover */
        .social-btn {
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-2px);
        }

        /* Password field */
        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            color: #6b7280;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #4f46e5;
        }

        /* Password strength */
        .password-strength {
            height: 5px;
            margin-top: 8px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .strength-weak {
            background-color: #ef4444;
            width: 30%;
        }

        .strength-medium {
            background-color: #f59e0b;
            width: 60%;
        }

        .strength-strong {
            background-color: #10b981;
            width: 100%;
        }

        /* Media queries for better responsiveness */
        @media (max-width: 640px) {
            .auth-card {
                padding: 1.5rem;
                margin: 0 1rem;
            }
        }
    </style>
</head>

<body class="antialiased font-sans">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        {{-- <div class="animated-bg text-white py-4 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex justify-center items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="BoasFarConvert Logo" class="h-20 sm:h-24" />
                    </a>
                </div>
            </div>
        </div> --}}

        {{ $slot }}
    </div>

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

            // Password toggle visibility
            document.querySelectorAll('.password-toggle').forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                });
            });

            // Password strength indicator
            document.querySelectorAll('input[type="password"]').forEach(function(input) {
                if (input.id === 'password' && !input.classList.contains('login-password')) {
                    input.addEventListener('input', function() {
                        const value = this.value;
                        const strengthIndicator = document.querySelector('.password-strength');

                        if (!strengthIndicator) return;

                        // Simple password strength logic
                        let strength = 0;

                        // Length check
                        if (value.length >= 8) strength += 1;

                        // Character variety checks
                        if (/[A-Z]/.test(value)) strength += 1;
                        if (/[0-9]/.test(value)) strength += 1;
                        if (/[^A-Za-z0-9]/.test(value)) strength += 1;

                        // Update the strength indicator
                        strengthIndicator.classList.remove('strength-weak', 'strength-medium',
                            'strength-strong');

                        if (value.length === 0) {
                            strengthIndicator.style.width = '0%';
                        } else if (strength < 2) {
                            strengthIndicator.classList.add('strength-weak');
                        } else if (strength < 4) {
                            strengthIndicator.classList.add('strength-medium');
                        } else {
                            strengthIndicator.classList.add('strength-strong');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
