@props(['label', 'model', 'options', 'showAll' => true])

<div>
    <label for="{{ $model }}" class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
            {{ $label }}
        </span>
    </label>
    <select
        wire:model.live="{{ $model }}"
        id="{{ $model }}"
        class="fi-select-input block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
    >
        @if($showAll)
            <option value="">All</option>
        @endif
        @foreach ($options as $key => $value)
            @if($showAll)
                <option value="{{ $value }}">{{ $value }}</option>
            @else
                <option value="{{ $key }}">{{ $value }}</option>
            @endif
        @endforeach
    </select>
</div>