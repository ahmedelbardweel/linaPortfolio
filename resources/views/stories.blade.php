<x-guest-layout>
    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <nav class="fixed top-0 left-0 right-0 z-50 h-12 flex items-center px-5"
            style="background:rgba(10,10,10,.25);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px)">
            <div class="flex items-center w-full max-w-6xl mx-auto">
                <a href="/#stories" class="flex items-center gap-2 text-[#A1A09A] hover:text-[#EDEDEC] transition-colors">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                    <span class="text-xs uppercase tracking-wider font-medium">{{ __('Back') }}</span>
                </a>
            </div>
        </nav>

        <main class="min-h-screen bg-[#0a0a0a] pt-16 pb-14 px-6 lg:px-10 max-w-6xl mx-auto">
            <div class="mb-10 mt-6">
                <h1 data-translate-key="Stories"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#EDEDEC]">
                    {{ __("Stories") }}</h1>
                <p data-translate-key="Behind the scenes & daily design moments"
                    class="text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Behind the scenes & daily design moments") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px">
                @forelse ($stories as $story)
                    <div class="rounded-[3px] overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#3E3E3A]"
                        onclick="openAllStory(this)"
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
                        <div class="p-3 max-w-full overflow-hidden bg-[#161615]">
                            <h3 class="font-medium text-xs text-[#EDEDEC] break-words">{{ $story->title }}</h3>
                            <p class="text-[#A1A09A] text-[11px] mt-0.5 leading-relaxed break-words overflow-hidden max-h-[3.3em]">{{ Str::limit($story->content, 60) }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-[#A1A09A] text-sm">{{ __('No stories yet.') }}</p>
                @endforelse
            </div>
        </main>

        {{-- Story Modal --}}
        <div id="allStoryModal" class="fixed inset-0 z-[1000] flex items-center justify-center"
            style="opacity:0;pointer-events:none;transition:opacity .35s ease;background:rgba(0,0,0,.92)"
            onclick="closeAllStory(event)">
            <div class="w-full max-w-lg mx-4 rounded-xl overflow-hidden relative" onclick="event.stopPropagation()"
                style="aspect-ratio:9/16;box-shadow:inset 0 0 0 1px rgba(255,255,255,.1)">
                <button
                    class="absolute top-4 end-4 z-10 w-10 h-10 rounded-full border-none flex items-center justify-center text-white text-xl cursor-pointer"
                    style="background:rgba(255,255,255,.15);backdrop-filter:blur(8px)"
                    onclick="closeAllStory()">&times;</button>
                <div id="allStoryModalContent"
                    class="w-full h-full flex flex-col items-center justify-center p-8 text-center"></div>
            </div>
        </div>

        <style>
            html { scrollbar-width: none; -ms-overflow-style: none; }
            html::-webkit-scrollbar { display: none; }
        </style>

        <script>
            function openAllStory(el) {
                var modal = document.getElementById('allStoryModal');
                var content = document.getElementById('allStoryModalContent');
                var text = el.getAttribute('data-content') || '';
                var bg = el.getAttribute('data-bg') || 'linear-gradient(135deg, #161615, #3E3E3A)';
                var type = el.getAttribute('data-type') || 'text';
                var image = el.getAttribute('data-image') || '';
                var html = '';
                if (type === 'image' && image) {
                    html = '<img src="' + image + '" alt="" class="w-full h-full object-cover absolute inset-0">';
                } else if (type === 'mixed' && image) {
                    html = '<img src="' + image + '" alt="" class="w-full h-full object-cover absolute inset-0 opacity-40">';
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
            function closeAllStory(e) {
                if (e && e.target !== e.currentTarget) return;
                var modal = document.getElementById('allStoryModal');
                modal.style.opacity = '0';
                modal.style.pointerEvents = 'none';
                document.body.style.overflow = '';
            }
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeAllStory();
            });
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
