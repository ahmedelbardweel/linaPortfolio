<x-guest-layout>
    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <nav class="fixed top-0 left-0 right-0 z-50 h-14 flex items-center justify-center px-5"
            style="background:rgba(10,10,10,.25);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px)">
            <div class="flex items-center gap-4 w-full max-w-6xl px-0 lg:px-8">
                <a href="/#portfolio"
                    class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#EDEDEC] me-auto">
                    <span class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold"
                        style="font-family:Georgia,serif;border-radius:3px">L</span>
                    <span>Lina</span>
                </a>
                <a href="/" class="text-xs text-white/70 hover:text-white transition-colors uppercase tracking-wider">{{ __('← Back') }}</a>
            </div>
        </nav>

        <main class="min-h-screen bg-[#0a0a0a] pt-14 pb-16 px-6 lg:px-10 max-w-6xl mx-auto">
            {{-- Portfolios --}}
            <section class="pt-10" id="portfolio">
                <h1 data-translate-key="Portfolio"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#EDEDEC] mb-2">
                    {{ __("Portfolio") }}</h1>
                <p data-translate-key="Makeover projects and interior designs by Lina"
                    class="text-[#A1A09A] text-sm mb-8">
                    {{ __("Makeover projects and interior designs by Lina") }}</p>
                <div class="grid gap-4" style="grid-template-columns:repeat(auto-fill,minmax(200px,1fr))">
                    @forelse ($portfolios as $portfolio)
                        <div class="rounded-[3px] overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-[#161615] border border-[#3E3E3A]">
                            <div class="aspect-[4/3] relative flex items-center justify-center overflow-hidden"
                                style="background:linear-gradient(135deg,#1a1a1a,#2a2a28)">
                                @if ($portfolio->image_path)
                                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" loading="lazy" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-12 h-12 text-white/10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                        <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
                                    </svg>
                                @endif
                            </div>
                            <div class="p-4 max-w-full overflow-hidden">
                                <h3 class="font-medium text-sm text-[#EDEDEC] break-words">{{ $portfolio->title }}</h3>
                                <p class="text-[#A1A09A] text-xs mt-1 leading-relaxed break-words overflow-hidden max-h-[3em]">{{ $portfolio->description }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-[#A1A09A] text-sm">{{ __('No portfolio items yet.') }}</p>
                    @endforelse
                </div>
            </section>

            {{-- Stories --}}
            <section class="pt-16" id="stories">
                <h1 data-translate-key="Stories"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#EDEDEC] mb-2">
                    {{ __("Stories") }}</h1>
                <p data-translate-key="Behind the scenes & daily design moments"
                    class="text-[#A1A09A] text-sm mb-8">
                    {{ __("Behind the scenes & daily design moments") }}</p>
                <div class="grid gap-4" style="grid-template-columns:repeat(auto-fill,minmax(200px,1fr))">
                    @forelse ($stories as $story)
                        <div class="rounded-[3px] overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-[#161615] border border-[#3E3E3A] cursor-pointer"
                            onclick="openWelcomeStory(this)"
                            data-title="{{ $story->title }}"
                            data-content="{{ $story->content }}"
                            data-bg="{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}"
                            data-type="{{ $story->type }}"
                            data-image="{{ $story->image_url }}">
                            <div class="h-36 flex items-center justify-center"
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
                            <div class="p-4 max-w-full overflow-hidden">
                                <h3 class="font-medium text-sm text-[#EDEDEC] break-words">{{ $story->title }}</h3>
                                <p class="text-[#A1A09A] text-xs mt-1 leading-relaxed break-words overflow-hidden max-h-[3em]">{{ $story->content }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-[#A1A09A] text-sm">{{ __('No stories yet.') }}</p>
                    @endforelse
                </div>
            </section>

            {{-- Tips --}}
            <section class="pt-16" id="tips">
                <h1 data-translate-key="Tips & Insights"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#EDEDEC] mb-2">
                    {{ __("Tips & Insights") }}</h1>
                <p data-translate-key="Short design ideas and inspiration"
                    class="text-[#A1A09A] text-sm mb-8">
                    {{ __("Short design ideas and inspiration") }}</p>
                <div class="grid gap-4" style="grid-template-columns:repeat(auto-fill,minmax(220px,1fr))">
                    @forelse ($tips as $tip)
                        <div class="rounded-[3px] p-4 transition-transform duration-300 hover:-translate-y-1 bg-[#161615] border border-[#3E3E3A] overflow-hidden max-w-full">
                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-medium text-white mb-2"
                                style="background:#f53003">{{ $tip->category ?: __('Uncategorized') }}</span>
                            <h3 class="font-medium text-sm mb-1 text-[#EDEDEC] break-words">{{ $tip->title }}</h3>
                            <p class="text-[#A1A09A] text-xs leading-relaxed break-words max-h-[3em] overflow-hidden">{{ $tip->content }}</p>
                        </div>
                    @empty
                        <p class="text-[#A1A09A] text-sm">{{ __('No tips yet.') }}</p>
                    @endforelse
                </div>
            </section>
        </main>

        {{-- Story Modal --}}
        <div id="storyModal" class="fixed inset-0 z-[1000] flex items-center justify-center"
            style="opacity:0;pointer-events:none;transition:opacity .35s ease;background:rgba(0,0,0,.92)"
            onclick="closeExploreStory(event)">
            <div class="w-full max-w-lg mx-4 rounded-xl overflow-hidden relative" onclick="event.stopPropagation()"
                style="aspect-ratio:9/16;box-shadow:inset 0 0 0 1px rgba(255,255,255,.1)">
                <button
                    class="absolute top-4 end-4 z-10 w-10 h-10 rounded-full border-none flex items-center justify-center text-white text-xl cursor-pointer"
                    style="background:rgba(255,255,255,.15);backdrop-filter:blur(8px)"
                    onclick="closeExploreStory()">&times;</button>
                <div id="storyModalContent"
                    class="w-full h-full flex flex-col items-center justify-center p-8 text-center"></div>
            </div>
        </div>

        <style>
            html { scrollbar-width: none; -ms-overflow-style: none; }
            html::-webkit-scrollbar { display: none; }
        </style>

        <script>
            function openExploreStory(el) {
                var modal = document.getElementById('storyModal');
                var content = document.getElementById('storyModalContent');
                var title = el.getAttribute('data-title') || '';
                var text = el.getAttribute('data-content') || '';
                var bg = el.getAttribute('data-bg') || 'linear-gradient(135deg, #161615, #3E3E3A)';
                var type = el.getAttribute('data-type') || 'text';
                var image = el.getAttribute('data-image') || '';
                var html = '';
                if (type === 'image' && image) {
                    html = '<img src="' + image + '" alt="' + title + '" class="w-full h-full object-cover absolute inset-0">';
                } else if (type === 'mixed' && image) {
                    html = '<img src="' + image + '" alt="' + title + '" class="w-full h-full object-cover absolute inset-0 opacity-40">';
                    html += '<div class="relative z-[1] text-center p-6 text-white text-sm leading-relaxed max-w-xs">' + text + '</div>';
                } else {
                    html = '<div class="text-white text-sm leading-relaxed max-w-xs">' + text + '</div>';
                }
                content.innerHTML = html;
                content.style.background = bg;
                content.style.position = 'relative';
                modal.style.opacity = '1';
                modal.style.pointerEvents = 'auto';
                document.body.style.overflow = 'hidden';
            }
            function closeExploreStory(e) {
                if (e && e.target !== e.currentTarget) return;
                var modal = document.getElementById('storyModal');
                modal.style.opacity = '0';
                modal.style.pointerEvents = 'none';
                document.body.style.overflow = '';
            }
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeExploreStory();
            });
        </script>
        </script>

        <script>
            (function() {
                var lang = localStorage.getItem('lang') || '{{ app()->getLocale() }}';
                if (lang === 'ar') {
                    document.documentElement.dir = 'rtl';
                    document.documentElement.lang = 'ar';
                    document.documentElement.classList.add('rtl');
                } else {
                    document.documentElement.dir = 'ltr';
                    document.documentElement.lang = 'en';
                    document.documentElement.classList.remove('rtl');
                }
                document.querySelectorAll('[data-translate-key]').forEach(function(el) {
                    var key = el.getAttribute('data-translate-key');
                    var t = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
                    el.textContent = t;
                });
            })();
        </script>
    </div>
</x-guest-layout>
