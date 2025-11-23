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
    {{ $slot }}

    @filamentScripts
</body>
</html>