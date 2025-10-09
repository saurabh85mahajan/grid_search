<div>
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow border-b border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Monthly Grid</h1>
        </div>
    </div>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-950 min-h-screen">
        <div class="space-y-6">
            <!-- Search Filters -->
            <x-filament::section>
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
                                <option value="BAJAJ">BAJAJ</option>
                                <option value="CHOLA">CHOLA</option>
                                <option value="DIGIT">DIGIT</option>
                                <option value="FUTURE">FUTURE</option>
                                <option value="HDFC">HDFC</option>
                                <option value="ICICI">ICICI</option>
                                <option value="KOTAK">KOTAK</option>
                                <option value="LIBERTY">LIBERTY</option>
                                <option value="MAGMA">MAGMA</option>
                                <option value="NATIONAL">NATIONAL</option>
                                <option value="RELIANCE">RELIANCE</option>
                                <option value="ROYAL">ROYAL</option>
                                <option value="ROYAL SUNDARAM">ROYAL SUNDARAM</option>
                                <option value="SBI">SBI</option>
                                <option value="SHRIRAM">SHRIRAM</option>
                                <option value="SOMPO">SOMPO</option>
                                <option value="TATA">TATA</option>
                                <option value="UNIVERSAL SOMPO">UNIVERSAL SOMPO</option>
                                <option value="ZUNO">ZUNO</option>
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
                                <option value="2W">2W</option>
                                <option value="3W GCV">3W GCV</option>
                                <option value="3W PCV">3W PCV</option>
                                <option value="GCW">GCW</option>
                                <option value="MISD">MISD</option>
                                <option value="Private Car">Private Car</option>
                                <option value="School Bus">School Bus</option>
                                <option value="Taxi">Taxi</option>
                                <option value="Tractor">Tractor</option>
                            </select>
                        </div>

                        <div>
                            <label for="region" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Region
                                </span>
                            </label>
                            <select 
                                wire:model.live="region"
                                id="region"
                                class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            >
                                <option value="1">UP, DL, UK, HR</option>
                                <option value="2">Maharashtra</option>
                            </select>
                        </div>
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
                © {{ date('Y') }} Insurance Policy Search. All rights reserved.
            </p>
        </div>
    </footer>
</div>