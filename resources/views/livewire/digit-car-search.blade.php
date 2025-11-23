<div>
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow border-b border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Grid for Digit - Private Cars
            </h1>
        </div>
    </div>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-950">
        <div class="space-y-6">
            <!-- Search Filters -->
            <x-filament::section>
                <form wire:submit.prevent="$refresh">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <!-- State -->
                        <div>
                            <label for="rto_state" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    State
                                </span>
                            </label>
                            <select
                                wire:model.live="rto_state"
                                id="rto_state"
                                class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >
                                <option value="">All</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Period -->
                        <div>
                            <label for="period" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Period
                                </span>
                            </label>
                            <select
                                wire:model.live="period"
                                id="period"
                                class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >
                                <option value="1">Nov, 2025</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end mt-2">
                       <x-filament::button wire:click="clearFilters" color="danger">
                        Clear Filters
                    </x-filament::button>


                    </div>
                </form>
            </x-filament::section>

            <!-- Search Results -->
            <x-filament::section>
                {{ $this->table }}
            </x-filament::section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} Aiwebdesk. All rights reserved.
            </p>
        </div>
    </footer>
</div>
