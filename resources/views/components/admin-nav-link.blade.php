@props(['active' => false, 'href' => '#', 'label' => ''])

@php
$classes = $active
    ? 'flex items-center gap-3 px-3 py-2 text-sm font-medium text-[#EDEDEC] bg-[#2a2a28] rounded-lg transition-colors'
    : 'flex items-center gap-3 px-3 py-2 text-sm font-medium text-[#A1A09A] hover:text-[#EDEDEC] hover:bg-[#2a2a28] rounded-lg transition-colors';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    <span data-translate-key="{{ $label }}">{{ __($label) }}</span>
</a>
