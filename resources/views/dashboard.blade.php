<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Conversion Tools') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (auth()->user()->isUser())
                <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded mb-6">
                    <div class="flex items-center">
                        <div class="py-1">
                            <svg class="h-6 w-6 text-blue-600 mr-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">Usage Information</p>
                            <p class="text-sm">You have used {{ auth()->user()->usage_count }} out of 50 allowed
                                conversions.</p>
                            <p class="text-sm mt-1">Upgrade to premium for unlimited conversions!</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- PDF to Word -->
                        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">PDF to Word</h3>
                            <p class="text-gray-600 mb-4">Convert PDF documents to editable Word documents.</p>
                            <form action="{{ route('convert.pdf-to-word') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pdf_file">
                                        Select PDF File
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        type="file" name="pdf_file" accept=".pdf" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Convert to Word
                                </button>
                            </form>
                        </div>

                        <!-- Word to PDF -->
                        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Word to PDF</h3>
                            <p class="text-gray-600 mb-4">Convert Word documents to PDF format.</p>
                            <form action="{{ route('convert.word-to-pdf') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="word_file">
                                        Select Word File
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        type="file" name="word_file" accept=".doc,.docx" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Convert to PDF
                                </button>
                            </form>
                        </div>

                        <!-- Image to WEBP -->
                        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Image to WEBP</h3>
                            <p class="text-gray-600 mb-4">Convert JPG/PNG images to WEBP format for better compression.
                            </p>
                            <form action="{{ route('convert.image-to-webp') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image_file">
                                        Select Image
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        type="file" name="image_file" accept=".jpg,.jpeg,.png" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Convert to WEBP
                                </button>
                            </form>
                        </div>

                        <!-- Voice to Text -->
                        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Voice to Text</h3>
                            <p class="text-gray-600 mb-4">Transcribe audio files to text.</p>
                            <form action="{{ route('convert.voice-to-text') }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="voice_file">
                                        Select Audio File
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        type="file" name="voice_file" accept=".mp3,.wav,.ogg" required>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Transcribe
                                </button>
                            </form>
                        </div>

                        <!-- Text to Voice -->
                        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Text to Voice</h3>
                            <p class="text-gray-600 mb-4">Convert text to spoken audio.</p>
                            <form action="{{ route('convert.text-to-voice') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                                        Enter Text
                                    </label>
                                    <textarea
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        name="text" rows="4" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="voice_type">
                                        Voice Type
                                    </label>
                                    <select
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        name="voice_type" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Convert to Audio
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
