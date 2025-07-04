<x-filament-panels::page>
    <div class="p-4 mb-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            Hello, {{ auth()->user()->name }}!
        </h2>
        <p class="mt-2 text-gray-600 dark:text-white">
            Welcome to your Dashboard!
        </p>
        <x-filament::section>
            <div class="text-sm text-gray-500 mt-2">
                For any bug or suggestion, please email <a href="mailto:saurabh85mahajan@gmail.com" class="text-primary-600 underline">saurabh85mahajan@gmail.com</a>.
                Do include your registered email in subject.
            </div>
        </x-filament::section>


    </div>
</x-filament-panels::page>