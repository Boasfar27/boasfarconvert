<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logo.png') }}" alt="BoasFarConvert Logo" class="w-32 h-auto" />
        </x-slot>

        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Create Account</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Join our community today</p>
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-6">
                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-gray-700 dark:text-gray-300" />
                    <x-input id="name"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 shadow-sm"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-700 dark:text-gray-300" />
                    <x-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 shadow-sm"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-700 dark:text-gray-300" />
                    <div class="password-container">
                        <x-input id="password"
                            class="block mt-1 w-full pr-12 rounded-lg border-gray-300 focus:border-indigo-500 shadow-sm"
                            type="password" name="password" required autocomplete="new-password" />
                        <button type="button" class="password-toggle">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength mt-2"></div>
                    <p class="text-xs text-gray-500 mt-1">Password must be at least 8 characters and include uppercase,
                        number, and special character</p>
                </div>

                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"
                        class="text-gray-700 dark:text-gray-300" />
                    <div class="password-container">
                        <x-input id="password_confirmation"
                            class="block mt-1 w-full pr-12 rounded-lg border-gray-300 focus:border-indigo-500 shadow-sm"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                        <button type="button" class="password-toggle">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div>
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ml-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-indigo-600 hover:text-indigo-700">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-indigo-600 hover:text-indigo-700">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div>
                    <x-button class="w-full justify-center">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                        Or continue with
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <a href="/auth/google"
                    class="social-btn w-full inline-flex justify-center py-3 px-4 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="#4285F4" />
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853" />
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                            fill="#FBBC05" />
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="#EA4335" />
                    </svg>
                    Google
                </a>
            </div>
        </div>

        <div class="mt-6 text-center text-sm">
            <p class="text-gray-600 dark:text-gray-400">
                Already have an account?
                <a href="{{ route('login') }}"
                    class="font-medium text-indigo-600 hover:text-indigo-700 hover:underline">
                    Sign in
                </a>
            </p>
        </div>
    </x-authentication-card>
</x-guest-layout>
