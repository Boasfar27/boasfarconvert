<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Your Payment History</h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            View the status of your payments and upgrade requests
                        </p>
                    </div>

                    @if (session('success'))
                        <div
                            class="mb-4 p-4 border-l-4 border-green-500 bg-green-50 dark:bg-green-900/20 dark:border-green-400 text-green-700 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div
                            class="mb-4 p-4 border-l-4 border-red-500 bg-red-50 dark:bg-red-900/20 dark:border-red-400 text-red-700 dark:text-red-400">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (count($payments) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Amount
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Receipt
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $payment->created_at->format('d M Y, H:i') }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                {{ $payment->description }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($payment->status == 'approved')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300">
                                                        Approved
                                                    </span>
                                                @elseif($payment->status == 'pending')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300">
                                                        Pending
                                                    </span>
                                                @elseif($payment->status == 'rejected')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300">
                                                        Rejected
                                                    </span>
                                                @endif

                                                @if ($payment->processed_at)
                                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                        {{ \Carbon\Carbon::parse($payment->processed_at)->format('d M Y, H:i') }}
                                                    </div>
                                                @endif

                                                @if ($payment->notes)
                                                    <div x-data="{ open: false }" class="mt-1">
                                                        <button @click="open = !open"
                                                            class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">
                                                            View note
                                                        </button>
                                                        <div x-show="open"
                                                            class="mt-1 text-xs bg-gray-100 dark:bg-gray-700 p-2 rounded">
                                                            {{ $payment->notes }}
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                @if ($payment->payment_proof)
                                                    <a href="{{ Storage::url($payment->payment_proof) }}"
                                                        target="_blank"
                                                        class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                                        View Receipt
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $payments->links() }}
                        </div>
                    @else
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No payments yet</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                You haven't made any payments yet.
                            </p>
                            <div class="mt-6 flex justify-center gap-4">
                                <a href="{{ route('show.premium.upgrade') }}"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Upgrade to Premium
                                </a>
                                <a href="{{ route('show.limit.upgrade') }}"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Increase Limit
                                </a>
                            </div>
                        </div>
                    @endif
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
</x-app-layout>
