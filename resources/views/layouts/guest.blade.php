<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ __('Interior design & decoration studio crafting elegant, functional spaces.') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2">
    <style>@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:500;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:600;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2) format('woff2')}</style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[#1b1b18] antialiased">
        <main>
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
                <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-[#706f6c]" />
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-[#161615] shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </main>
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

    document.addEventListener('DOMContentLoaded', () => {
        const saved = localStorage.getItem('lang');
        const serverLang = document.documentElement.getAttribute('lang') || 'en';
        if (saved && saved !== serverLang) switchLanguage(saved);
    });
    </script>
</html>
