<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Insurance Search' }}</title>
    
    @filamentStyles
    @vite('resources/css/app.css')
</head>
<body>
    {{ $slot }}

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>