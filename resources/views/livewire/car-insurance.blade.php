<div>
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 bg-gray-50">
        <div class="space-y-6">
            <x-filament::section>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- ICICI Card -->
                    <a href="{{ route('icici-grid-car') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">ICICI</h5>
                        <p class="font-normal text-gray-700">View ICICI car insurance grid and rates</p>
                    </a>

                    <!-- Digit Card -->
                    <a href="{{ route('digit-grid-car') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Digit Insurance</h5>
                        <p class="font-normal text-gray-700">View Digit car insurance grid and rates</p>
                    </a>

                    <!-- HDFC Card -->
                    <a href="{{ route('hdfc-grid-car') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">HDFC Insurance</h5>
                        <p class="font-normal text-gray-700">View HDFC car insurance grid and rates</p>
                    </a>

                    <!-- Future Card -->
                    <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Future Insurance</h5>
                        <p class="font-normal text-gray-700">Future PAN India Grid Rate is 17%</p>
                    </a>

                    <!-- Sriram Card -->
                    <a href="{{ route('sriram-grid-car') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-50 transition">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Sriram Insurance</h5>
                        <p class="font-normal text-gray-700">View Sriram insurance grid and rates</p>
                    </a>

                    <!-- Add more insurance providers as needed -->
                </div>
            </x-filament::section>
        </div>
    </main>
</div>