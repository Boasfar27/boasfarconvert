<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Increase Conversion Limit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Need More Conversions?
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                            You can increase your conversion limit by making a donation. Each donation will be reviewed
                            by our team and your limit will be increased based on the amount.
                        </p>
                    </div>

                    <div class="md:flex md:gap-8">
                        <!-- Donation Options -->
                        <div class="md:w-1/2 mb-8 md:mb-0">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-6">Choose Your Donation
                                </h3>

                                <div class="space-y-5">
                                    <div class="relative">
                                        <input id="donation-5k" name="donation_amount" type="radio" value="5000"
                                            class="peer hidden" checked>
                                        <label for="donation-5k"
                                            class="flex p-4 cursor-pointer border rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-500 hover:bg-gray-50 dark:hover:bg-gray-750 transition-all">
                                            <div class="flex flex-col w-full">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h4 class="font-semibold text-gray-900 dark:text-white">Basic
                                                            Package</h4>
                                                        <span class="text-sm text-gray-600 dark:text-gray-400">+10
                                                            conversions</span>
                                                    </div>
                                                    <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                                        Rp 5,000
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="relative">
                                        <input id="donation-10k" name="donation_amount" type="radio" value="10000"
                                            class="peer hidden">
                                        <label for="donation-10k"
                                            class="flex p-4 cursor-pointer border rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-500 hover:bg-gray-50 dark:hover:bg-gray-750 transition-all">
                                            <div class="flex flex-col w-full">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h4 class="font-semibold text-gray-900 dark:text-white">Standard
                                                            Package</h4>
                                                        <span class="text-sm text-gray-600 dark:text-gray-400">+25
                                                            conversions</span>
                                                    </div>
                                                    <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                                        Rp 10,000
                                                    </div>
                                                </div>
                                                <span
                                                    class="mt-1 inline-flex items-center text-xs text-green-600 dark:text-green-400">
                                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Best value (2.5x conversions/Rp)
                                                </span>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="relative">
                                        <input id="donation-20k" name="donation_amount" type="radio" value="20000"
                                            class="peer hidden">
                                        <label for="donation-20k"
                                            class="flex p-4 cursor-pointer border rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-500 hover:bg-gray-50 dark:hover:bg-gray-750 transition-all">
                                            <div class="flex flex-col w-full">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <h4 class="font-semibold text-gray-900 dark:text-white">Premium
                                                            Package</h4>
                                                        <span class="text-sm text-gray-600 dark:text-gray-400">+60
                                                            conversions</span>
                                                    </div>
                                                    <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                                        Rp 20,000
                                                    </div>
                                                </div>
                                                <span
                                                    class="mt-1 inline-flex items-center text-xs text-green-600 dark:text-green-400">
                                                    <svg class="mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Most popular (3x conversions/Rp)
                                                </span>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="relative">
                                        <input id="donation-custom" name="donation_amount" type="radio" value="custom"
                                            class="peer hidden">
                                        <label for="donation-custom"
                                            class="flex p-4 cursor-pointer border rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 peer-checked:border-indigo-500 peer-checked:ring-2 peer-checked:ring-indigo-500 hover:bg-gray-50 dark:hover:bg-gray-750 transition-all">
                                            <div class="flex flex-col w-full">
                                                <h4 class="font-semibold text-gray-900 dark:text-white">Custom Amount
                                                </h4>
                                                <div class="mt-2" id="custom-amount-container">
                                                    <div class="relative rounded-md">
                                                        <div
                                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                            <span class="text-gray-500 sm:text-sm">Rp</span>
                                                        </div>
                                                        <input type="number" name="custom_amount" id="custom_amount"
                                                            min="5000"
                                                            class="block w-full rounded-md border-gray-300 dark:border-gray-600 pl-12 pr-12 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                            placeholder="Min. 5,000">
                                                    </div>
                                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Minimum
                                                        donation is Rp 5,000</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">How it works:</h4>
                                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 mr-2 text-indigo-500 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            Choose a donation amount based on how many conversions you need
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 mr-2 text-indigo-500 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Make the payment via QRIS and upload the payment proof
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 mr-2 text-indigo-500 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Our team will review and approve your donation (1-5 minutes during business
                                            hours)
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 mr-2 text-indigo-500 flex-shrink-0" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            Your conversion limit will be increased immediately after approval
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Section -->
                        <div class="md:w-1/2">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-6">Payment Method</h3>

                                <div class="mb-6">
                                    <div
                                        class="rounded-lg overflow-hidden border border-gray-200 dark:border-gray-600">
                                        <img src="{{ asset('images/qris.webp') }}" alt="QRIS Payment QR Code"
                                            class="w-full h-auto">
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Scan this QR code with your banking app
                                    </div>
                                </div>

                                <form action="{{ route('increase.limit') }}" method="POST"
                                    enctype="multipart/form-data" class="space-y-5">
                                    @csrf
                                    <input type="hidden" id="amount" name="amount" value="5000">

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
                                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
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
            const amountField = document.getElementById('amount');
            const customAmountField = document.getElementById('custom_amount');
            const radioButtons = document.querySelectorAll('input[name="donation_amount"]');

            // Set initial value
            amountField.value = 5000;

            // Handle radio button changes
            radioButtons.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.value === 'custom') {
                        if (customAmountField.value >= 5000) {
                            amountField.value = customAmountField.value;
                        } else {
                            amountField.value = 5000;
                            customAmountField.value = 5000;
                        }
                    } else {
                        amountField.value = this.value;
                    }
                });
            });

            // Handle custom amount changes
            customAmountField.addEventListener('input', function() {
                if (document.getElementById('donation-custom').checked) {
                    if (this.value >= 5000) {
                        amountField.value = this.value;
                    } else {
                        amountField.value = 5000;
                    }
                }
            });

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
