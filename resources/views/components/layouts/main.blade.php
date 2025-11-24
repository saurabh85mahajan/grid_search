<!DOCTYPE html>
<html lang="en" class="fi h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Insurance Policy Search' }}</title>
    
    @filamentStyles
    @vite('resources/css/filament/admin/theme.css')
</head>
<body class="antialiased fi-body min-h-full bg-gray-50 dark:bg-gray-950">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow border-b border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ $heading ?? 'Default Title' }}
            </h1>
        </div>
    </div>
    {{ $slot }}

    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} Aiwebdesk. All rights reserved.
            </p>
        </div>
    </footer>
    @filamentScripts
</body>
</html>