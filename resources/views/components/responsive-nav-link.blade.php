@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#c42802] text-start text-base font-medium text-[#c42802] bg-[#fdf0ed] focus:outline-none focus:text-[#f53003] focus:bg-[#fdf0ed] focus:border-[#f53003] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#706f6c] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] hover:border-[#e3e3e0] dark:hover:border-[#3E3E3A] focus:outline-none focus:text-[#1b1b18] dark:focus:text-[#EDEDEC] focus:bg-[#f0f0ef] dark:focus:bg-[#2a2a28] focus:border-[#e3e3e0] dark:focus:border-[#3E3E3A] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
