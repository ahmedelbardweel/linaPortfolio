<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?: 'en' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    @php $h = $hero ?? null; @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>{{ __("Lina - Interior Design & Decoration") }}</title>
    <meta name="description" content="{{ __("Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.") }}">

    <!-- Font preloads (critical above-the-fold only) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="{{ url('/') }}">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/playfair-display/files/playfair-display-latin-700-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2">
    @if (!$mainImageInline && $h && $h->main_image_url && !str_contains($h->main_image_url, 'data:'))
        <link rel="preload" as="image" href="{{ $h->main_image_url }}" fetchpriority="high">
    @endif
    <style>
        @font-face{font-family:'Instrument Sans';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:500;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-500-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:600;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-600-normal.woff2) format('woff2')}@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:700;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-700-normal.woff2) format('woff2')}@font-face{font-family:'Playfair Display';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/playfair-display/files/playfair-display-latin-400-normal.woff2) format('woff2')}@font-face{font-family:'Playfair Display';font-style:normal;font-weight:700;font-stretch:100%;font-display:swap;src:url(https://fonts.bunny.net/playfair-display/files/playfair-display-latin-700-normal.woff2) format('woff2')}
    </style>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] m-0">
    <div id="snapContainer" class="snap-container"
        style="overflow-y:auto;scroll-snap-type:y mandatory;scrollbar-width:none;-ms-overflow-style:none">
        <style>
            html { scrollbar-width: none; -ms-overflow-style: none; }
            html::-webkit-scrollbar { display: none; }
            body { overflow: -moz-scrollbars-none; -ms-overflow-style: none; }
            body::-webkit-scrollbar { display: none; }
            html.dark nav {
                background: rgba(10, 10, 10, .3) !important;
            }
            html.dark #navIsland {
                background: rgba(10, 10, 10, .3) !important;
            }
            html.dark .mobile-menu {
                background: rgba(10, 10, 10, .35) !important;
            }
            .snap-container::-webkit-scrollbar {
                display: none
            }
            .snap-container { height: 100vh; height: 100dvh; }
            .snap-section { min-height: 100vh; min-height: 100dvh; }
            @media (min-width: 769px) {
                body { overflow: hidden !important; }
                .snap-container {
                    overflow: hidden !important;
                    scroll-snap-type: none !important;
                    position: relative;
                }
                .snap-section {
                    position: absolute;
                    inset: 0;
                    width: 100%;
                    height: 100%;
                    overflow-y: auto;
                    scroll-snap-align: none !important;
                    opacity: 0;
                    z-index: 1;
                    backface-visibility: hidden;
                }
                .snap-section.page-active {
                    opacity: 1;
                    z-index: 2;
                    animation: none;
                }
                .snap-section.page-exit-left {
                    z-index: 3;
                    transform-origin: left;
                    animation: pageFlipOut 0.55s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                }
                .snap-section.page-enter-right {
                    z-index: 1;
                    animation: pageFlipIn 0.55s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                }
                .snap-section.page-exit-right {
                    z-index: 3;
                    transform-origin: right;
                    animation: pageFlipOut 0.55s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                }
                .snap-section.page-enter-left {
                    z-index: 1;
                    animation: pageFlipIn 0.55s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                }
                @keyframes pageFlipOut {
                    0%   { transform: rotateY(0); opacity: 1; }
                    100% { transform: rotateY(-90deg); opacity: 0; }
                }
                @keyframes pageFlipIn {
                    0%   { transform: translateX(20%); opacity: 0; }
                    100% { transform: translateX(0); opacity: 1; }
                }
                .snap-container {
                    perspective: 1200px;
                }
            }
            @media (max-width: 768px) {
                .snap-section { min-height: auto !important; padding-top: 56px; }
                .snap-container { scroll-snap-type: none !important; scroll-padding-top: 56px; }
                #hero-section { height: 80vh !important; min-height: 80vh !important; margin-top: 56px !important; padding-top: 0 !important; }
                #hero-section .max-w-6xl { justify-content: center !important; gap: 0.5rem !important; padding-top: 0 !important; padding-bottom: 0 !important; }
                #hero-section h1 { font-size: 1.5rem !important; margin-top: 20px !important; margin-bottom: 20px !important; }
                #hero-section h2 { font-size: 0.875rem !important; line-height: 1.3 !important; margin-bottom: 0 !important; }
                #hero-section p.text-xs { font-size: 0.6875rem !important; margin-bottom: 0 !important; }
                #hero-section .h-\[200px\] { height: 160px !important; }
                #hero-section .h-\[180px\] { height: 140px !important; }
                #hero-section .order-1 { margin-top: 30px !important; }
                #about { height: 80vh !important; min-height: 80vh !important; }
                #about h1 { font-size: 1.75rem !important; margin-bottom: 0.5rem !important; }
                #about .max-w-4xl { padding-top: 0 !important; padding-bottom: 0 !important; justify-content: center !important; display: flex !important; flex-direction: column !important; }
                #about .text-base { font-size: 0.6875rem !important; }
                #about .text-sm { font-size: 0.625rem !important; }
                #about .space-y-6 > * + * { margin-top: 0.375rem !important; }
                #about .mt-10 { margin-top: 0.5rem !important; }
                #about .pt-6 { padding-top: 0.375rem !important; }
                #portfolio h2, #stories h2, #tips h2 { font-size: 1.25rem !important; }
                #portfolio .max-w-6xl, #stories .max-w-6xl, #tips .max-w-6xl { padding-top: 1rem !important; padding-bottom: 1rem !important; }
                .story-card { width: 160px !important; }
                .story-card .h-32 { height: 100px !important; }
                #contact { padding-top: 0 !important; }
            }
            @keyframes dropIn {
                0% { transform: translateY(-120px) rotate(var(--rot,0deg)); opacity: 0; filter: blur(8px); }
                100% { transform: translateY(0) rotate(var(--rot,0deg)); opacity: var(--bg-op,0.08); filter: blur(0); }
            }
            @keyframes bgFloat {
                0%, 100% { transform: translateY(0) rotate(var(--rot,0deg)); }
                50% { transform: translateY(-6px) rotate(var(--rot,0deg)); }
            }
            .bg-img-anim {
                opacity: 0;
                animation: dropIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards,
                           bgFloat 6s ease-in-out infinite;
                animation-delay: var(--anim-delay, 0s), calc(var(--anim-delay, 0s) + 0.8s);
            }
            @keyframes slideInLeft {
                0% { transform: translateX(-80px); opacity: 0; }
                100% { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideInRight {
                0% { transform: translateX(80px); opacity: 0; }
                100% { transform: translateX(0); opacity: 1; }
            }
            @keyframes dropFromTop {
                0% { transform: translateY(-80px); opacity: 0; }
                100% { transform: translateY(0); opacity: 1; }
            }
            .anim-left { animation: slideInLeft 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both; }
            .anim-right { animation: slideInRight 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s both; }
            .anim-center { animation: dropFromTop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both; }
            html.rtl .anim-left { animation: slideInRight 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both; }
            html.rtl .anim-right { animation: slideInLeft 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) 0.4s both; }
        </style>
        <nav class="fixed top-0 left-0 right-0 z-50 h-14 flex items-center justify-center px-5 bg-[#fdfdfc] dark:bg-[#0a0a0a]">
            <div class="flex items-center w-full max-w-6xl px-0 lg:px-8 relative">
                <a href="#hero-section"
                    class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    <?php $logoPath = \App\Models\Setting::get('logo'); ?>
                    @if ($logoPath)
                        <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" class="h-6 w-auto">
                    @else
                        <span class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold" style="font-family:Georgia,serif;border-radius:3px">L</span>
                    @endif
                    <span data-translate-key="Lina">{{ __("Lina") }}</span>
                </a>

                {{-- Center nav links --}}
                <div class="hidden md:flex items-center gap-3 absolute left-1/2 -translate-x-1/2">
                    <button data-target="hero-section" data-translate-key="Hero" class="island-item text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("Hero") }}</button>
                    <button data-target="about" data-translate-key="About" class="island-item text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("About") }}</button>
                    <button data-target="portfolio" data-translate-key="Portfolio" class="island-item text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("Portfolio") }}</button>
                    <button data-target="stories" data-translate-key="Stories" class="island-item text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("Stories") }}</button>
                    <a href="/reels" data-translate-key="Reels" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("Reels") }}</a>
                    <button data-target="tips" data-translate-key="Tips" class="island-item text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("Tips") }}</button>
                    <button data-target="contact" data-translate-key="Contact" class="island-item text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors text-xs font-medium">{{ __("Contact") }}</button>
                </div>

                {{-- Right side actions --}}
                <div class="hidden md:flex items-center gap-3 ms-auto">
                    <button onclick="toggleDark()"
                        class="w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all"
                        title="Toggle theme">
                        <svg class="dark:hidden block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg class="hidden dark:block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                    <a href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                        onclick="event.preventDefault(); switchLanguage(document.documentElement.lang === 'ar' ? 'en' : 'ar');"
                        class="lang-btn w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all text-xs font-semibold">{{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}</a>
                    @auth
                        @if (Auth::user()->is_admin)
                            <a href="/admin" data-translate-key="Admin Dashboard"
                                class="px-3.5 py-1.5 rounded-sm text-xs font-medium text-white hover:opacity-90 transition-opacity shadow-[0_0_0_1px_rgba(26,26,0,0.08)] bg-[#c42802] dark:bg-[#FF4433]">{{ __("Admin Dashboard") }}</a>
                        @else
                            <a href="#contact" data-translate-key="Request Consultation"
                                class="px-3.5 py-1.5 rounded-sm text-xs font-medium text-white hover:opacity-90 transition-opacity shadow-[0_0_0_1px_rgba(26,26,0,0.08)] bg-[#c42802] dark:bg-[#FF4433]">{{ __("Request Consultation") }}</a>
                            <a href="#contact" data-translate-key="Contact Us"
                                class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Contact Us") }}</a>
                        @endif
                    @else
                        <a href="/login" data-translate-key="Login"
                            class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Login") }}</a>
                        <a href="/register" data-translate-key="Register"
                            class="px-3.5 py-1.5 rounded-sm text-xs font-medium text-white hover:opacity-90 transition-opacity shadow-[0_0_0_1px_rgba(26,26,0,0.08)] bg-[#c42802] dark:bg-[#FF4433]">{{ __("Register") }}</a>
                    @endauth
                </div>
                <button onclick="toggleMobileMenu()" class="md:hidden ms-auto flex items-center justify-center w-8 h-8 rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-all" aria-label="Toggle menu">
                    <svg id="menuIconOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="menuIconClose" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <div id="mobileMenu" class="mobile-menu fixed top-14 left-0 right-0 z-40 hidden flex-col px-6 pb-8 pt-4 text-[15px] bg-[#fdfdfc] dark:bg-[#0a0a0a]"
            style="transform:translateY(-100%);transition:transform .3s ease">
            <div class="w-full h-px bg-[#e3e3e0] dark:bg-[#3E3E3A] mb-4"></div>
            <div class="flex items-center justify-between px-4">
                <div class="flex items-center gap-3">
                    <button onclick="toggleDark()"
                        class="w-9 h-9 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all"
                        title="Toggle theme">
                        <svg class="dark:hidden block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg class="hidden dark:block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                    <a href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                        onclick="event.preventDefault(); switchLanguage(document.documentElement.lang === 'ar' ? 'en' : 'ar'); closeMobileMenu();"
                        class="lang-btn w-9 h-9 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all text-xs font-semibold">{{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}</a>
                </div>
                <div class="flex items-center gap-2">
                    @auth
                        @if (Auth::user()->is_admin)
                            <a href="/admin" data-translate-key="Admin Dashboard" class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-[#c42802] dark:bg-[#FF4433] hover:opacity-90 transition-opacity" onclick="closeMobileMenu()">{{ __("Admin Dashboard") }}</a>
                        @else
                            <a href="#contact" data-translate-key="Request Consultation" class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-[#c42802] dark:bg-[#FF4433] hover:opacity-90 transition-opacity" onclick="closeMobileMenu()">{{ __("Request Consultation") }}</a>
                            <a href="#contact" data-translate-key="Contact Us" class="px-4 py-2 rounded-lg text-sm text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Contact Us") }}</a>
                        @endif
                    @else
                        <a href="/login" data-translate-key="Login" class="px-4 py-2 rounded-lg text-sm text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Login") }}</a>
                        <a href="/register" data-translate-key="Register" class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-[#c42802] dark:bg-[#FF4433] hover:opacity-90 transition-opacity" onclick="closeMobileMenu()">{{ __("Register") }}</a>
                    @endauth
                </div>
            </div>
        </div>

        <script>
            function toggleMobileMenu() {
                const menu = document.getElementById('mobileMenu');
                const openIcon = document.getElementById('menuIconOpen');
                const closeIcon = document.getElementById('menuIconClose');
                const isOpen = menu.style.transform === 'translateY(0%)';
                if (isOpen) {
                    menu.style.transform = 'translateY(-100%)';
                    setTimeout(() => { menu.classList.add('hidden'); }, 300);
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    menu.classList.remove('hidden');
                    requestAnimationFrame(() => {
                        menu.style.transform = 'translateY(0%)';
                    });
                    openIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            }
            function closeMobileMenu() {
                const menu = document.getElementById('mobileMenu');
                const openIcon = document.getElementById('menuIconOpen');
                const closeIcon = document.getElementById('menuIconClose');
                menu.style.transform = 'translateY(-100%)';
                setTimeout(() => { menu.classList.add('hidden'); }, 300);
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
            function toggleDark() {
                var html = document.documentElement;
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }
        </script>

        <main>
        <!-- ===== HERO SECTION ===== -->
        <section id="hero-section" class="snap-section flex items-center bg-[#FFFFFF] dark:bg-[#0a0a0a] relative overflow-hidden"
            style="scroll-snap-align:start">
            <!-- Background image collage (desktop only) -->
            @php
                $bgImages = [];
                if ($h && $h->main_image_url) $bgImages[] = $h->main_image_url;
                if ($h && $h->right_image_url) $bgImages[] = $h->right_image_url;
                foreach ($portfolios->take(4) as $p) { if ($p->image_url) $bgImages[] = $p->image_url; }
                foreach ($stories->take(4) as $s) { if ($s->image_url) $bgImages[] = $s->image_url; }
            @endphp
            @if (count($bgImages))
            <div class="hidden lg:block absolute inset-0 pointer-events-none overflow-hidden">
                @for ($i = 0; $i < 100; $i++)
                @php
                    $img = $bgImages[array_rand($bgImages)];
                    $x = rand(0, 92);
                    $y = rand(0, 92);
                    $w = rand(60, 120);
                    $imgH = round($w * rand(65, 80) / 100);
                    $rot = rand(-15, 15);
                    $op = rand(5, 12) / 100;
                @endphp
                <img src="{{ $img }}" alt="" loading="lazy"
                    style="position:absolute;left:{{ $x }}%;top:{{ $y }}%;width:{{ $w }}px;height:{{ $imgH }}px;object-fit:cover;border-radius:2px;--bg-op:{{ $op }};--rot:{{ $rot }}deg;--anim-delay:{{ $i * 0.04 }}s"
                    class="bg-img-anim">
                @endfor
            </div>
            @endif
            <div
                class="max-w-6xl mx-auto px-6 lg:px-10 w-full flex flex-col lg:flex-row items-start justify-between gap-6 lg:gap-10 py-6 lg:py-20 relative">
                <!-- Center Image (Mobile order 1, Desktop order 2) -->
                <div class="anim-center relative max-w-full shrink-0 z-[1] order-1 lg:order-2 w-full lg:w-[380px] h-[200px] lg:h-[320px]">
                    <div class="w-full h-full rounded-sm overflow-hidden"
                        style="background:{{ $h && $h->main_image ? 'none' : 'linear-gradient(135deg,#f5e6d3,#e8d5c0)' }}">
                        @if ($h && $h->main_image)
                            <img src="{{ $mainImageInline ?: $h->main_image_url }}" alt="Hero" width="760" height="440" fetchpriority="high"
                                class="w-full h-full object-cover">
                        @else
                            <svg class="w-full h-full text-[#1b1b18]/15 dark:text-white/10 p-8" viewBox="0 0 100 120"
                                fill="none">
                                <rect x="25" y="55" width="50" height="8" rx="2" fill="currentColor" />
                                <rect x="30" y="63" width="40" height="40" rx="2" fill="currentColor" opacity="0.6" />
                                <rect x="22" y="35" width="56" height="6" rx="2" fill="currentColor" />
                                <rect x="25" y="25" width="4" height="12" rx="1" fill="currentColor" />
                                <rect x="71" y="25" width="4" height="12" rx="1" fill="currentColor" />
                                <rect x="20" y="20" width="60" height="5" rx="2" fill="currentColor" opacity="0.4" />
                                <circle cx="36" cy="48" r="4" fill="currentColor" opacity="0.3" />
                                <rect x="56" y="44" width="8" height="10" rx="1" fill="currentColor" opacity="0.3" />
                            </svg>
                        @endif
                    </div>
                </div>
                <!-- Left Column (Mobile order 2, Desktop order 1) -->
                <div class="anim-left flex flex-col items-center lg:items-start z-[2] lg:mt-10 order-2 lg:order-1 max-w-full lg:max-w-[280px] text-center lg:text-start">
                    <p data-translate-key="Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today."
                        class="text-xs md:text-sm leading-relaxed text-[#333] dark:text-[#A1A09A] mb-3 lg:mb-8 max-w-full lg:max-w-[220px]">
                        {{ __("Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.") }}
                    </p>
                    <h1 data-translate-html="Interior<br>Design"
                        class="font-['Playfair_Display',serif] text-3xl sm:text-6xl lg:text-7xl font-bold leading-[1.05] text-[#000] dark:text-[#EDEDEC] tracking-tight mb-4 lg:mb-0">
                        {!! __("Interior<br>Design") !!}
                    </h1>
                    <a href="#portfolio" data-translate-key="View Project"
                        class="hidden lg:inline-block px-6 py-2.5 border border-[#333] dark:border-[#62605b] text-[10px] font-semibold text-[#333] dark:text-[#EDEDEC] no-underline uppercase tracking-[1.5px] transition-all duration-300 bg-transparent hover:bg-[#333] dark:hover:bg-[#EDEDEC] hover:text-white dark:hover:text-[#1b1b18] mt-4">
                        {{ __("View Project") }}
                    </a>
                </div>
                <!-- Right Column (Mobile order 3, Desktop order 3) -->
                <div class="anim-right flex flex-col items-center lg:items-start max-w-full lg:max-w-[320px] lg:mt-5 order-3 w-full text-center lg:text-start">
                    <span data-translate-key="Our Recent Work"
                        class="text-[11px] font-semibold text-[#333] dark:text-[#A1A09A] mb-2 lg:mb-3 tracking-[0.5px]">{{ __("Our Recent Work") }}</span>
                    <h2 data-translate-key="We Will Make These Unique Tastes Of Yours A Design Reality!"
                        class="font-['Playfair_Display',serif] text-lg sm:text-2xl font-bold leading-[1.4] text-[#000] dark:text-[#EDEDEC] mb-3 lg:mb-5">
                        {{ __("We Will Make These Unique Tastes Of Yours A Design Reality!") }}</h2>
                    <a href="#portfolio" data-translate-key="View Project"
                        class="lg:hidden inline-block px-6 py-2.5 border border-[#333] dark:border-[#62605b] text-[10px] font-semibold text-[#333] dark:text-[#EDEDEC] no-underline uppercase tracking-[1.5px] transition-all duration-300 bg-transparent hover:bg-[#333] dark:hover:bg-[#EDEDEC] hover:text-white dark:hover:text-[#1b1b18] mt-3 mb-3">
                        {{ __("View Project") }}
                    </a>
                    <div class="w-full max-w-full h-[180px] lg:h-[240px]">
                        <div class="w-full h-full rounded-sm overflow-hidden"
                            style="background:{{ $h && $h->right_image ? 'none' : 'linear-gradient(135deg,#e8f0fe,#d4e4f7)' }}">
                            @if ($h && $h->right_image)
                                <img src="{{ $h->right_image_url }}" alt="Work" width="640" height="360" loading="lazy"
                                    class="w-full h-full object-cover">
                            @else
                                <svg class="w-full h-full text-[#1b1b18]/15 dark:text-white/10 p-8" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <path d="m21 15-5-5L5 21" />
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== ABOUT ME ===== -->
        <section id="about" class="snap-section flex items-center bg-[#FFFFFF] dark:bg-[#0a0a0a] lg:pb-5"
            style="scroll-snap-align:start">
            <div class="max-w-4xl mx-auto px-6 lg:px-10 w-full py-12 md:py-20">
                <h1 data-translate-key="About Me"
                    class="font-['Playfair_Display',serif] text-3xl md:text-5xl lg:text-6xl font-bold text-[#111111] dark:text-[#EDEDEC] mb-6 md:mb-10">
                    {{ __("About Me") }}
                </h1>

                <div class="space-y-6 text-[#555] dark:text-[#A1A09A] text-sm md:text-[15px] leading-[1.8] max-w-3xl">
                    <p data-translate-key="Al-Aqsa University — Interior Design Graduate"
                        class="text-base font-semibold text-[#111111] dark:text-[#EDEDEC]">
                        {{ __("Al-Aqsa University — Interior Design Graduate") }}</p>
                    <p
                        data-translate-key="I am an interior design engineer, a proud graduate of Al-Aqsa University in Gaza. My journey was far from ordinary. Studying and working in Gaza means navigating a reality shaped by blockade, instability, and limited resources. Every material we needed was scarce, every project carried uncertainty, and every deadline was shadowed by circumstances beyond our control.">
                        {{ __("I am an interior design engineer, a proud graduate of Al-Aqsa University in Gaza. My journey was far from ordinary. Studying and working in Gaza means navigating a reality shaped by blockade, instability, and limited resources. Every material we needed was scarce, every project carried uncertainty, and every deadline was shadowed by circumstances beyond our control.") }}
                    </p>
                    <p data-translate-key="Yet, we persisted."
                        class="text-base font-semibold text-[#111111] dark:text-[#EDEDEC]">
                        {{ __("Yet, we persisted.") }}</p>
                    <p
                        data-translate-key="Interior design is more than arranging furniture or choosing colors. It is the art of transforming spaces into experiences — understanding how light, texture, and layout affect human emotion and daily life. We learned to design under pressure, to innovate with what was available, and to create beauty from constraint. That is the true skill of a Gazan designer: making the impossible feel intentional.">
                        {{ __("Interior design is more than arranging furniture or choosing colors. It is the art of transforming spaces into experiences — understanding how light, texture, and layout affect human emotion and daily life. We learned to design under pressure, to innovate with what was available, and to create beauty from constraint. That is the true skill of a Gazan designer: making the impossible feel intentional.") }}
                    </p>
                    <p
                        data-translate-key="Despite the hardship, we succeeded. We graduated. We built portfolios. We proved that creativity thrives even in the most difficult conditions. Gaza did not break our ambition — it sharpened it.">
                        {{ __("Despite the hardship, we succeeded. We graduated. We built portfolios. We proved that creativity thrives even in the most difficult conditions. Gaza did not break our ambition — it sharpened it.") }}
                    </p>
                </div>

                <div
                    class="mt-10 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A] flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8">
                    <div>
                        <p data-translate-key="Title"
                            class="text-xs font-semibold text-[#A0A0A0] dark:text-[#A1A09A] uppercase tracking-[1px]">
                            {{ __("Title") }}</p>
                        <p data-translate-key="Interior Design Engineer | Al-Aqsa University Graduate"
                            class="text-sm text-[#111111] dark:text-[#EDEDEC] mt-0.5">
                            {{ __("Interior Design Engineer | Al-Aqsa University Graduate") }}</p>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-[#e3e3e0] dark:bg-[#3E3E3A]"></div>
                    <div>
                        <p data-translate-key="Specialty"
                            class="text-xs font-semibold text-[#A0A0A0] dark:text-[#A1A09A] uppercase tracking-[1px]">
                            {{ __("Specialty") }}</p>
                        <p data-translate-key="Interior Design under constraint & adaptive spatial design"
                            class="text-sm text-[#111111] dark:text-[#EDEDEC] mt-0.5">
                            {{ __("Interior Design under constraint & adaptive spatial design") }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== PORTFOLIO ===== -->
        <section id="portfolio"
            class="snap-section w-full max-w-6xl mx-auto px-6 lg:px-10 py-10 md:py-14 flex flex-col justify-start pt-20 lg:pt-28"
            style="scroll-snap-align:start;min-height:80dvh">
            <div class="mb-10">
                <h2 data-translate-key="Portfolio"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Portfolio") }}</h2>
                <p data-translate-key="Makeover projects and interior designs by Lina"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Makeover projects and interior designs by Lina") }}</p>
            </div>
            <div class="grid gap-3" style="grid-template-columns:repeat(auto-fill,minmax(160px,1fr))">
                @forelse ($portfolios as $portfolio)
                    <div class="rounded-[3px] overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] {{ $loop->iteration > 4 ? 'hidden md:block' : '' }}">
                        <div class="aspect-[4/3] relative flex items-center justify-center overflow-hidden"
                            style="background:linear-gradient(135deg,#fdf6f0,#f5e6d3)">
                            @if ($portfolio->image_path)
                                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" loading="lazy" class="w-full h-full object-cover">
                            @else
                                <svg class="w-12 h-12 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
                                </svg>
                            @endif
                        </div>
                        <div class="p-3 max-w-full overflow-hidden">
                            <h3 class="font-medium text-xs text-[#1b1b18] dark:text-[#EDEDEC] break-words">{{ $portfolio->title }}</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-[11px] mt-0.5 leading-relaxed break-words overflow-hidden max-h-[3.3em]">{{ $portfolio->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-[#706f6c] text-sm">{{ __('No portfolio items yet.') }}</p>
                @endforelse
            </div>
            @if (count($portfolios) > 4)
                <a href="{{ route('portfolios') }}"
                    class="md:hidden mt-4 mx-auto w-fit px-5 py-2 rounded-[3px] text-xs font-medium text-white transition-all duration-300 block text-center"
                    style="background:#c42802"
                    data-translate-key="View All" onclick="window.location.href='{{ route('portfolios') }}'">{{ __("View All") }}</a>
            @endif
        </section>

        <!-- ===== STORIES ===== -->
        <section id="stories"
            class="snap-section w-full max-w-6xl mx-auto px-6 lg:px-10 py-10 md:py-14 flex flex-col justify-start pt-20 lg:pt-28"
            style="scroll-snap-align:start;min-height:80dvh">
            <div class="mb-10">
                <h2 data-translate-key="Stories"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Stories") }}</h2>
                <p data-translate-key="Behind the scenes & daily design moments"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Behind the scenes & daily design moments") }}</p>
            </div>
            <div class="story-card-row flex gap-4 overflow-x-auto pb-4 md:pb-4" style="scrollbar-width:none;-ms-overflow-style:none">
                <style>
                    .story-card-row::-webkit-scrollbar {
                        display: none
                    }
                </style>
                @forelse ($stories->take(4) as $story)
                    <div class="story-card shrink-0 w-48 rounded-[3px] overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A] {{ $loop->iteration > 4 ? 'hidden md:block' : '' }}"
                        onclick="openWelcomeStory(this)"
                        data-title="{{ $story->title }}"
                        data-content="{{ $story->content }}"
                        data-bg="{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}"
                        data-type="{{ $story->type }}"
                        data-image="{{ $story->image_url }}">
                        <div class="h-32 flex items-center justify-center"
                            style="background:{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}">
                            @if ($story->image_path)
                                <img src="{{ $story->image_url }}" alt="{{ $story->title }}" loading="lazy" class="w-full h-full object-cover">
                            @else
                                <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    @if ($story->type === 'text')
                                        <path d="M12 20h9" /><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                                    @elseif ($story->type === 'mixed')
                                        <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" /><circle cx="12" cy="13" r="3" />
                                    @else
                                        <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
                                    @endif
                                </svg>
                            @endif
                        </div>
                        <div class="p-3 max-w-full overflow-hidden">
                            <h3 class="font-medium text-xs text-[#1b1b18] dark:text-[#EDEDEC] break-words">{{ $story->title }}</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-[11px] mt-0.5 break-words">{{ Str::limit($story->content, 60) }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-[#706f6c] text-sm">{{ __('No stories yet.') }}</p>
                @endforelse
            </div>
            @if (count($stories) > 4)
                <a href="{{ route('stories') }}"
                    class="md:hidden mt-4 mx-auto w-fit px-5 py-2 rounded-[3px] text-xs font-medium text-white transition-all duration-300 block text-center"
                    style="background:#c42802"
                    data-translate-key="View All" onclick="window.location.href='{{ route('stories') }}'">{{ __("View All") }}</a>
            @endif
        </section>

        <!-- ===== STORY MODAL ===== -->
        <div id="storyModal" class="fixed inset-0 z-[1000] flex items-center justify-center"
            style="opacity:0;pointer-events:none;transition:opacity .35s ease;background:rgba(0,0,0,.92)"
            onclick="closeWelcomeStory(event)">
            <div class="w-full max-w-lg mx-4 rounded-xl overflow-hidden relative" onclick="event.stopPropagation()"
                style="aspect-ratio:9/16;box-shadow:inset 0 0 0 1px rgba(255,255,255,.1)">
                <button
                    class="absolute top-4 end-4 z-10 w-10 h-10 rounded-full border-none flex items-center justify-center text-white text-xl cursor-pointer"
                    style="background:rgba(255,255,255,.15);backdrop-filter:blur(8px)"
                    onclick="closeWelcomeStory()">&times;</button>
                <div id="storyModalContent"
                    class="w-full h-full flex flex-col items-center justify-center p-8 text-center"></div>
            </div>
        </div>

        <!-- ===== TIPS & INSIGHTS ===== -->
        <section id="tips"
            class="snap-section w-full max-w-6xl mx-auto px-6 lg:px-10 py-10 md:py-14 flex flex-col justify-start pt-20 lg:pt-28"
            style="scroll-snap-align:start;min-height:80dvh">
            <div class="mb-10">
                <h2 data-translate-key="Tips & Insights"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Tips & Insights") }}</h2>
                <p data-translate-key="Short design ideas and inspiration"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Short design ideas and inspiration") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
                @forelse ($tips as $tip)
                    <div class="rounded-[3px] p-3 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden max-w-full {{ $loop->iteration > 4 ? 'hidden md:block' : '' }}">
                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-medium text-white mb-2"
                            style="background:#f53003">{{ $tip->category }}</span>
                        <h3 class="font-medium text-xs mb-1 text-[#1b1b18] dark:text-[#EDEDEC] break-words">{{ $tip->title }}</h3>
                        <p class="text-[#706f6c] dark:text-[#A1A09A] text-[11px] leading-relaxed break-words max-h-[3.3em] overflow-hidden">{{ $tip->content }}</p>
                    </div>
                @empty
                    <p class="text-[#706f6c] text-sm">{{ __('No tips yet.') }}</p>
                @endforelse
            </div>
            @if (count($tips) > 4)
                <a href="{{ route('tips') }}"
                    class="md:hidden mt-4 mx-auto w-fit px-5 py-2 rounded-[3px] text-xs font-medium text-white transition-all duration-300 block text-center"
                    style="background:#c42802"
                    data-translate-key="View All" onclick="window.location.href='{{ route('tips') }}'">{{ __("View All") }}</a>
            @endif
        </section>

        </main>

        <!-- ===== FOOTER ===== -->
        <footer id="contact" class="snap-section w-full border-t border-[#e3e3e0] dark:border-[#3E3E3A] flex flex-col justify-end" style="scroll-snap-align:start">
            <div class="max-w-6xl mx-auto px-6 lg:px-10 py-12 lg:py-16 w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">
                    <!-- Brand -->
                    <div>
                        <a href="/"
                            class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                            <?php $logoPath = \App\Models\Setting::get('logo'); ?>
                            @if ($logoPath)
                                <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" class="h-6 w-auto">
                            @else
                                <span class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold" style="font-family:Georgia,serif;border-radius:3px">L</span>
                            @endif
                            <span data-translate-key="Lina">{{ __("Lina") }}</span>
                        </a>
                        <p data-translate-key="Interior design & decoration studio crafting elegant, functional spaces that tell your unique story."
                            class="text-[#706f6c] dark:text-[#A1A09A] text-sm leading-relaxed max-w-xs">
                            {{ __("Interior design & decoration studio crafting elegant, functional spaces that tell your unique story.") }}
                        </p>
                        <div class="flex items-center gap-3 mt-5">
                            <?php $fb = \App\Models\Setting::get('facebook_url'); if ($fb): ?>
                            <a href="{{ $fb }}" target="_blank" aria-label="Facebook"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22 12C22 6.5 17.5 2 12 2S2 6.5 2 12C2 17 5.5 21.1 10.1 21.9V14.9H7.7V12H10.1V9.8C10.1 7.3 11.7 5.9 14 5.9C15.1 5.9 16.2 6.1 16.2 6.1V8.6H15C13.8 8.6 13.4 9.4 13.4 10.2V12H16.1L15.6 14.9H13.5V22C18.5 21.1 22 17 22 12Z" />
                                </svg>
                            </a>
                            <?php endif; ?>
                            <?php $ig = \App\Models\Setting::get('instagram_url'); if ($ig): ?>
                            <a href="{{ $ig }}" target="_blank" aria-label="Instagram"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M7.8 2H16.2C19.4 2 22 4.6 22 7.8V16.2C22 19.4 19.4 22 16.2 22H7.8C4.6 22 2 19.4 2 16.2V7.8C2 4.6 4.6 2 7.8 2ZM7.6 4C5.6 4 4 5.6 4 7.6V16.4C4 18.4 5.6 20 7.6 20H16.4C18.4 20 20 18.4 20 16.4V7.6C20 5.6 18.4 4 16.4 4H7.6ZM17.3 5.5C17.9 5.5 18.3 5.9 18.3 6.5C18.3 7.1 17.9 7.5 17.3 7.5C16.7 7.5 16.3 7.1 16.3 6.5C16.3 5.9 16.7 5.5 17.3 5.5ZM12 7C15.3 7 18 9.7 18 13C18 16.3 15.3 19 12 19C8.7 19 6 16.3 6 13C6 9.7 8.7 7 12 7ZM12 9C9.8 9 8 10.8 8 13C8 15.2 9.8 17 12 17C14.2 17 16 15.2 16 13C16 10.8 14.2 9 12 9Z" />
                                </svg>
                            </a>
                            <?php endif; ?>
                            <?php $tw = \App\Models\Setting::get('twitter_url'); if ($tw): ?>
                            <a href="{{ $tw }}" target="_blank" aria-label="Twitter"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M23.5 6.2c-.8.4-1.7.6-2.6.7.9-.6 1.7-1.4 2.1-2.5-.9.5-1.8.9-2.8 1.1-.8-.9-2-1.5-3.3-1.5-2.5 0-4.5 2-4.5 4.5 0 .4 0 .7.1 1.1C7.8 9.3 4.7 7.6 2.6 5.1c-.4.7-.6 1.4-.6 2.3 0 1.6.8 2.9 2 3.7-.7 0-1.4-.2-2-.6v.1c0 2.2 1.6 4 3.6 4.4-.4.1-.8.2-1.2.2-.3 0-.6 0-.9-.1.6 1.8 2.2 3.1 4.2 3.1-1.5 1.2-3.5 1.9-5.6 1.9-.4 0-.7 0-1-.1 2 1.3 4.4 2 6.9 2 8.3 0 12.8-6.9 12.8-12.8 0-.2 0-.4 0-.6.9-.6 1.7-1.4 2.3-2.3z" />
                                </svg>
                            </a>
                            <?php endif; ?>
                            <?php $li = \App\Models\Setting::get('linkedin_url'); if ($li): ?>
                            <a href="{{ $li }}" target="_blank" aria-label="LinkedIn"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M19.6 2H4.4C3.1 2 2 3.1 2 4.4v15.2C2 20.9 3.1 22 4.4 22h15.2c1.3 0 2.4-1.1 2.4-2.4V4.4C22 3.1 20.9 2 19.6 2zM8.4 18.4H5.6V9.8h2.8v8.6zM7 8.6c-.9 0-1.6-.7-1.6-1.6S6.1 5.4 7 5.4s1.6.7 1.6 1.6S7.9 8.6 7 8.6zm11.4 9.8h-2.8v-4.2c0-1 0-2.3-1.4-2.3s-1.6 1.1-1.6 2.2v4.3H9.8V9.8h2.7v1.2h.1c.4-.7 1.3-1.4 2.6-1.4 2.8 0 3.3 1.8 3.3 4.2v4.6z" />
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 data-translate-key="Quick Links"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">
                            {{ __("Quick Links") }}</h4>
                        <ul class="space-y-2.5">
                            <li><a href="#about" data-translate-key="About Me"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("About Me") }}</a>
                            </li>
                            <li><a href="#hero-section" data-translate-key="Hero"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Hero") }}</a>
                            </li>
                            <li><a href="#portfolio" data-translate-key="Portfolio"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Portfolio") }}</a>
                            </li>
                            <li><a href="#stories" data-translate-key="Stories"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Stories") }}</a>
                            </li>
                            <li><a href="/reels" data-translate-key="Reels"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Reels") }}</a>
                            </li>
                            <li><a href="#tips" data-translate-key="Tips & Insights"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Tips & Insights") }}</a>
                            </li>
                            <li><a href="/login" data-translate-key="Client Portal"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Client Portal") }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div>
                        <h4 data-translate-key="Services"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ __("Services") }}
                        </h4>
                        <ul class="space-y-2.5">
                            @for ($i = 1; $i <= 5; $i++)
                                @php $svc = \App\Models\Setting::get('service_' . $i); @endphp
                                @if ($svc)
                                <li><span class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $svc }}</span></li>
                                @endif
                            @endfor
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 data-translate-key="Contact"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ __("Contact") }}
                        </h4>
                        <ul class="space-y-3">
                            <?php $addr = \App\Models\Setting::get('address'); if ($addr): ?>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <span class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $addr }}</span>
                            </li>
                            <?php endif; ?>
                            <?php $email = \App\Models\Setting::get('email'); if ($email): ?>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                                <a href="mailto:{{ $email }}" class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ $email }}</a>
                            </li>
                            <?php endif; ?>
                            <?php $phone = \App\Models\Setting::get('phone'); if ($phone): ?>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                <a href="tel:{{ $phone }}" class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ $phone }}</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div
                    class="mt-12 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A] flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p data-translate-key="© :year Lina. All rights reserved."
                        class="text-xs text-[#706f6c] dark:text-[#A1A09A]">
                        {{ __('© :year Lina. All rights reserved.', ['year' => date('Y')]) }}</p>
                    <div class="flex items-center gap-4 text-xs text-[#706f6c] dark:text-[#A1A09A]">
                        <a href="#" data-translate-key="Privacy Policy"
                            class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Privacy Policy") }}</a>
                        <span class="w-px h-3 bg-[#e3e3e0] dark:bg-[#3E3E3A]"></span>
                        <a href="#" data-translate-key="Terms of Service"
                            class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Terms of Service") }}</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- ===== Bottom Navigation Island (outside snap-container!) ===== -->
    <div id="navIsland" class="fixed bottom-4 left-1/2 -translate-x-1/2 z-50 md:hidden flex items-center gap-1 px-3 py-2 rounded-full shadow-lg border border-[#e3e3e0] dark:border-[#3E3E3A] transition-all duration-500 max-w-[92vw] overflow-x-auto whitespace-nowrap"
        style="background:rgba(253,253,252,.25);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px)">
        <button data-target="hero-section" data-translate-key="Hero" class="island-item px-1.5 py-1 text-[11px] font-medium text-[#1b1b18] dark:text-[#EDEDEC] rounded-full transition-all duration-300">{{ __("Hero") }}</button>
        <button data-target="about" data-translate-key="About" class="island-item px-1.5 py-1 text-[11px] font-medium text-[#706f6c] dark:text-[#A1A09A] rounded-full transition-all duration-300">{{ __("About") }}</button>
        <button data-target="portfolio" data-translate-key="Portfolio" class="island-item px-1.5 py-1 text-[11px] font-medium text-[#706f6c] dark:text-[#A1A09A] rounded-full transition-all duration-300">{{ __("Portfolio") }}</button>
        <button data-target="stories" data-translate-key="Stories" class="island-item px-1.5 py-1 text-[11px] font-medium text-[#706f6c] dark:text-[#A1A09A] rounded-full transition-all duration-300">{{ __("Stories") }}</button>
        <a href="/reels" data-translate-key="Reels" class="px-1.5 py-1 text-[11px] font-medium text-[#706f6c] dark:text-[#A1A09A] rounded-full transition-all duration-300 hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28]">{{ __("Reels") }}</a>
        <button data-target="tips" data-translate-key="Tips" class="island-item px-1.5 py-1 text-[11px] font-medium text-[#706f6c] dark:text-[#A1A09A] rounded-full transition-all duration-300">{{ __("Tips") }}</button>
        <button data-target="contact" data-translate-key="Contact" class="island-item px-1.5 py-1 text-[11px] font-medium text-[#706f6c] dark:text-[#A1A09A] rounded-full transition-all duration-300">{{ __("Contact") }}</button>
    </div>

    <style>
        /* Page-turn card effect */
        .island-item.active {
            background: #c42802 !important;
            color: white !important;
        }
        .island-item:hover:not(.active) {
            background: #f0f0ef;
        }
        html.dark .island-item:hover:not(.active) {
            background: #2a2a28;
        }
        html.dark #navIsland {
            background: rgba(22,22,21,.88) !important;
        }
    </style>

    <script>
        function openWelcomeStory(el) {
            const title = el.getAttribute('data-title');
            const content = el.getAttribute('data-content');
            const bg = el.getAttribute('data-bg');
            const type = el.getAttribute('data-type');
            const image = el.getAttribute('data-image');
            const modal = document.getElementById('storyModal');
            const inner = document.getElementById('storyModalContent');
            if (type === 'text') {
                inner.innerHTML = `
            <svg class="w-10 h-10 mx-auto mb-4 opacity-60" style="color:#f53003" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            <p class="text-2xl font-medium text-white leading-relaxed">${content}</p>
        `;
            } else if (image) {
                inner.innerHTML = `<img src="${image}" alt="${title}" class="w-full h-full object-cover">`;
            } else {
                inner.innerHTML = `
            <svg class="w-16 h-16 mx-auto mb-4 opacity-50 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
            <p class="text-lg text-white/80">${content}</p>
        `;
            }
            inner.style.background = bg;
            modal.style.opacity = '1';
            modal.style.pointerEvents = 'auto';
            document.body.style.overflow = 'hidden';
        }
        function closeWelcomeStory(e) {
            if (e && e.target !== e.currentTarget) return;
            const modal = document.getElementById('storyModal');
            modal.style.opacity = '0';
            modal.style.pointerEvents = 'none';
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeWelcomeStory();
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Nav island + anchor: book-style horizontal page turn on desktop
            const isDesktop = window.innerWidth > 768;
            const sectionIds = ['hero-section', 'about', 'portfolio', 'stories', 'tips', 'contact'];
            let currentIndex = 0;
            let isAnimating = false;
            const items = {};

            sectionIds.forEach((id, i) => {
                items[id] = document.querySelector(`.island-item[data-target="${id}"]`);
            });

            function goToSection(index) {
                if (index < 0 || index >= sectionIds.length) return;
                if (index === currentIndex || isAnimating) return;

                isAnimating = true;
                const prevIndex = currentIndex;
                currentIndex = index;

                if (isDesktop) {
                    const prev = document.getElementById(sectionIds[prevIndex]);
                    const next = document.getElementById(sectionIds[currentIndex]);

                    // Remove all classes from all sections
                    sectionIds.forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.className = el.className
                            .replace(/ ?page-(active|enter-right|enter-left|exit-left|exit-right)/g, '');
                    });

                    // Trigger animation based on direction
                    const isRtl = document.documentElement.dir === 'rtl';
                    if (index > prevIndex) {
                        // Going forward
                        if (isRtl) {
                            if (prev) prev.classList.add('page-exit-right');
                            if (next) next.classList.add('page-enter-left');
                        } else {
                            if (prev) prev.classList.add('page-exit-left');
                            if (next) next.classList.add('page-enter-right');
                        }
                    } else {
                        // Going backward
                        if (isRtl) {
                            if (prev) prev.classList.add('page-exit-left');
                            if (next) next.classList.add('page-enter-right');
                        } else {
                            if (prev) prev.classList.add('page-exit-right');
                            if (next) next.classList.add('page-enter-left');
                        }
                    }

                    // After animation, set active state
                    setTimeout(() => {
                        sectionIds.forEach(id => {
                            const el = document.getElementById(id);
                            if (el) el.className = el.className
                                .replace(/ ?page-(active|enter-right|enter-left|exit-left|exit-right)/g, '');
                        });
                        if (next) next.classList.add('page-active');
                        isAnimating = false;
                    }, 650);
                } else {
                    const el = document.getElementById(sectionIds[index]);
                    if (el) el.scrollIntoView({ behavior: 'smooth' });
                    setTimeout(() => { isAnimating = false; }, 600);
                }

                // Update island active
                Object.values(items).forEach(i => i && i.classList.remove('active'));
                if (items[sectionIds[index]]) items[sectionIds[index]].classList.add('active');
            }

            // Island click
            document.querySelectorAll('.island-item').forEach(item => {
                item.addEventListener('click', function () {
                    const id = this.getAttribute('data-target');
                    const idx = sectionIds.indexOf(id);
                    if (idx >= 0) goToSection(idx);
                });
            });

            // Anchor links → page turn on desktop, smooth scroll on mobile
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    const id = href.substring(1);
                    const idx = sectionIds.indexOf(id);
                    if (idx >= 0) {
                        e.preventDefault();
                        goToSection(idx);
                    } else if (id) {
                        // Non-section anchors (e.g. #contact, #privacy)
                        e.preventDefault();
                        const el = document.getElementById(id);
                        if (el) el.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Init: set first section active
            if (isDesktop) {
                sectionIds.forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) el.className = el.className
                        .replace(/ ?page-(active|enter-right|enter-left|exit-left|exit-right)/g, '');
                });
                const first = document.getElementById(sectionIds[0]);
                if (first) first.classList.add('page-active');
                if (items[sectionIds[0]]) items[sectionIds[0]].classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    </script>

    <script>
        // Dark mode (replaces app.js dependency)
        (function () {
            var key = 'theme', html = document.documentElement;
            function apply(t) {
                if (t === 'dark') html.classList.add('dark'); else html.classList.remove('dark');
            }
            var saved = localStorage.getItem(key);
            if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) apply('dark');
            window.toggleDark = function () {
                apply(html.classList.contains('dark') ? 'light' : 'dark');
                localStorage.setItem(key, html.classList.contains('dark') ? 'dark' : 'light');
            };
        })();

        // Embed Arabic translations dictionary
        window.translations = {!! file_exists(lang_path('ar.json')) ? file_get_contents(lang_path('ar.json')) : '{}' !!};

        function switchLanguage(lang) {
            // Update document dir and lang attributes
            document.documentElement.lang = lang;
            if (lang === 'ar') {
                document.documentElement.dir = 'rtl';
                document.documentElement.classList.add('rtl');
            } else {
                document.documentElement.dir = 'ltr';
                document.documentElement.classList.remove('rtl');
            }

            // Translate standard text keys
            document.querySelectorAll('[data-translate-key]').forEach(el => {
                const key = el.getAttribute('data-translate-key');
                let translation = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
                if (translation.includes(':year')) {
                    translation = translation.replace(':year', new Date().getFullYear());
                }
                el.textContent = translation;
            });

            // Translate HTML keys (innerHTML)
            document.querySelectorAll('[data-translate-html]').forEach(el => {
                const key = el.getAttribute('data-translate-html');
                const translation = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
                el.innerHTML = translation;
            });

            // Translate attributes
            document.querySelectorAll('[data-translate-attrs]').forEach(el => {
                el.getAttribute('data-translate-attrs').split(',').forEach(attrPair => {
                    const [attrName, engKey] = attrPair.split(':');
                    const translation = (lang === 'ar' && window.translations && window.translations[engKey]) ? window.translations[engKey] : engKey;
                    el.setAttribute(attrName, translation);
                });
            });

            // Update language switcher buttons text
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.textContent = lang === 'ar' ? 'AR' : 'EN';
            });

            // Persist to localStorage and sync to session
            localStorage.setItem('lang', lang);
            fetch(`/lang/${lang}`).catch(() => { });
        }

        // Apply on DOMContentLoaded if localStorage has a different lang than server
        document.addEventListener('DOMContentLoaded', () => {
            const serverLang = document.documentElement.getAttribute('lang') || 'en';
            const savedLang = localStorage.getItem('lang');
            // If saved lang differs from server-rendered lang, apply client-side
            if (savedLang && savedLang !== serverLang) {
                switchLanguage(savedLang);
            }
        });
    </script>
</body>

</html>
