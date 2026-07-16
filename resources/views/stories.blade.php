<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Stories') }} — {{ config('app.name', 'Lina') }}</title>
    <link rel="preconnect" href="/fonts" crossorigin>
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/fonts/instrument-sans-400.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/fonts/instrument-sans-500.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/fonts/instrument-sans-600.woff2">
    <style>@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url('/fonts/instrument-sans-400.woff2') format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:500;font-stretch:100%;font-display:swap;src:url('/fonts/instrument-sans-500.woff2') format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:600;font-stretch:100%;font-display:swap;src:url('/fonts/instrument-sans-600.woff2') format('woff2')}</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #0a0a0a; color: #EDEDEC; font-family: 'Instrument Sans', sans-serif; margin: 0; padding: 2.5rem 1.5rem 3.5rem; max-width: 72rem; margin-inline: auto; }
        * { box-sizing: border-box; }
    </style>
</head>
<body>
    <h1 style="font-size:1.5rem;font-weight:600;letter-spacing:-0.025em;margin:0 0 0.375rem;">{{ __("Stories") }}</h1>
    <p style="color:#A1A09A;font-size:0.875rem;margin:0 0 2rem;">{{ __("Behind the scenes & daily design moments") }}</p>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
        @forelse ($stories as $story)
            <div style="border-radius:3px;overflow:hidden;cursor:pointer;background:#161615;"
                onclick="openAllStory(this)"
                data-title="{{ $story->title }}"
                data-content="{{ $story->content }}"
                data-bg="{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}"
                data-type="{{ $story->type }}"
                data-image="{{ $story->image_url }}">
                <div style="height:8rem;display:flex;align-items:center;justify-content:center;background:{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }};">
                    @if ($story->image_path)
                        <picture>
                            <source media="(max-width: 640px)" srcset="{{ $story->image_url_sm }}">
                            <img src="{{ $story->image_url }}" alt="{{ $story->title }}" loading="lazy" width="192" height="128" style="width:100%;height:100%;object-fit:cover;">
                        </picture>
                    @else
                        <svg style="width:2.5rem;height:2.5rem;color:rgba(255,255,255,.6);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            @if ($story->type === 'text')
                                <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                            @elseif ($story->type === 'mixed')
                                <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/>
                            @else
                                <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/>
                            @endif
                        </svg>
                    @endif
                </div>
                <div style="padding:0.75rem;overflow:hidden;word-break:break-word;">
                    <h3 style="font-size:0.75rem;font-weight:500;margin:0 0 0.25rem;word-break:break-word;overflow-wrap:break-word;overflow:hidden;">{{ $story->title }}</h3>
                    <p style="color:#A1A09A;font-size:11px;line-height:1.625;word-break:break-word;margin:0;overflow:hidden;max-height:3.3em;">{{ Str::limit($story->content, 60) }}</p>
                </div>
            </div>
        @empty
            <p style="color:#A1A09A;font-size:0.875rem;">{{ __('No stories yet.') }}</p>
        @endforelse
    </div>

    {{-- Story Modal --}}
    <div id="allStoryModal" style="position:fixed;inset:0;z-index:1000;display:flex;align-items:center;justify-content:center;opacity:0;pointer-events:none;transition:opacity .35s ease;background:rgba(0,0,0,.92);"
        onclick="closeAllStory(event)">
        <div style="width:100%;max-width:32rem;margin:0 1rem;border-radius:12px;overflow:hidden;position:relative;aspect-ratio:9/16;box-shadow:inset 0 0 0 1px rgba(255,255,255,.1);" onclick="event.stopPropagation()">
            <button style="position:absolute;top:1rem;right:1rem;z-index:10;width:2.5rem;height:2.5rem;border-radius:9999px;border:none;display:flex;align-items:center;justify-content:center;color:white;font-size:1.25rem;cursor:pointer;background:rgba(255,255,255,.15);backdrop-filter:blur(8px);"
                onclick="closeAllStory()">&times;</button>
            <div id="allStoryModalContent" style="width:100%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:2rem;text-align:center;"></div>
        </div>
    </div>

    <script>
        function openAllStory(el) {
            var modal = document.getElementById('allStoryModal');
            var content = document.getElementById('allStoryModalContent');
            var text = el.getAttribute('data-content') || '';
            var bg = el.getAttribute('data-bg') || 'linear-gradient(135deg, #161615, #3E3E3A)';
            var type = el.getAttribute('data-type') || 'text';
            var image = el.getAttribute('data-image') || '';
            var html = '';
            if (type === 'image' && image) {
                html = '<img src="' + image + '" alt="" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">';
            } else if (type === 'mixed' && image) {
                html = '<img src="' + image + '" alt="" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;opacity:0.4;">';
                html += '<div style="position:relative;z-index:1;text-align:center;padding:1.5rem;color:white;font-size:0.875rem;line-height:1.625;max-width:20rem;">' + text + '</div>';
            } else {
                html = '<div style="color:white;font-size:0.875rem;line-height:1.625;max-width:20rem;">' + text + '</div>';
            }
            content.innerHTML = html;
            content.style.background = bg;
            content.style.position = 'relative';
            modal.style.opacity = '1';
            modal.style.pointerEvents = 'auto';
            document.body.style.overflow = 'hidden';
        }
        function closeAllStory(e) {
            if (e && e.target !== e.currentTarget) return;
            var modal = document.getElementById('allStoryModal');
            modal.style.opacity = '0';
            modal.style.pointerEvents = 'none';
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeAllStory();
        });
        (function() {
            var lang = localStorage.getItem('lang') || '{{ app()->getLocale() }}';
            if (lang === 'ar') { document.documentElement.dir = 'rtl'; document.documentElement.lang = 'ar'; document.documentElement.classList.add('rtl'); }
            else { document.documentElement.dir = 'ltr'; document.documentElement.lang = 'en'; document.documentElement.classList.remove('rtl'); }
        })();
    </script>
</body>
</html>
