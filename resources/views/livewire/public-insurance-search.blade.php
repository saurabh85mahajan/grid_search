<div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold tracking-tight text-white">Insurance Policy Search</h1>
            <p class="mt-2 text-blue-100">Find the right insurance policy for your needs</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <!-- Search Filters -->
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Search Filters</h2>
                        <span class="text-sm text-gray-500">Select criteria to filter policies</span>
                    </div>
                    
                    <form wire:submit.prevent="$refresh">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{ $this->form }}
                        </div>
                        
                        <div class="mt-8 flex gap-4">
                            <button 
                                type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                Search
                            </button>
                            
                            <button 
                                type="button" 
                                wire:click="$set('data', [])"
                                class="inline-flex items-center px-6 py-3 bg-gray-200 border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 uppercase tracking-wider hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear Filters
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Results Table -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    {{ $this->table }}
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-12 bg-white border-t border-gray-200">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">
                © {{ date('Y') }} Insurance Policy Search. All rights reserved.
            </p>
        </div>
    </footer>
</div>