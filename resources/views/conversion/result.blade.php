<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conversion Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if ($status === 'success')
                        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-6">
                            <div class="flex items-center">
                                <div class="py-1">
                                    <svg class="h-6 w-6 text-green-600 mr-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold">Success!</p>
                                    <p class="text-sm">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded mb-6">
                            <div class="flex items-center">
                                <div class="py-1">
                                    <svg class="h-6 w-6 text-red-600 mr-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold">Error</p>
                                    <p class="text-sm">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">File Information</h3>

                        @if ($original_file)
                            <p class="mb-2"><span class="font-semibold">Original File:</span> {{ $original_file }}</p>
                        @endif

                        @if ($converted_file)
                            <p class="mb-2"><span class="font-semibold">Converted File:</span> {{ $converted_file }}
                            </p>
                            <a href="{{ $converted_file }}"
                                class="inline-block mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Download Converted File
                            </a>
                        @else
                            <p class="text-gray-500 italic">Your file is being processed. It will be available for
                                download shortly.</p>
                        @endif
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('dashboard') }}"
                            class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
