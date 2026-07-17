@props(['tip', 'hidden' => false])
<div class="card-container card-hover p-3 max-w-full {{ $hidden ? 'hidden md:block' : '' }}">
    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-[#fdf0ed] text-[#c42802] dark:bg-[#FF4433]/15 dark:text-[#FF4433] mb-2">{{ $tip->category }}</span>
    <h3 class="font-medium text-xs text-primary mb-1 break-words">{{ $tip->title }}</h3>
    <p class="text-muted text-[11px] leading-relaxed break-words line-clamp-3">{{ $tip->content }}</p>
</div>