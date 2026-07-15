<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ __('Interior design & decoration studio crafting elegant, functional spaces.') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2">
        <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2">
        <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2">
        <style>@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:500;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:600;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2) format('woff2')}</style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .auth-bg-img {
                opacity: 0;
                animation: dropIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards,
                           bgFloat 6s ease-in-out infinite;
                animation-delay: var(--anim-delay, 0s), calc(var(--anim-delay, 0s) + 0.8s);
            }
            @keyframes dropIn {
                0% { transform: translateY(-120px) rotate(var(--rot,0deg)); opacity: 0; filter: blur(8px); }
                100% { transform: translateY(0) rotate(var(--rot,0deg)); opacity: var(--bg-op,0.08); filter: blur(0); }
            }
            @keyframes bgFloat {
                0%, 100% { transform: translateY(0) rotate(var(--rot,0deg)); }
                50% { transform: translateY(-6px) rotate(var(--rot,0deg)); }
            }
            html { scrollbar-width: none; -ms-overflow-style: none; }
            html::-webkit-scrollbar { display: none; }
        </style>
    </head>
    <body class="font-sans text-[#1b1b18] dark:text-[#EDEDEC] antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a] min-h-screen flex items-center justify-center relative overflow-hidden">

        @php
            use App\Models\Portfolio;
            use App\Models\Story;
            $authBgImages = [];
            foreach (Portfolio::where('is_active', true)->take(8)->get() as $p) { if ($p->image_url) $authBgImages[] = $p->image_url; }
            foreach (Story::where('is_active', true)->take(6)->get() as $s) { if ($s->image_url) $authBgImages[] = $s->image_url; }
        @endphp

        @if (count($authBgImages))
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            @for ($i = 0; $i < 100; $i++)
            @php
                $img = $authBgImages[array_rand($authBgImages)];
                $x = rand(0, 92);
                $y = rand(0, 92);
                $w = rand(60, 120);
                $imgH = round($w * rand(65, 80) / 100);
                $rot = rand(-15, 15);
                $op = rand(5, 12) / 100;
            @endphp
            <img src="{{ $img }}" alt="" loading="lazy"
                style="position:absolute;left:{{ $x }}%;top:{{ $y }}%;width:{{ $w }}px;height:{{ $imgH }}px;object-fit:cover;border-radius:2px;--bg-op:{{ $op }};--rot:{{ $rot }}deg;--anim-delay:{{ $i * 0.04 }}s"
                class="auth-bg-img">
            @endfor
        </div>
        @endif

        {{-- Nav --}}
        <nav class="fixed top-0 left-0 right-0 z-50 h-14 flex items-center justify-center px-5 bg-[#fdfdfc] dark:bg-[#0a0a0a]">
            <div class="flex items-center gap-4 w-full max-w-6xl px-0 lg:px-8">
                <a href="/"
                    class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC] me-auto">
                    <span class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold"
                        style="font-family:Georgia,serif;border-radius:3px">L</span>
                    <span data-translate-key="Lina">{{ __("Lina") }}</span>
                </a>
                <button onclick="toggleLang()" class="lang-btn w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all text-xs font-semibold" title="Toggle language">{{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}</button>
            </div>
        </nav>

        {{-- Auth Card --}}
        <main class="relative z-10 w-full max-w-sm mx-4">
            <div class="bg-white/60 dark:bg-[#161615]/60 backdrop-blur-lg shadow-lg border border-[#e3e3e0] dark:border-[#3E3E3A] p-8"
                style="border-radius:3px">
                {{ $slot }}
            </div>
        </main>

        <style>
    </body>

    <script>
    window.translations = {!! file_exists(lang_path('ar.json')) ? file_get_contents(lang_path('ar.json')) : '{}' !!};

    function switchLanguage(lang) {
        document.documentElement.lang = lang;
        document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
        if (lang === 'ar') { document.documentElement.classList.add('rtl'); }
        else { document.documentElement.classList.remove('rtl'); }

        document.querySelectorAll('[data-translate-key]').forEach(el => {
            const key = el.getAttribute('data-translate-key');
            el.textContent = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
        });

        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.textContent = lang === 'ar' ? 'AR' : 'EN';
        });

        localStorage.setItem('lang', lang);
        fetch(`/lang/${lang}`).catch(() => {});
    }

    function toggleLang() {
        const current = document.documentElement.lang || 'en';
        switchLanguage(current === 'ar' ? 'en' : 'ar');
    }

    function toggleDark() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('dark', '0');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('dark', '1');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const saved = localStorage.getItem('lang');
        const serverLang = document.documentElement.getAttribute('lang') || 'en';
        if (saved && saved !== serverLang) switchLanguage(saved);

        if (localStorage.getItem('dark') === '1') {
            document.documentElement.classList.add('dark');
        } else if (localStorage.getItem('dark') === '0') {
            document.documentElement.classList.remove('dark');
        }
    });
    </script>
</html>
