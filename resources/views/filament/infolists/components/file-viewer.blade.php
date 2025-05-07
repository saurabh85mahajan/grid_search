<div>
    @php
        $state = $getState();
        $record = $getRecord();
        $fileUrl = null;
        $fileType = null;
        
        if ($state) {
            $fileUrl = '/protected-file/' . $state;
            
            try {
                $mimeType = Storage::disk('protected')->mimeType($state);
                if (str_contains($mimeType, 'pdf')) {
                    $fileType = 'pdf';
                } elseif (str_contains($mimeType, 'image/')) {
                    $fileType = 'image';
                }
            } catch (\Exception $e) {
                $fileType = 'unknown';
            }
        }
    @endphp
    
    @if(!$state)
        <div class="text-gray-500 italic">N.A.</div>
    @elseif($fileType == 'pdf')
        <div class="flex flex-col gap-1">
            <a 
                href="{{ $fileUrl }}" 
                target="_blank" 
                class="inline-flex items-center justify-center gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button h-9 px-4 text-sm text-white shadow focus:ring-white border-primary-600 bg-primary-600 hover:bg-primary-500 hover:border-primary-500"
            >
                <span>View PDF</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
        </div>
    @elseif($fileType == 'image')
        <div class="rounded-xl overflow-hidden border border-gray-300 shadow-sm">
            <img src="{{ $fileUrl }}" alt="Document" class="max-w-xs h-auto object-cover" />
        </div>
    @else
        <div class="flex flex-col gap-1">
            <a 
                href="{{ $fileUrl }}" 
                target="_blank" 
                class="inline-flex items-center justify-center gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button h-9 px-4 text-sm text-white shadow focus:ring-white border-primary-600 bg-primary-600 hover:bg-primary-500 hover:border-primary-500"
            >
                <span>View Document</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
        </div>
    @endif
</div>