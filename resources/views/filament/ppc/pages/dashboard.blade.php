<x-filament-panels::page>
    <div class="p-4 mb-6 bg-white rounded-lg shadow dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            Hello, {{ auth()->user()->name }}!
        </h2>
        <p class="mt-2 text-gray-600 dark:text-white">
            Welcome!
        </p>
    </div>
</x-filament-panels::page>