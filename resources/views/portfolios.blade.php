<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Portfolio') }} — {{ config('app.name', 'Lina') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2">
    <style>@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:500;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:600;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2) format('woff2')}</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #0a0a0a; color: #EDEDEC; font-family: 'Instrument Sans', sans-serif; margin: 0; padding: 2.5rem 1.5rem 3.5rem; max-width: 72rem; margin-inline: auto; }
        * { box-sizing: border-box; }
    </style>
</head>
<body>
    <h1 style="font-size:1.5rem;font-weight:600;letter-spacing:-0.025em;margin:0 0 0.375rem;">{{ __("Portfolio") }}</h1>
    <p style="color:#A1A09A;font-size:0.875rem;margin:0 0 2rem;">{{ __("Makeover projects and interior designs by Lina") }}</p>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
        @forelse ($portfolios as $portfolio)
            <div style="border-radius:3px;overflow:hidden;background:#161615;">
                <div style="aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;overflow:hidden;background:linear-gradient(135deg,#1a1a1a,#2a2a28);">
                    @if ($portfolio->image_path)
                        <picture>
                            <source media="(max-width: 640px)" srcset="{{ $portfolio->image_url }}?s=sm">
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
                        </picture>
                    @else
                        <svg style="width:2.5rem;height:2.5rem;color:rgba(255,255,255,.1);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
                    @endif
                </div>
                <div style="padding:0.75rem;overflow:hidden;word-break:break-word;">
                    <h3 style="font-size:0.75rem;font-weight:500;margin:0 0 0.25rem;word-break:break-word;overflow-wrap:break-word;overflow:hidden;">{{ $portfolio->title }}</h3>
                    <p style="color:#A1A09A;font-size:11px;line-height:1.625;word-break:break-word;margin:0;overflow:hidden;max-height:3.3em;">{{ $portfolio->description }}</p>
                </div>
            </div>
        @empty
            <p style="color:#A1A09A;font-size:0.875rem;">{{ __('No portfolio items yet.') }}</p>
        @endforelse
    </div>
    <script>
        (function() {
            var lang = localStorage.getItem('lang') || '{{ app()->getLocale() }}';
            if (lang === 'ar') { document.documentElement.dir = 'rtl'; document.documentElement.lang = 'ar'; document.documentElement.classList.add('rtl'); }
            else { document.documentElement.dir = 'ltr'; document.documentElement.lang = 'en'; document.documentElement.classList.remove('rtl'); }
        })();
    </script>
</body>
</html>
