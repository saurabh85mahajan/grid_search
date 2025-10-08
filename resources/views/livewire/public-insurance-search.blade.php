<div>
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow border-b border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Insurance Policy Search</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Find the right insurance policy for your needs</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-950 min-h-screen">
        <div class="space-y-6">
            <!-- Search Filters -->
            <x-filament::section>
                <x-slot name="heading">
                    Search Filters
                </x-slot>
                
                <x-slot name="description">
                    Select your criteria to find insurance policies
                </x-slot>

                <form wire:submit.prevent="$refresh">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <!-- Insurer -->
                        <div>
                            <label for="insurer" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Insurer
                                </span>
                            </label>
                            <select 
                                wire:model.live="insurer"
                                id="insurer"
                                class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >
                                <option value="">All Insurers</option>
                                @foreach(\App\Models\InsuranceGridRaw::distinct()->orderBy('insurer')->pluck('insurer') as $insurerOption)
                                    <option value="{{ $insurerOption }}">{{ $insurerOption }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Segment -->
                        <div>
                            <label for="segment" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Segment
                                </span>
                            </label>
                            <select 
                                wire:model.live="segment"
                                id="segment"
                                class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >
                                <option value="">All Segments</option>
                                @foreach(\App\Models\InsuranceGridRaw::distinct()->orderBy('segment')->pluck('segment') as $segmentOption)
                                    <option value="{{ $segmentOption }}">{{ $segmentOption }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Policy Type -->
                        <div>
                            <label for="policy_type" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Policy Type
                                </span>
                            </label>
                            <select 
                                wire:model.live="policy_type"
                                id="policy_type"
                                class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >
                                <option value="">All Policy Types</option>
                                @foreach(\App\Models\InsuranceGridRaw::distinct()->orderBy('policy_type')->pluck('policy_type') as $policyTypeOption)
                                    <option value="{{ $policyTypeOption }}">{{ $policyTypeOption }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex gap-3">
                        <x-filament::button type="submit" color="primary">
                            <x-slot name="icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </x-slot>
                            Search
                        </x-filament::button>
                        
                        <x-filament::button 
                            type="button" 
                            color="gray"
                            wire:click="clearFilters"
                        >
                            <x-slot name="icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </x-slot>
                            Clear Filters
                        </x-filament::button>
                    </div>
                </form>
            </x-filament::section>

            <!-- Search Results -->
            <x-filament::section>
                <x-slot name="heading">
                    Search Results
                </x-slot>
                
                <x-slot name="description">
                    Click on any row to view full details
                </x-slot>

                {{ $this->table }}
            </x-filament::section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} Insurance Policy Search. All rights reserved.
            </p>
        </div>
    </footer>
</div>