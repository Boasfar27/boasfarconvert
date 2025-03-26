<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div data-aos="fade-up" data-aos-delay="100" class="w-full sm:max-w-md px-6 py-4 sm:py-6 flex justify-center">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-4 sm:mt-6 px-4 sm:px-6 py-6 sm:py-8 bg-white dark:bg-gray-800 shadow-xl overflow-hidden auth-card rounded-xl"
        data-aos="fade-up" data-aos-delay="200">
        {{ $slot }}
    </div>
</div>
