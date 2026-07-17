@props(['route'])
<a href="{{ $route }}"
    class="md:hidden mt-4 mx-auto w-fit btn-sm btn-primary block text-center"
    data-translate-key="View All"
    onclick="window.location.href='{{ $route }}'">{{ __("View All") }}</a>