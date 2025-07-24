<x-filament-panels::page>
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-900">PDF Document Parser</h2>
                <p class="text-sm text-gray-600 mt-1">
                    Upload an insurance PDF document to automatically extract customer and policy information.
                </p>
            </div>

            <form wire:submit="parsePdf">
                {{ $this->form }}

                <div class="mt-6 flex gap-3">
                    {{ $this->getFormActions()[0] }}
                    @if($this->showExtractedData)
                        {{ $this->getFormActions()[1] }}
                    @endif
                </div>
            </form>
        </div>

        @if($this->showExtractedData && !empty($this->extractedData))
            <div class="bg-green-50 rounded-lg border border-green-200 p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="text-sm font-medium text-green-800">
                        PDF Parsed Successfully
                    </h3>
                </div>
                <p class="text-sm text-green-700 mt-1">
                    Information has been extracted and is displayed below. You can copy this data to use in your forms.
                </p>
            </div>
        @endif

        <x-filament-actions::modals />
    </div>
</x-filament-panels::page>