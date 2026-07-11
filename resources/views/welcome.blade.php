<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?: 'en' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>{{ __("Lina - Interior Design & Decoration") }}</title>
    <meta name="description" content="{{ __("Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.") }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/playfair-display/files/playfair-display-latin-700-normal.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin href="https://fonts.bunny.net/instrument-sans/files/instrument-sans-latin-400-normal.woff2">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|playfair-display:400,700&display=swap"
        rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] m-0" style="overflow:hidden">
    <div class="snap-container"
        style="overflow-y:scroll;scroll-snap-type:y mandatory;scrollbar-width:none;-ms-overflow-style:none">
        <style>
            html.dark nav {
                background: rgba(10, 10, 10, .85) !important;
            }
            html.dark .mobile-menu {
                background: rgba(10, 10, 10, .98) !important;
            }
            .snap-container::-webkit-scrollbar {
                display: none
            }
            .snap-container { height: 100vh; height: 100dvh; scroll-padding-top: 56px; }
            .snap-section { min-height: 100vh; min-height: 100dvh; }
        </style>
        <nav class="fixed top-0 left-0 right-0 z-50 h-14 flex items-center justify-center px-5 border-b border-[#e3e3e0] dark:border-[#3E3E3A]"
            style="background:rgba(253,253,252,.85);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px)">
            <div class="flex items-center gap-4 w-full max-w-6xl px-0 lg:px-8">
                <a href="#hero-section"
                    class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC] mr-auto">
                    <span
                        class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold"
                        style="font-family:Georgia,serif;border-radius:3px">L</span>
                    <span data-translate-key="Lina">{{ __("Lina") }}</span>
                </a>
                <div class="hidden md:flex items-center gap-6 text-sm flex-1 justify-center">
                    <a href="#hero-section" data-translate-key="Hero"
                        class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Hero") }}</a>
                    <a href="#about" data-translate-key="About Me"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("About Me") }}</a>
                    <a href="#portfolio" data-translate-key="Portfolio"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Portfolio") }}</a>
                    <a href="#stories" data-translate-key="Stories"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Stories") }}</a>
                    <a href="/reels" data-translate-key="Reels"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Reels") }}</a>
                    <a href="#tips" data-translate-key="Tips & Insights"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Tips & Insights") }}</a>
                </div>
                <div class="hidden md:flex items-center gap-3 text-sm">
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
                    <a href="/login" data-translate-key="Login"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Login") }}</a>
                    <a href="/register" data-translate-key="Register"
                        class="px-3.5 py-1.5 rounded-sm text-xs font-medium text-white hover:opacity-90 transition-opacity shadow-[0_0_0_1px_rgba(26,26,0,0.08)] bg-[#c42802] dark:bg-[#FF4433]">{{ __("Register") }}</a>
                </div>
                <button onclick="toggleMobileMenu()" class="md:hidden flex items-center justify-center w-8 h-8 rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-all" aria-label="Toggle menu">
                    <svg id="menuIconOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="menuIconClose" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <div id="mobileMenu" class="mobile-menu fixed top-14 left-0 right-0 z-40 hidden flex-col px-6 pb-8 pt-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] text-[15px]"
            style="background:rgba(253,253,252,.98);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);transform:translateY(-100%);transition:transform .3s ease">
            <a href="#hero-section" data-translate-key="Hero" class="block w-full py-3 px-4 rounded-lg text-[#1b1b18] dark:text-[#EDEDEC] font-medium hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Hero") }}</a>
            <a href="#about" data-translate-key="About Me" class="block w-full py-3 px-4 rounded-lg text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("About Me") }}</a>
            <a href="#portfolio" data-translate-key="Portfolio" class="block w-full py-3 px-4 rounded-lg text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Portfolio") }}</a>
            <a href="#stories" data-translate-key="Stories" class="block w-full py-3 px-4 rounded-lg text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Stories") }}</a>
            <a href="/reels" data-translate-key="Reels" class="block w-full py-3 px-4 rounded-lg text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Reels") }}</a>
            <a href="#tips" data-translate-key="Tips & Insights" class="block w-full py-3 px-4 rounded-lg text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Tips & Insights") }}</a>
            <div class="w-full h-px bg-[#e3e3e0] dark:bg-[#3E3E3A] my-4"></div>
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
                    <a href="/login" data-translate-key="Login" class="px-4 py-2 rounded-lg text-sm text-[#555] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-colors" onclick="closeMobileMenu()">{{ __("Login") }}</a>
                    <a href="/register" data-translate-key="Register" class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-[#c42802] dark:bg-[#FF4433] hover:opacity-90 transition-opacity" onclick="closeMobileMenu()">{{ __("Register") }}</a>
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
        </script>

        <main>
        @php $h = $hero ?? null; @endphp
        <!-- ===== HERO SECTION (New Design) ===== -->
        <section id="hero-section" class="snap-section flex items-center bg-[#FFFFFF] dark:bg-[#0a0a0a]"
            style="scroll-snap-align:start">
            <div
                class="max-w-6xl mx-auto px-6 lg:px-10 w-full flex flex-col lg:flex-row items-start justify-between gap-8 lg:gap-10 py-16 lg:py-20 relative">
                <!-- Left Column -->
                <div class="flex flex-col max-w-[280px] z-[2] lg:mt-10">
                    <p data-translate-key="Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today."
                        class="text-xs md:text-sm leading-relaxed text-[#333] dark:text-[#A1A09A] mb-8 max-w-[220px]">
                        {{ __("Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.") }}
                    </p>
                    <h1 data-translate-html="Interior<br>Design"
                        class="font-['Playfair_Display',serif] text-4xl sm:text-6xl lg:text-7xl font-bold leading-[1.05] text-[#000] dark:text-[#EDEDEC] tracking-tight">
                        {!! __("Interior<br>Design") !!}
                    </h1>
                </div>
                <!-- Center Image -->
                <div class="relative w-[280px] sm:w-[380px] max-w-full h-[220px] sm:h-[320px] shrink-0 -mt-5 z-[1]">
                    <div class="w-full h-full rounded-sm overflow-hidden"
                        style="background:{{ $h->main_image ? 'none' : 'linear-gradient(135deg,#f5e6d3,#e8d5c0)' }}">
                        @if ($h && $h->main_image)
                            <img src="{{ asset('storage/' . $h->main_image) }}" alt="Hero"
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
                <!-- Right Column -->
                <div class="flex flex-col items-start max-w-[320px] lg:mt-5">
                    <span data-translate-key="Our Recent Work"
                        class="text-[11px] font-semibold text-[#333] dark:text-[#A1A09A] mb-3 tracking-[0.5px]">{{ __("Our Recent Work") }}</span>
                    <h2 data-translate-key="We Will Make These Unique Tastes Of Yours A Design Reality!"
                        class="font-['Playfair_Display',serif] text-xl sm:text-2xl font-bold leading-[1.4] text-[#000] dark:text-[#EDEDEC] mb-5">
                        {{ __("We Will Make These Unique Tastes Of Yours A Design Reality!") }}</h2>
                    <a href="#portfolio" data-translate-key="View Project"
                        class="inline-block px-6 py-2.5 border border-[#333] dark:border-[#62605b] text-[10px] font-semibold text-[#333] dark:text-[#EDEDEC] no-underline uppercase tracking-[1.5px] transition-all duration-300 bg-transparent hover:bg-[#333] dark:hover:bg-[#EDEDEC] hover:text-white dark:hover:text-[#1b1b18] mb-10">
                        {{ __("View Project") }}
                    </a>
                    <div class="w-[320px] max-w-full h-[240px]">
                        <div class="w-full h-full rounded-sm overflow-hidden"
                            style="background:{{ $h->right_image ? 'none' : 'linear-gradient(135deg,#e8f0fe,#d4e4f7)' }}">
                            @if ($h && $h->right_image)
                                <img src="{{ asset('storage/' . $h->right_image) }}" alt="Work"
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
        <section id="about" class="snap-section flex items-center bg-[#FFFFFF] dark:bg-[#0a0a0a]"
            style="scroll-snap-align:start">
            <div class="max-w-4xl mx-auto px-6 lg:px-10 w-full py-12 md:py-20">
                <h1 data-translate-html="About<br>Me"
                    class="font-['Playfair_Display',serif] text-4xl md:text-7xl lg:text-8xl font-bold text-[#111111] dark:text-[#EDEDEC] leading-[1] mb-8 md:mb-12">
                    {!! __("About<br>Me") !!}
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
            class="snap-section w-full max-w-6xl mx-auto px-6 lg:px-10 py-10 md:py-14 flex flex-col justify-center"
            style="scroll-snap-align:start">
            <div class="mb-10">
                <h2 data-translate-key="Portfolio"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Portfolio") }}</h2>
                <p data-translate-key="Makeover projects and interior designs by Lina"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Makeover projects and interior designs by Lina") }}</p>
            </div>
            <div class="grid" style="grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:16px">
                <div
                    class="rounded-xl overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="aspect-[4/3] relative flex items-center justify-center"
                        style="background:linear-gradient(135deg,#fdf6f0,#f5e6d3)">
                        <svg class="w-16 h-16 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 data-translate-key="Modern Classic Living Room"
                            class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                            {{ __("Modern Classic Living Room") }}</h3>
                        <p data-translate-key="Full makeover of a 50m living space"
                            class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                            {{ __("Full makeover of a 50m living space") }}</p>
                    </div>
                </div>
                <div
                    class="rounded-xl overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="aspect-[4/3] relative flex items-center justify-center"
                        style="background:linear-gradient(135deg,#e8f0fe,#d4e4f7)">
                        <svg class="w-16 h-16 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 data-translate-key="Serene Bedroom"
                            class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Serene Bedroom") }}
                        </h3>
                        <p data-translate-key="Interior design with neutral calming tones"
                            class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                            {{ __("Interior design with neutral calming tones") }}</p>
                    </div>
                </div>
                <div
                    class="rounded-xl overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="aspect-[4/3] relative flex items-center justify-center"
                        style="background:linear-gradient(135deg,#f0faf0,#d8f0d8)">
                        <svg class="w-16 h-16 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 data-translate-key="Modern Entryway"
                            class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Modern Entryway") }}
                        </h3>
                        <p data-translate-key="Smart storage cabinets and ambient lighting"
                            class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                            {{ __("Smart storage cabinets and ambient lighting") }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== STORIES ===== -->
        <section id="stories"
            class="snap-section w-full max-w-6xl mx-auto px-6 lg:px-10 py-10 md:py-14 flex flex-col justify-center"
            style="scroll-snap-align:start">
            <div class="mb-10">
                <h2 data-translate-key="Stories"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Stories") }}</h2>
                <p data-translate-key="Behind the scenes & daily design moments"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Behind the scenes & daily design moments") }}</p>
            </div>
            <div class="flex gap-4 overflow-x-auto pb-4" style="scrollbar-width:none;-ms-overflow-style:none">
                <style>
                    .story-card-row::-webkit-scrollbar {
                        display: none
                    }
                </style>
                <div class="story-card-row flex gap-4">
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:New Project,data-content:Behind the scenes of a modern living room design"
                        data-title="{{ __('New Project') }}"
                        data-content="{{ __('Behind the scenes of a modern living room design') }}"
                        data-bg="linear-gradient(135deg, #f53003, #ff8a66)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #f53003, #ff8a66)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path
                                    d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="New Project"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("New Project") }}
                            </h3>
                            <p data-translate-key="Behind the scenes of a modern living room design"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("Behind the scenes of a modern living room design") }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Daily Tip,data-content:Natural light is the interior designer's best friend. Use mirrors to reflect and distribute light across the space."
                        data-title="{{ __('Daily Tip') }}"
                        data-content="{{ __('Natural light is the interior designer\'s best friend. Use mirrors to reflect and distribute light across the space.') }}"
                        data-bg="linear-gradient(135deg, #161615, #3E3E3A)" data-type="text">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #161615, #3E3E3A)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Daily Tip"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __('Daily Tip') }}
                            </h3>
                            <p data-translate-key="Natural light is the designer's best friend"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __('Natural light is the designer\'s best friend') }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Behind Scenes,data-content:On-site shots before and after the transformation"
                        data-title="{{ __('Behind Scenes') }}"
                        data-content="{{ __('On-site shots before and after the transformation') }}"
                        data-bg="linear-gradient(135deg, #706f6c, #A1A09A)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #706f6c, #A1A09A)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path
                                    d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Behind Scenes"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Behind Scenes") }}
                            </h3>
                            <p data-translate-key="On-site shots before and after"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("On-site shots before and after") }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Makeover,data-content:Turning an ordinary bedroom into a design masterpiece"
                        data-title="{{ __('Makeover') }}"
                        data-content="{{ __('Turning an ordinary bedroom into a design masterpiece') }}"
                        data-bg="linear-gradient(135deg, #A1A09A, #e3e3e0)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #A1A09A, #e3e3e0)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="m21 15-5-5L5 21" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Makeover"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Makeover") }}</h3>
                            <p data-translate-key="Transforming an ordinary bedroom"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("Transforming an ordinary bedroom") }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Decor,data-content:Small entryway decor ideas that make a big impact"
                        data-title="{{ __('Decor') }}"
                        data-content="{{ __('Small entryway decor ideas that make a big impact') }}"
                        data-bg="linear-gradient(135deg, #706f6c, #A1A09A)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #706f6c, #A1A09A)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5z" />
                                <path d="M2 17l10 5 10-5" />
                                <path d="M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Decor"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Decor") }}</h3>
                            <p data-translate-key="Entryway ideas that make an impact"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("Entryway ideas that make an impact") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== STORY MODAL ===== -->
        <div id="storyModal" class="fixed inset-0 z-[1000] flex items-center justify-center"
            style="opacity:0;pointer-events:none;transition:opacity .35s ease;background:rgba(0,0,0,.92)"
            onclick="closeWelcomeStory(event)">
            <div class="w-full max-w-lg mx-4 rounded-xl overflow-hidden relative" onclick="event.stopPropagation()"
                style="aspect-ratio:9/16;box-shadow:inset 0 0 0 1px rgba(255,255,255,.1)">
                <button
                    class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full border-none flex items-center justify-center text-white text-xl cursor-pointer"
                    style="background:rgba(255,255,255,.15);backdrop-filter:blur(8px)"
                    onclick="closeWelcomeStory()">&times;</button>
                <div id="storyModalContent"
                    class="w-full h-full flex flex-col items-center justify-center p-8 text-center"></div>
            </div>
        </div>

        <script>
            function openWelcomeStory(el) {
                const title = el.getAttribute('data-title');
                const content = el.getAttribute('data-content');
                const bg = el.getAttribute('data-bg');
                const type = el.getAttribute('data-type');
                const modal = document.getElementById('storyModal');
                const inner = document.getElementById('storyModalContent');
                if (type === 'text') {
                    inner.innerHTML = `
                <svg class="w-10 h-10 mx-auto mb-4 opacity-60" style="color:#f53003" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                <p class="text-2xl font-medium text-white leading-relaxed">${content}</p>
            `;
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

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        </script>

        <!-- ===== TIPS & INSIGHTS ===== -->
        <section id="tips"
            class="snap-section w-full max-w-6xl mx-auto px-6 lg:px-10 py-10 md:py-14 flex flex-col justify-center"
            style="scroll-snap-align:start">
            <div class="mb-10">
                <h2 data-translate-key="Tips & Insights"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Tips & Insights") }}</h2>
                <p data-translate-key="Short design ideas and inspiration"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Short design ideas and inspiration") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:16px">
                <div
                    class="rounded-xl p-6 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <span data-translate-key="Lighting"
                        class="inline-block px-2.5 py-0.5 rounded text-[10px] font-medium text-white mb-4"
                        style="background:#f53003">{{ __("Lighting") }}</span>
                    <h3 data-translate-key="Layered Lighting Changes Everything"
                        class="font-medium text-sm mb-1.5 text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ __("Layered Lighting Changes Everything") }}</h3>
                    <p data-translate-key="Don't rely on a single light source. Combine ambient, task, and accent lighting to create multiple moods in the same space."
                        class="text-[#706f6c] dark:text-[#A1A09A] text-xs leading-relaxed">
                        {{ __("Don't rely on a single light source. Combine ambient, task, and accent lighting to create multiple moods in the same space.") }}
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <span data-translate-key="Colors"
                        class="inline-block px-2.5 py-0.5 rounded text-[10px] font-medium text-white mb-4"
                        style="background:#f53003">{{ __("Colors") }}</span>
                    <h3 data-translate-key="The 60-30-10 Color Rule"
                        class="font-medium text-sm mb-1.5 text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ __("The 60-30-10 Color Rule") }}</h3>
                    <p data-translate-key="60% neutral for walls, 30% secondary for furniture, 10% accent for accessories. This ratio guarantees visual balance."
                        class="text-[#706f6c] dark:text-[#A1A09A] text-xs leading-relaxed">
                        {{ __("60% neutral for walls, 30% secondary for furniture, 10% accent for accessories. This ratio guarantees visual balance.") }}
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <span data-translate-key="Furniture"
                        class="inline-block px-2.5 py-0.5 rounded text-[10px] font-medium text-white mb-4"
                        style="background:#f53003">{{ __("Furniture") }}</span>
                    <h3 data-translate-key="Multi-Purpose Pieces for Small Spaces"
                        class="font-medium text-sm mb-1.5 text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ __("Multi-Purpose Pieces for Small Spaces") }}</h3>
                    <p data-translate-key="Choose furniture with hidden storage: storage ottomans, foldable tables, and beds with built-in drawers."
                        class="text-[#706f6c] dark:text-[#A1A09A] text-xs leading-relaxed">
                        {{ __("Choose furniture with hidden storage: storage ottomans, foldable tables, and beds with built-in drawers.") }}
                    </p>
                </div>
            </div>
        </section>

        </main>

        <!-- ===== FOOTER ===== -->
        <footer class="w-full border-t border-[#e3e3e0] dark:border-[#3E3E3A]" style="scroll-snap-align:start">
            <div class="max-w-6xl mx-auto px-6 lg:px-10 py-12 lg:py-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">
                    <!-- Brand -->
                    <div>
                        <a href="/"
                            class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                            <span
                                class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold"
                                style="font-family:Georgia,serif;border-radius:3px">L</span>
                            <span data-translate-key="Lina">{{ __("Lina") }}</span>
                        </a>
                        <p data-translate-key="Interior design & decoration studio crafting elegant, functional spaces that tell your unique story."
                            class="text-[#706f6c] dark:text-[#A1A09A] text-sm leading-relaxed max-w-xs">
                            {{ __("Interior design & decoration studio crafting elegant, functional spaces that tell your unique story.") }}
                        </p>
                        <div class="flex items-center gap-3 mt-5">
                            <a href="#" aria-label="Instagram"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M7.8 2H16.2C19.4 2 22 4.6 22 7.8V16.2C22 19.4 19.4 22 16.2 22H7.8C4.6 22 2 19.4 2 16.2V7.8C2 4.6 4.6 2 7.8 2ZM7.6 4C5.6 4 4 5.6 4 7.6V16.4C4 18.4 5.6 20 7.6 20H16.4C18.4 20 20 18.4 20 16.4V7.6C20 5.6 18.4 4 16.4 4H7.6ZM17.3 5.5C17.9 5.5 18.3 5.9 18.3 6.5C18.3 7.1 17.9 7.5 17.3 7.5C16.7 7.5 16.3 7.1 16.3 6.5C16.3 5.9 16.7 5.5 17.3 5.5ZM12 7C15.3 7 18 9.7 18 13C18 16.3 15.3 19 12 19C8.7 19 6 16.3 6 13C6 9.7 8.7 7 12 7ZM12 9C9.8 9 8 10.8 8 13C8 15.2 9.8 17 12 17C14.2 17 16 15.2 16 13C16 10.8 14.2 9 12 9Z" />
                                </svg>
                            </a>
                            <a href="#" aria-label="Facebook"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22 12C22 6.5 17.5 2 12 2S2 6.5 2 12C2 17 5.5 21.1 10.1 21.9V14.9H7.7V12H10.1V9.8C10.1 7.3 11.7 5.9 14 5.9C15.1 5.9 16.2 6.1 16.2 6.1V8.6H15C13.8 8.6 13.4 9.4 13.4 10.2V12H16.1L15.6 14.9H13.5V22C18.5 21.1 22 17 22 12Z" />
                                </svg>
                            </a>
                            <a href="#" aria-label="Twitter"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M23.5 6.2c-.8.4-1.7.6-2.6.7.9-.6 1.7-1.4 2.1-2.5-.9.5-1.8.9-2.8 1.1-.8-.9-2-1.5-3.3-1.5-2.5 0-4.5 2-4.5 4.5 0 .4 0 .7.1 1.1C7.8 9.3 4.7 7.6 2.6 5.1c-.4.7-.6 1.4-.6 2.3 0 1.6.8 2.9 2 3.7-.7 0-1.4-.2-2-.6v.1c0 2.2 1.6 4 3.6 4.4-.4.1-.8.2-1.2.2-.3 0-.6 0-.9-.1.6 1.8 2.2 3.1 4.2 3.1-1.5 1.2-3.5 1.9-5.6 1.9-.4 0-.7 0-1-.1 2 1.3 4.4 2 6.9 2 8.3 0 12.8-6.9 12.8-12.8 0-.2 0-.4 0-.6.9-.6 1.7-1.4 2.3-2.3z" />
                                </svg>
                            </a>
                            <a href="#" aria-label="LinkedIn"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M19.6 2H4.4C3.1 2 2 3.1 2 4.4v15.2C2 20.9 3.1 22 4.4 22h15.2c1.3 0 2.4-1.1 2.4-2.4V4.4C22 3.1 20.9 2 19.6 2zM8.4 18.4H5.6V9.8h2.8v8.6zM7 8.6c-.9 0-1.6-.7-1.6-1.6S6.1 5.4 7 5.4s1.6.7 1.6 1.6S7.9 8.6 7 8.6zm11.4 9.8h-2.8v-4.2c0-1 0-2.3-1.4-2.3s-1.6 1.1-1.6 2.2v4.3H9.8V9.8h2.7v1.2h.1c.4-.7 1.3-1.4 2.6-1.4 2.8 0 3.3 1.8 3.3 4.2v4.6z" />
                                </svg>
                            </a>
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
                            <li><span data-translate-key="Interior Design"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Interior Design") }}</span>
                            </li>
                            <li><span data-translate-key="Space Planning"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Space Planning") }}</span>
                            </li>
                            <li><span data-translate-key="Dashboard Makeover"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Dashboard Makeover") }}</span>
                            </li>
                            <li><span data-translate-key="Furniture Selection"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Furniture Selection") }}</span>
                            </li>
                            <li><span data-translate-key="Lighting Design"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Lighting Design") }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 data-translate-key="Contact"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ __("Contact") }}
                        </h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <span data-translate-key="Amman, Jordan"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Amman, Jordan") }}</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                                <a href="mailto:hello@lina.design"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">hello@lina.design</a>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                <a href="tel:+962791234567"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">+962
                                    7 9123 4567</a>
                            </li>
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

    <script>
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
