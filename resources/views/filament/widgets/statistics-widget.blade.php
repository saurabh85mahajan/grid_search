{{-- resources/views/filament/widgets/statistics-widget.blade.php --}}
<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            📊 System Statistics
        </x-slot>

        <div class="space-y-6">
            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- CC Table Count --}}
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-lg border border-blue-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-600">CC Table Records</div>
                            <div class="text-3xl font-bold text-blue-700">{{ number_format($ccTableCount) }}</div>
                        </div>
                    </div>
                </div>

                {{-- Total Organizations --}}
                <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-lg border border-green-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-600">Active Organizations</div>
                            <div class="text-3xl font-bold text-green-700">{{ count($organizationStats) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Organization Breakdown --}}
            <div class="bg-white border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Sub Users by Organization</h3>
                </div>
                <div class="p-6">
                    @forelse($organizationStats as $stat)
                        <div class="flex justify-between items-center py-3 px-4 mb-2 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-bold">{{ substr($stat['organisation_id'], 0, 2) }}</span>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900">Organization ID: {{ $stat['organisation_id'] }}</div>
                                    <div class="text-sm text-gray-500">{{ $stat['user_count'] }} sub users</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $stat['user_count'] }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            <div class="text-gray-500 mt-2">No sub users found</div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Last Updated --}}
            <div class="text-right text-xs text-gray-500">
                Last updated: {{ now()->format('M j, Y g:i A') }}
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>