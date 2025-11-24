@props(['label' => 'Clear Filters'])

<div class="flex justify-end mt-2">
    <x-filament::button wire:click="clearFilters" color="danger">
        {{ $label }}
    </x-filament::button>
</div>