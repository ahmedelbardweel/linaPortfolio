@props(['portfolio'])
<div class="card-container card-hover">
    <div class="relative flex items-center justify-center overflow-hidden"
        style="aspect-ratio:4/3;background:linear-gradient(135deg,#fdf6f0,#f5e6d3)">
        @if ($portfolio->image_path)
            <picture>
                <source media="(max-width: 640px)" srcset="{{ $portfolio->image_url_sm }}">
                <img src="{{ $portfolio->image_url_sm }}" srcset="{{ $portfolio->image_url_sm }} 180w, {{ $portfolio->image_url }} 320w" sizes="(max-width: 640px) 50vw, 320px" alt="{{ $portfolio->title }}" loading="lazy" decoding="async" width="320" height="240" class="w-full h-full object-cover">
            </picture>
        @else
            <svg class="w-12 h-12 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
            </svg>
        @endif
    </div>
    <div class="p-3">
        <h3 class="font-medium text-xs text-primary">{{ $portfolio->title }}</h3>
        @if ($portfolio->description)
            <p class="text-muted text-[11px] leading-relaxed mt-1 line-clamp-2">{{ $portfolio->description }}</p>
        @endif
    </div>
</div>