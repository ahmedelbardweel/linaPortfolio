<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ __('Interior design & decoration studio crafting elegant, functional spaces.') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <x-font-preloads weights="400,500,600" />

        <x-vite />

        <style>
            html { scrollbar-width: none; -ms-overflow-style: none; }
            html::-webkit-scrollbar { display: none; }
        </style>
    </head>
    <body class="font-sans text-[#1b1b18] dark:text-[#EDEDEC] antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a] min-h-screen flex items-center justify-center">

        {{-- Nav --}}
        <nav class="fixed top-0 left-0 right-0 z-50 h-14 flex items-center justify-center px-5 bg-[#fdfdfc] dark:bg-[#0a0a0a]">
            <div class="flex items-center gap-4 w-full max-w-6xl px-0 lg:px-8">
                <a href="/"
                    class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC] me-auto">
                    <?php $logoPath = \App\Models\Setting::get('logo'); ?>
                    @if ($logoPath)
                        <img src="{{ $logoPath }}" alt="Logo" width="24" height="24" style="max-height:24px;width:auto;object-fit:contain">
                    @else
                        <span class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold" style="font-family:Georgia,serif;border-radius:3px">L</span>
                    @endif
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
