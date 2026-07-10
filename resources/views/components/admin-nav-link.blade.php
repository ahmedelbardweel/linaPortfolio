@props(['active' => false, 'href' => '#', 'label' => ''])

@php
$classes = $active
    ? 'flex items-center gap-3 px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg transition-colors'
    : 'flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    <span data-translate-key="{{ $label }}">{{ __($label) }}</span>
</a>
