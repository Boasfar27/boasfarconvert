<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary inline-flex items-center px-5 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white tracking-wide hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-800 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-300 ease-in-out transform hover:-translate-y-1']) }}>
    {{ $slot }}
</button>
