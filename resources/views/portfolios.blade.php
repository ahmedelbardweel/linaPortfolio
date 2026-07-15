<x-guest-layout>
    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <nav class="fixed top-0 left-0 right-0 z-50 h-12 flex items-center px-5"
            style="background:rgba(10,10,10,.25);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px)">
            <div class="flex items-center w-full max-w-6xl mx-auto">
                <a href="/#portfolio" class="flex items-center gap-2 text-[#A1A09A] hover:text-[#EDEDEC] transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                    <span class="text-xs uppercase tracking-wider font-medium">{{ __('Back') }}</span>
                </a>
            </div>
        </nav>

        <main class="min-h-screen bg-[#0a0a0a] pt-16 pb-14 px-6 lg:px-10 max-w-6xl mx-auto">
            <div class="mb-10 mt-6">
                <h1 data-translate-key="Portfolio"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#EDEDEC]">
                    {{ __("Portfolio") }}</h1>
                <p data-translate-key="Makeover projects and interior designs by Lina"
                    class="text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Makeover projects and interior designs by Lina") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
                @forelse ($portfolios as $portfolio)
                    <div class="rounded-[3px] overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-[#161615] border border-[#3E3E3A]">
                        <div class="aspect-[4/3] relative flex items-center justify-center overflow-hidden"
                            style="background:linear-gradient(135deg,#1a1a1a,#2a2a28)">
                            @if ($portfolio->image_path)
                                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" loading="lazy" class="w-full h-full object-cover">
                            @else
                                <svg class="w-10 h-10 text-white/10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
                                </svg>
                            @endif
                        </div>
                        <div class="p-3 max-w-full overflow-hidden">
                            <h3 class="font-medium text-xs text-[#EDEDEC] break-words">{{ $portfolio->title }}</h3>
                            <p class="text-[#A1A09A] text-[11px] mt-0.5 leading-relaxed break-words overflow-hidden max-h-[3.3em]">{{ $portfolio->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-[#A1A09A] text-sm">{{ __('No portfolio items yet.') }}</p>
                @endforelse
            </div>
        </main>

        <style>
            html { scrollbar-width: none; -ms-overflow-style: none; }
            html::-webkit-scrollbar { display: none; }
        </style>

        <script>
            (function() {
                var lang = localStorage.getItem('lang') || '{{ app()->getLocale() }}';
                if (lang === 'ar') { document.documentElement.dir = 'rtl'; document.documentElement.lang = 'ar'; document.documentElement.classList.add('rtl'); }
                else { document.documentElement.dir = 'ltr'; document.documentElement.lang = 'en'; document.documentElement.classList.remove('rtl'); }
                document.querySelectorAll('[data-translate-key]').forEach(function(el) {
                    var key = el.getAttribute('data-translate-key');
                    el.textContent = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
                });
            })();
        </script>
    </div>
</x-guest-layout>
