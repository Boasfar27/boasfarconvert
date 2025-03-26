<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('File Conversion Studio') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Dashboard Overview -->
            <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Conversion Stats -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 dark:bg-indigo-900 mr-4">
                            <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase">Conversions Used
                            </p>
                            <div class="flex items-end">
                                <p class="text-3xl font-bold text-gray-800 dark:text-white">
                                    {{ auth()->user()->usage_count }}</p>
                                @if (auth()->user()->role === 0)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm ml-2 mb-1">/ 50</p>
                                @else
                                    <p class="text-gray-600 dark:text-gray-400 text-sm ml-2 mb-1">Unlimited</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->role === 0)
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full"
                                    style="width: {{ min((auth()->user()->usage_count / 50) * 100, 100) }}%"></div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Account Status -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-emerald-100 dark:bg-emerald-900 mr-4">
                            <svg class="h-8 w-8 text-emerald-600 dark:text-emerald-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase">Account Status
                            </p>
                            <p class="text-xl font-bold text-gray-800 dark:text-white">
                                @if (auth()->user()->role === 0)
                                    Free Plan
                                @elseif (auth()->user()->role === 1)
                                    Premium Plan
                                @else
                                    Super Admin
                                @endif
                            </p>
                        </div>
                    </div>
                    @if (auth()->user()->role === 0)
                        <div class="mt-4">
                            <a href="{{ route('show.premium.upgrade') }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-700 transition">
                                Upgrade to Premium
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#conversion-tools"
                            class="flex items-center justify-center px-4 py-3 bg-gray-100 dark:bg-gray-700 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <span class="text-sm font-medium text-gray-800 dark:text-gray-200">Convert Files</span>
                        </a>
                        @if (auth()->user()->role === 0)
                            <a href="{{ route('show.limit.upgrade') }}"
                                class="flex items-center justify-center px-4 py-3 bg-gray-100 dark:bg-gray-700 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                <span class="text-sm font-medium text-gray-800 dark:text-gray-200">Increase Limit</span>
                            </a>
                        @endif
                        <a href="{{ route('payment-history') }}"
                            class="flex items-center justify-center px-4 py-3 bg-gray-100 dark:bg-gray-700 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <span class="text-sm font-medium text-gray-800 dark:text-gray-200">Payment
                                History</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Conversion Tools Section -->
            <div id="conversion-tools" class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 py-8">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Conversion Tools</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- PDF to Word -->
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="bg-red-100 dark:bg-red-900 p-3 rounded-full mr-4">
                                    <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">PDF to Word</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Convert PDF documents to editable Word
                                documents.</p>
                            <form action="{{ route('convert.pdf-to-word') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2"
                                        for="pdf_file">
                                        Select PDF File
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-white"
                                        type="file" name="pdf_file" accept=".pdf" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Convert to Word
                                </button>
                            </form>
                        </div>

                        <!-- Word to PDF -->
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full mr-4">
                                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Word to PDF</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Convert Word documents to PDF format.</p>
                            <form action="{{ route('convert.word-to-pdf') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2"
                                        for="word_file">
                                        Select Word File
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-white"
                                        type="file" name="word_file" accept=".doc,.docx" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Convert to PDF
                                </button>
                            </form>
                        </div>

                        <!-- Image to WEBP -->
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full mr-4">
                                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Image to WEBP</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Convert JPG/PNG images to WEBP format for
                                better compression.</p>
                            <form action="{{ route('convert.image-to-webp') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2"
                                        for="image_file">
                                        Select Image
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-white"
                                        type="file" name="image_file" accept=".jpg,.jpeg,.png" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Convert to WEBP
                                </button>
                            </form>
                        </div>

                        <!-- Voice to Text -->
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-full mr-4">
                                    <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Voice to Text</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Transcribe audio files to text.</p>
                            <form action="{{ route('convert.voice-to-text') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2"
                                        for="voice_file">
                                        Select Audio File
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-white"
                                        type="file" name="voice_file" accept=".mp3,.wav,.ogg" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Transcribe
                                </button>
                            </form>
                        </div>

                        <!-- Text to Voice -->
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-600 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center mb-4">
                                <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-full mr-4">
                                    <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 007.072 0m-9.9-2.828a9 9 0 0112.728 0" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Text to Voice</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Convert text to spoken audio.</p>
                            <form action="{{ route('convert.text-to-voice') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2"
                                        for="text">
                                        Enter Text
                                    </label>
                                    <textarea
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-white"
                                        name="text" rows="4" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2"
                                        for="voice_type">
                                        Voice Type
                                    </label>
                                    <select
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-white"
                                        name="voice_type" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Convert to Audio
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle custom donation amount
                const customRadio = document.getElementById('donation-custom');
                const customAmountContainer = document.getElementById('custom-amount-container');
                const finalAmountInput = document.getElementById('final_amount');

                if (customRadio && customAmountContainer && finalAmountInput) {
                    // Handle radio button changes
                    document.querySelectorAll('input[name="donation_amount"]').forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            if (this.value === 'custom') {
                                customAmountContainer.classList.remove('hidden');
                                const customAmount = document.getElementById('custom_amount');
                                if (customAmount.value >= 5000) {
                                    finalAmountInput.value = customAmount.value;
                                } else {
                                    finalAmountInput.value = 5000;
                                }
                            } else {
                                customAmountContainer.classList.add('hidden');
                                finalAmountInput.value = this.value;
                            }
                        });
                    });

                    // Handle custom amount changes
                    const customAmount = document.getElementById('custom_amount');
                    if (customAmount) {
                        customAmount.addEventListener('input', function() {
                            if (this.value >= 5000) {
                                finalAmountInput.value = this.value;
                            } else {
                                finalAmountInput.value = 5000;
                            }
                        });
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
