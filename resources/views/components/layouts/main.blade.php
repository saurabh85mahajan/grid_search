<!DOCTYPE html>
<html lang="en" class="fi h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Insurance Policy Search' }}</title>
    
    @filamentStyles
    @vite('resources/css/filament/admin/theme.css')
    
    <style>
        .nav-bar {
            background-color: #2563eb; /* blue-600 */
        }
        .nav-link {
            color: white;
            transition: background-color 0.2s;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 0.375rem;
        }
        .nav-link:hover {
            background-color: #1d4ed8; /* blue-700 */
        }
        .nav-link.active {
            background-color: #1d4ed8; /* blue-700 */
            font-weight: 600;
        }
    </style>
</head>
<body class="antialiased fi-body min-h-full bg-gray-50">
    <!-- Simple Navigation Bar -->
    <nav class="nav-bar shadow-sm">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-14 items-center justify-between">
                <!-- Desktop Menu -->
                <div class="hidden md:flex md:space-x-2">
                    <a href="{{ route('car-insurance') }}" class="nav-link">
                        Car
                    </a>
                    <a href="{{ route('two-wheeler-insurance') }}" class="nav-link">
                        2 Wheeler
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button 
                    onclick="toggleMobileMenu()"
                    type="button" 
                    class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-blue-700"
                >
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-3 pt-2">
                <div class="space-y-1">
                    <a href="{{ route('car-insurance') }}" class="nav-link block">
                        Car
                    </a>
                    <a href="{{ route('two-wheeler-insurance') }}" class="nav-link block">
                        2 Wheeler
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Title -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
            <h1 class="text-xl font-semibold text-gray-800">
                {{ $heading ?? 'Default Title' }}
            </h1>
        </div>
    </div>

    {{ $slot }}

    <footer class="bg-gray-50 border-t border-gray-200">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-600">
                © {{ date('Y') }} Aiwebdesk. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>

    @filamentScripts
</body>
</html>