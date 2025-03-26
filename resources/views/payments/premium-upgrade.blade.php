<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upgrade to Premium') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Unlock Unlimited Conversions
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                            Upgrade to our premium plan and enjoy unlimited file conversions, premium support, and more.
                        </p>
                    </div>

                    <div class="md:flex md:gap-8">
                        <!-- Premium Benefits -->
                        <div class="md:w-1/2 mb-8 md:mb-0">
                            <div
                                class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-gray-700 dark:to-gray-800 rounded-lg p-6">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-6">Premium Benefits</h3>

                                <div class="space-y-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Unlimited File
                                                Conversions</h4>
                                            <p class="mt-1 text-gray-600 dark:text-gray-400">
                                                Convert as many files as you need without any daily or monthly limits.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Priority
                                                Processing</h4>
                                            <p class="mt-1 text-gray-600 dark:text-gray-400">
                                                Your conversions are prioritized in our queue for faster processing.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Premium
                                                Support</h4>
                                            <p class="mt-1 text-gray-600 dark:text-gray-400">
                                                Get faster responses from our support team via priority email.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Lifetime
                                                Access</h4>
                                            <p class="mt-1 text-gray-600 dark:text-gray-400">
                                                One-time payment for lifetime access to premium features.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 text-center">
                                    <div class="inline-flex rounded-md shadow-sm">
                                        <span
                                            class="px-4 py-2 text-xl font-bold text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-l-md">
                                            Rp 50,000
                                        </span>
                                        <span
                                            class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-r-md">
                                            One-time payment
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Section -->
                        <div class="md:w-1/2">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-6">Payment Method</h3>

                                <div class="mb-6">
                                    <div class="rounded-lg overflow-hidden border border-gray-200 dark:border-gray-600">
                                        <img src="{{ asset('images/qris.webp') }}" alt="QRIS Payment QR Code"
                                            class="w-full h-auto">
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Scan this QR code with your banking app
                                    </div>
                                </div>

                                <form action="{{ route('upgrade.premium') }}" method="POST"
                                    enctype="multipart/form-data" class="space-y-5">
                                    @csrf

                                    <div>
                                        <label for="payment_id"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                            Payment ID (Optional)
                                        </label>
                                        <input type="text" id="payment_id" name="payment_id"
                                            placeholder="Enter transaction ID from your bank"
                                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white text-sm">
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Optional: Include your
                                            bank transaction ID for faster verification</p>
                                    </div>

                                    <div>
                                        <label for="payment_proof"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                            Payment Proof (Required)
                                        </label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                    <label for="payment_proof"
                                                        class="relative cursor-pointer bg-white dark:bg-gray-700 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none">
                                                        <span>Upload receipt</span>
                                                        <input id="payment_proof" name="payment_proof" type="file"
                                                            class="sr-only" accept=".jpg,.jpeg,.png,.pdf">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    JPG, PNG or PDF up to 2MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit"
                                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                                            Submit for Approval
                                        </button>
                                    </div>

                                    <div class="text-xs text-center text-gray-500 dark:text-gray-400">
                                        Your request will be reviewed by our team, usually within 1-5 minutes during
                                        business hours.
                                    </div>
                                </form>
                            </div>
                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple file upload preview
            const fileInput = document.getElementById('payment_proof');
            const fileLabel = fileInput.nextElementSibling;
            const defaultLabelText = fileLabel.innerHTML;

            fileInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                if (fileName) {
                    fileLabel.innerHTML = fileName;
                } else {
                    fileLabel.innerHTML = defaultLabelText;
                }
            });
        });
    </script>
</x-app-layout>
