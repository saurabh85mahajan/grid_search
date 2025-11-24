<div>
    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-950">
        <div class="space-y-6">
            <!-- Search Filters -->
            <x-filament::section>
                <form wire:submit.prevent="$refresh">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <x-filter-select label="State" model="rto_state" :options="$states" />
                        <x-filter-select label="Period" model="period" :options="$this->getPeriodOptions()" :showAll="false" />
                    </div>

                    <x-clear-filter />
                </form>
            </x-filament::section>

            <!-- Search Results -->
            <x-filament::section>
                {{ $this->table }}
            </x-filament::section>
        </div>
    </main>
</div>
