@props(['story'])
<div class="story-card shrink-0 w-48 card-container cursor-pointer"
    data-click="openStory"
    data-title="{{ $story->title }}"
    data-content="{{ $story->content }}"
    data-bg="{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}"
    data-type="{{ $story->type }}"
    data-image="{{ $story->image_url }}">
    <div class="h-32 flex items-center justify-center"
        style="background:{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}">
        @if ($story->image_path)
            <picture>
                <source media="(max-width: 640px)" srcset="{{ $story->image_url_sm }}">
                <img src="{{ $story->image_url_sm }}" srcset="{{ $story->image_url_sm }} 160w, {{ $story->image_url }} 192w" sizes="(max-width: 640px) 160px, 192px" alt="{{ $story->title }}" loading="lazy" decoding="async" width="192" height="128" class="w-full h-full object-cover">
            </picture>
        @else
            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                @if ($story->type === 'text')
                    <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                @elseif ($story->type === 'mixed')
                    <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/>
                @else
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>
                @endif
            </svg>
        @endif
    </div>
    <div class="p-3">
        <p class="font-medium text-xs text-primary line-clamp-2">{{ $story->title }}</p>
    </div>
</div>