@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#c42802] text-sm font-medium leading-5 text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:border-[#f53003] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#706f6c] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:border-[#e3e3e0] dark:hover:border-[#3E3E3A] focus:outline-none focus:text-[#1b1b18] dark:focus:text-[#EDEDEC] focus:border-[#e3e3e0] dark:focus:border-[#3E3E3A] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
