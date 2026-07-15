<x-guest-layout>
    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <main class="min-h-screen bg-[#0a0a0a] pb-14 px-6 lg:px-10 max-w-6xl mx-auto">
            <div class="pt-10 mb-8">
                <h1 data-translate-key="Tips & Insights"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#EDEDEC]">
                    {{ __("Tips & Insights") }}</h1>
                <p data-translate-key="Short design ideas and inspiration"
                    class="text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Short design ideas and inspiration") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
                @forelse ($tips as $tip)
                    <div class="rounded-[3px] p-3 transition-transform duration-300 hover:-translate-y-1 bg-[#161615] border border-[#3E3E3A] overflow-hidden max-w-full">
                        <span class="inline-block px-2 py-0.5 rounded text-[10px] font-medium text-white mb-2"
                            style="background:#f53003">{{ $tip->category }}</span>
                        <h3 class="font-medium text-xs mb-1 text-[#EDEDEC] break-words">{{ $tip->title }}</h3>
                        <p class="text-[#A1A09A] text-[11px] leading-relaxed break-words max-h-[3.3em] overflow-hidden">{{ $tip->content }}</p>
                    </div>
                @empty
                    <p class="text-[#A1A09A] text-sm">{{ __('No tips yet.') }}</p>
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
