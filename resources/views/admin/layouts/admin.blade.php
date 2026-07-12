<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?: 'en' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ __('Admin panel for Lina interior design portfolio.') }}">

    <title>@yield('title', 'Admin') - {{ config('app.name', 'Lina') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-700-normal.woff2">
    <style>@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:500;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:600;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:700;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-700-normal.woff2) format('woff2')}</style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a] dark:text-[#EDEDEC]">

    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-30 w-64 bg-[#1b1b18] dark:bg-[#0a0a0a] text-[#EDEDEC] flex flex-col transition-transform -translate-x-full lg:translate-x-0 lg:static lg:inset-auto">
            {{-- Brand --}}
            <div class="h-16 flex items-center px-6 border-b border-[#3E3E3A]">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-wide">
                    <span class="text-[#c42802]">Lina</span> <span data-translate-key="Admin">{{ __("Admin") }}</span>
                </a>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <x-admin-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" label="Dashboard">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.hero.index')" :active="request()->routeIs('admin.hero.*')" label="Hero">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.reels.index')" :active="request()->routeIs('admin.reels.*')" label="Reels">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.stories.index')" :active="request()->routeIs('admin.stories.*')" label="Stories">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.tips.index')" :active="request()->routeIs('admin.tips.*')" label="Tips & Insights">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.*')" label="Portfolio">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*')" label="Settings">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </x-admin-nav-link>
            </nav>

            {{-- Logout --}}
            <div class="p-3 border-t border-[#3E3E3A]">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 text-sm text-[#A1A09A] hover:text-[#EDEDEC] hover:bg-[#2a2a28] rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span data-translate-key="Logout">{{ __("Logout") }}</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Overlay for mobile --}}
        <div class="fixed inset-0 bg-black/50 z-20 lg:hidden hidden" id="sidebar-overlay"></div>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col min-w-0">

            {{-- Top Bar --}}
            <header class="h-16 bg-[#FDFDFC] dark:bg-[#0a0a0a] border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between px-6 lg:px-8">
                <button id="sidebar-toggle" class="lg:hidden text-[#706f6c] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                <div class="flex-1"></div>

                {{-- Toggle buttons --}}
                <div class="flex items-center gap-2 mr-4">
                    <button onclick="toggleDark()" class="w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="Toggle theme">
                        <svg class="dark:hidden block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg class="hidden dark:block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </button>
                    <button onclick="toggleLang()" class="lang-btn w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all text-xs font-semibold" title="Toggle language">{{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}</button>
                </div>

                {{-- User Dropdown --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] focus:outline-none">
                        <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                        <div class="w-8 h-8 rounded-full bg-[#c42802] flex items-center justify-center text-white text-sm font-semibold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-[#161615] rounded-lg shadow-lg border border-[#e3e3e0] dark:border-[#3E3E3A] py-1 z-50" style="display: none;">
                        <a href="{{ route('profile.edit') }}" data-translate-key="Profile" class="block px-4 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28]">{{ __("Profile") }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" data-translate-key="Logout" class="w-full text-left px-4 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28]">{{ __("Logout") }}</button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-6 lg:p-8">

                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Upload Progress Bar --}}
    <div id="upload-progress" class="fixed top-0 left-0 right-0 z-50 hidden">
        <div class="h-1 bg-[#c42802] transition-all duration-300 ease-out" id="progress-bar" style="width:0%"></div>
        <div class="text-center text-xs font-medium text-[#c42802] mt-0.5" id="progress-text"></div>
    </div>

    {{-- Mobile sidebar toggle script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toggle = document.getElementById('sidebar-toggle');
            var sidebar = document.querySelector('aside');
            var overlay = document.getElementById('sidebar-overlay');
            if (toggle && sidebar && overlay) {
                toggle.addEventListener('click', function () {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                });
                overlay.addEventListener('click', function () {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                });
            }
    });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('form[enctype="multipart/form-data"]').forEach(function (form) {
                var btn = form.querySelector('button[type="submit"]');
                var origBtnText = btn ? btn.textContent : '';

                form.addEventListener('submit', function (e) {
                    var videoInput = form.querySelector('input[name="video"]');
                    var file = videoInput && videoInput.files.length > 0 ? videoInput.files[0] : null;
                    if (!file) return;

                    e.preventDefault();
                    if (btn) btn.textContent = '0%';

                    function submitForm(fd) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', form.action, true);
                        xhr.setRequestHeader('Accept', 'application/json');
                        xhr.upload.onprogress = function (e) {
                            if (e.lengthComputable) {
                                var pct = Math.round((e.loaded / e.total) * 100);
                                if (btn) btn.textContent = pct + '%';
                            }
                        };
                        xhr.onload = function () {
                            if (btn) btn.textContent = origBtnText;
                            if (xhr.status >= 200 && xhr.status < 400) {
                                try { var res = JSON.parse(xhr.responseText); if (res.redirect) { window.location.href = res.redirect; return; } } catch (_) {}
                                window.location.href = xhr.responseURL || form.action;
                            } else {
                                var msg = 'Upload failed.';
                                try { var err = JSON.parse(xhr.responseText); var first = Object.values(err.errors || {})[0]; if (first) msg = first[0]; else if (err.message) msg = err.message; } catch (_) {}
                                alert(msg);
                            }
                        };
                        xhr.onerror = function () { if (btn) btn.textContent = origBtnText; alert('Network error.'); };
                        xhr.send(fd);
                    }

                    var fd = new FormData(form);

                    // File <= 3MB → submit directly via AJAX
                    if (file.size <= 3 * 1024 * 1024) {
                        submitForm(fd);
                        return;
                    }

                    // File > 3MB → try Vercel Blob
                    fetch('/api/blob-upload-url', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value },
                        body: JSON.stringify({ name: file.name })
                    })
                    .then(function (r) {
                        if (!r.ok) return r.json().then(function (d) { throw new Error(d.error || 'Failed'); });
                        return r.json();
                    })
                    .then(function (data) {
                        if (!data.uploadUrl) throw new Error('No upload URL');
                        return new Promise(function (resolve, reject) {
                            var xhr2 = new XMLHttpRequest();
                            xhr2.open('PUT', data.uploadUrl, true);
                            xhr2.setRequestHeader('Content-Type', file.type || 'video/mp4');
                            xhr2.upload.onprogress = function (e) {
                                if (e.lengthComputable) {
                                    var pct = Math.round((e.loaded / e.total) * 100);
                                    if (btn) btn.textContent = pct + '%';
                                }
                            };
                            xhr2.onload = function () { resolve(data.url); };
                            xhr2.onerror = function () { reject(new Error('Blob upload failed')); };
                            xhr2.send(file);
                        });
                    })
                    .then(function (blobUrl) {
                        var f = new FormData(form);
                        f.delete('video');
                        f.set('video_path', blobUrl);
                        f.set('_direct_upload', '1');
                        submitForm(f);
                    })
                    .catch(function (err) {
                        if (btn) btn.textContent = origBtnText;
                        var msg = err && err.message ? err.message : 'Upload failed. Please try again.';
                        if (msg.includes('BLOB_READ_WRITE_TOKEN')) {
                            msg = 'Vercel Blob not configured. Please add BLOB_READ_WRITE_TOKEN to your Vercel environment variables, or use a video smaller than 3MB.';
                        }
                        alert(msg);
                    });
                });
            });
        });
    </script>

    {{-- Translation Script --}}
    <script>
    window.translations = @json(file_exists(lang_path('ar.json')) ? json_decode(file_get_contents(lang_path('ar.json')), true) : []);

    function switchLanguage(lang) {
        document.documentElement.lang = lang;
        document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
        if (lang === 'ar') {
            document.documentElement.classList.add('rtl');
        } else {
            document.documentElement.classList.remove('rtl');
        }

        document.querySelectorAll('[data-translate-key]').forEach(el => {
            const key = el.getAttribute('data-translate-key');
            const translation = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
            el.textContent = translation;
        });

        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.textContent = lang === 'ar' ? 'AR' : 'EN';
        });

        localStorage.setItem('lang', lang);
        fetch(`/lang/${lang}`).catch(() => {});
    }

    // Apply on load if localStorage differs from server locale
    document.addEventListener('DOMContentLoaded', () => {
        const saved = localStorage.getItem('lang');
        const serverLang = document.documentElement.getAttribute('lang') || 'en';
        if (saved && saved !== serverLang) {
            switchLanguage(saved);
        }
    });
    </script>
</body>
</html>
