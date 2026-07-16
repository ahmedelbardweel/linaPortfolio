<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Tips & Insights') }} — {{ config('app.name', 'Lina') }}</title>
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
    <h1 style="font-size:1.5rem;font-weight:600;letter-spacing:-0.025em;margin:0 0 0.375rem;">{{ __("Tips & Insights") }}</h1>
    <p style="color:#A1A09A;font-size:0.875rem;margin:0 0 2rem;">{{ __("Short design ideas and inspiration") }}</p>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
        @forelse ($tips as $tip)
            <div style="border-radius:3px;padding:0.75rem;background:#161615;overflow:hidden;word-break:break-word;">
                <span style="display:inline-block;padding:0.125rem 0.5rem;border-radius:3px;font-size:10px;font-weight:600;color:#FF4433;margin-bottom:0.5rem;background:rgba(255,68,51,0.15);max-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $tip->category }}</span>
                <h3 style="font-size:0.75rem;font-weight:500;margin:0 0 0.25rem;word-break:break-word;overflow-wrap:break-word;overflow:hidden;">{{ $tip->title }}</h3>
                <p style="color:#A1A09A;font-size:11px;line-height:1.625;word-break:break-word;margin:0;">{{ $tip->content }}</p>
            </div>
        @empty
            <p style="color:#A1A09A;font-size:0.875rem;">{{ __('No tips yet.') }}</p>
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
