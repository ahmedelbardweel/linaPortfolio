<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?: 'en' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-translate-key="Lina - Reels | Interior Design & Decoration">{{ __('Lina - Reels | Interior Design & Decoration') }}</title>
    <meta name="description" content="{{ __('Short design reels showcasing interior design inspiration, transformations, and daily creative moments.') }}">
    <x-font-preloads weights="400,500,700" />
    <x-vite />
    <style>
        *, :before, :after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; background: #000; color: #fff; min-height: 100vh; overflow: hidden; }
        .reels-feed::-webkit-scrollbar { display: none; }
        .reel-video { width: 100%; height: 100%; object-fit: cover; }
        /* Custom play overlay — uses data-playing to hide/show */
        .play-overlay { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; z-index:15; cursor:pointer; background:rgba(0,0,0,.15); opacity:1; transition:opacity .25s; }
        .play-overlay[data-playing="1"] { opacity:0; pointer-events:none; }
        .play-overlay svg { width:64px; height:64px; filter:drop-shadow(0 2px 8px rgba(0,0,0,.6)); }
        .mute-btn { position:absolute; top:60px; right:12px; z-index:20; width:36px; height:36px; border-radius:50%; background:rgba(0,0,0,.5); border:none; color:#fff; cursor:pointer; display:flex; align-items:center; justify-content:center; }
    </style>
</head>
<body>
<main>
<div class="reels-feed" style="height:100dvh;overflow-y:scroll;scroll-snap-type:y mandatory;scrollbar-width:none;-ms-overflow-style:none;background:#000">

<div class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-4 h-12" style="background:linear-gradient(rgba(0,0,0,.6),transparent)">
    <a href="/" data-translate-key="← Back" class="text-white/70 hover:text-white text-xs uppercase tracking-wider transition-colors">{{ __('← Back') }}</a>
    <div class="flex items-center gap-2">
        <button onclick="toggleDark()" class="w-7 h-7 flex items-center justify-center rounded-full text-white/70 hover:text-white hover:bg-white/10 transition-all" title="Toggle theme">
            <svg class="dark:hidden block w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            <svg class="hidden dark:block w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </button>
        <button onclick="toggleLang()" class="lang-btn w-7 h-7 flex items-center justify-center rounded-full text-white/70 hover:text-white hover:bg-white/10 transition-all text-[10px] font-semibold" title="Toggle language">{{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}</button>
    </div>
</div>

    @php
        $demoVideos = [
            'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
            'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
            'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4',
            'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4',
            'https://storage.googleapis.com/gtv-videos-bucket/sample/ForBiggerMeltdowns.mp4',
            'https://storage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
        ];
    @endphp

    @forelse ($reels as $i => $reel)
    @php
        // If video_path is not a full CDN URL (https://...), it's a broken local path on Vercel
        // Use demo video immediately — no JS tricks needed
        $isValidUrl = str_starts_with($reel->video_path ?? '', 'https://');
        $videoSrc = $isValidUrl ? $reel->video_path : $demoVideos[$i % count($demoVideos)];
    @endphp
    <div class="reel-slide" style="scroll-snap-align:start;height:100vh;display:flex;align-items:center;justify-content:center;background:#000">
        <div class="relative w-full h-full flex items-center justify-center" style="max-width:400px;margin:0 auto;padding:0 2px">
            <div class="w-full h-full relative overflow-hidden" style="aspect-ratio:9/16;max-height:100vh;background:#1a1a1a">
                 <video class="reel-video" playsinline muted autoplay loop preload="auto" data-reel-index="{{ $i }}"
                        @if($reel->thumbnail_data || $reel->thumbnail) poster="{{ $reel->thumbnail_url }}" @endif>
                     <source src="{{ $videoSrc }}" type="video/mp4">
                 </video>
                 <!-- Tap-to-play overlay (click anywhere on video to toggle) -->
                 <div class="play-overlay" onclick="doToggle(this)">
                     <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <circle cx="40" cy="40" r="38" fill="rgba(0,0,0,0.45)" stroke="rgba(255,255,255,0.7)" stroke-width="2"/>
                         <polygon points="32,25 60,40 32,55" fill="white"/>
                     </svg>
                 </div>
                 <!-- Mute toggle -->
                 <button class="mute-btn" onclick="toggleMute(event)" title="Mute/Unmute">
                     <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                 </button>
                <div class="absolute bottom-0 left-0 right-0 p-4 z-10" style="background:linear-gradient(transparent,rgba(0,0,0,.7))">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-6 h-6 rounded-full bg-[#f53003] text-white flex items-center justify-center text-[10px] font-bold" style="font-family:Georgia,serif">L</span>
                        <span data-translate-key="Lina" class="text-white text-xs font-medium">{{ __('Lina') }}</span>
                    </div>
                    <p data-translate-key="{{ $reel->title }}" class="text-white/80 text-xs">{{ __($reel->title) }}</p>
                    @if ($reel->description)
                    <p data-translate-key="{{ $reel->description }}" class="text-white/50 text-[10px] mt-0.5">{{ __($reel->description) }}</p>
                    @endif
                </div>
                <div class="absolute right-2 rtl:right-auto rtl:left-2 z-20 flex flex-col items-center gap-5 reels-actions-panel" style="bottom:110px">
                    <button class="flex flex-col items-center gap-1 text-white" onclick="likeReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        <span data-translate-key="Like" class="text-[10px] font-medium drop-shadow-lg">{{ __('Like') }}</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-white" onclick="commentReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <span data-translate-key="Comment" class="text-[10px] font-medium drop-shadow-lg">{{ __('Comment') }}</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-white" onclick="shareReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                        <span data-translate-key="Share" class="text-[10px] font-medium drop-shadow-lg">{{ __('Share') }}</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-white" onclick="bookReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        <span data-translate-key="Book" class="text-[10px] font-medium drop-shadow-lg">{{ __('Book') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @empty
        @for ($i = 0; $i < 6; $i++)
    <div class="reel-slide" style="scroll-snap-align:start;height:100vh;display:flex;align-items:center;justify-content:center;background:#000">
        <div class="relative w-full h-full flex items-center justify-center" style="max-width:400px;margin:0 auto;padding:0 2px">
            <div class="w-full h-full relative overflow-hidden" style="aspect-ratio:9/16;max-height:100vh;background:#1a1a1a">
                <video class="reel-video" playsinline muted preload="metadata" data-reel-index="{{ $i }}" onclick="toggleVideo(this)">
                    <source src="{{ $demoVideos[$i] }}" type="video/mp4">
                </video>
                <!-- Tap-to-play overlay -->
                <div class="play-overlay" onclick="toggleVideo(this.previousElementSibling)">
                    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="38" fill="rgba(0,0,0,0.45)" stroke="rgba(255,255,255,0.7)" stroke-width="2"/>
                        <polygon points="32,25 60,40 32,55" fill="white"/>
                    </svg>
                </div>
                <!-- Mute toggle -->
                <button class="mute-btn" onclick="toggleMute(this)" title="Mute/Unmute">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                </button>
                <div class="absolute bottom-0 left-0 right-0 p-4 z-10" style="background:linear-gradient(transparent,rgba(0,0,0,.7))">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-6 h-6 rounded-full bg-[#f53003] text-white flex items-center justify-center text-[10px] font-bold" style="font-family:Georgia,serif">L</span>
                        <span data-translate-key="Lina" class="text-white text-xs font-medium">{{ __('Lina') }}</span>
                    </div>
                    <p data-translate-key="Sample Reel :num" data-translate-num="{{ $i + 1 }}" class="text-white/80 text-xs">{{ __('Sample Reel :num', ['num' => $i + 1]) }}</p>
                    <p data-translate-key="Interior design inspiration video" class="text-white/50 text-[10px] mt-0.5">{{ __('Interior design inspiration video') }}</p>
                </div>
                <div class="absolute right-2 rtl:right-auto rtl:left-2 z-20 flex flex-col items-center gap-5 reels-actions-panel" style="bottom:110px">
                    <button class="flex flex-col items-center gap-1 text-white" onclick="likeReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        <span data-translate-key="Like" class="text-[10px] font-medium drop-shadow-lg">{{ __('Like') }}</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-white" onclick="commentReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <span data-translate-key="Comment" class="text-[10px] font-medium drop-shadow-lg">{{ __('Comment') }}</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-white" onclick="shareReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                        <span data-translate-key="Share" class="text-[10px] font-medium drop-shadow-lg">{{ __('Share') }}</span>
                    </button>
                    <button class="flex flex-col items-center gap-1 text-white" onclick="bookReel(this)">
                        <svg class="w-7 h-7 drop-shadow-lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        <span data-translate-key="Book" class="text-[10px] font-medium drop-shadow-lg">{{ __('Book') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
        @endfor
    @endforelse
</div>

<script>
window.translations = {!! file_exists(lang_path('ar.json')) ? file_get_contents(lang_path('ar.json')) : '{}' !!};

function getTranslation(key) {
    const locale = document.documentElement.lang;
    if (locale === 'ar' && window.translations && window.translations[key]) {
        return window.translations[key];
    }
    return key;
}

function toggleLang() {
    const currentLang = document.documentElement.lang || 'en';
    const nextLang = currentLang === 'ar' ? 'en' : 'ar';
    switchLanguage(nextLang);
}

function switchLanguage(lang) {
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
        let translation = key;
        if (lang === 'ar' && window.translations && window.translations[key]) {
            translation = window.translations[key];
        }
        if (translation.includes(':num')) {
            const paramVal = el.getAttribute('data-translate-num') || '';
            translation = translation.replace(':num', paramVal);
        }
        el.textContent = translation;
    });

    // Translate attributes
    document.querySelectorAll('[data-translate-attrs]').forEach(el => {
        const attrsStr = el.getAttribute('data-translate-attrs');
        const attrs = attrsStr.split(',');
        attrs.forEach(attrPair => {
            const [attrName, engKey] = attrPair.split(':');
            let translation = engKey;
            if (lang === 'ar' && window.translations && window.translations[engKey]) {
                translation = window.translations[engKey];
            }
            el.setAttribute(attrName, translation);
        });
    });

    // Update language switcher buttons text
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.textContent = lang === 'ar' ? 'AR' : 'EN';
    });

    // Sync actions sidebar alignment
    document.querySelectorAll('.reels-actions-panel').forEach(panel => {
        if (lang === 'ar') {
            panel.classList.remove('right-2');
            panel.classList.add('left-2');
        } else {
            panel.classList.remove('left-2');
            panel.classList.add('right-2');
        }
    });

    // Sync locale to session in the background
    localStorage.setItem('lang', lang);
    fetch(`/lang/${lang}`).catch(() => {});
}

function likeReel(btn) {
    const svg = btn.querySelector('svg');
    if (btn.dataset.liked === 'true') {
        btn.dataset.liked = 'false'; svg.style.fill = 'none'; svg.style.color = 'white';
    } else {
        btn.dataset.liked = 'true'; svg.style.fill = '#f53003'; svg.style.color = '#f53003';
    }
}
function commentReel(btn) { alert(getTranslation('Comments coming soon!')); }
function shareReel(btn) {
    if (navigator.share) { navigator.share({ title: 'Lina Reels', url: window.location.href }).catch(() => {}); }
    else {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const s = btn.querySelector('span'); const o = s.textContent; s.textContent = getTranslation('Copied!'); setTimeout(() => s.textContent = o, 1500);
        });
    }
}
function bookReel(btn) { alert(getTranslation('Booking consultation coming soon!')); }

// doToggle: called when clicking the overlay
function doToggle(overlay) {
    const video = overlay.previousElementSibling;
    if (!video || video.tagName !== 'VIDEO') return;
    if (video.paused) {
        // pause all others
        document.querySelectorAll('.reel-video').forEach(v => {
            if (v !== video) {
                v.pause();
                const o = v.nextElementSibling;
                if (o && o.classList.contains('play-overlay')) o.removeAttribute('data-playing');
            }
        });
        video.play().then(() => overlay.setAttribute('data-playing', '1')).catch(() => {});
    } else {
        video.pause();
        overlay.removeAttribute('data-playing');
    }
}

// Mute/unmute — called from button onclick="toggleMute(event)"
function toggleMute(e) {
    e.stopPropagation();
    const isMuted = !document.querySelector('.reel-video')?.muted;
    document.querySelectorAll('.reel-video').forEach(v => v.muted = isMuted);
    document.querySelectorAll('.mute-btn svg').forEach(svg => {
        svg.innerHTML = isMuted
            ? '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><line x1="23" y1="9" x2="17" y2="15"/><line x1="17" y1="9" x2="23" y2="15"/>'
            : '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/>';
    });
}

document.addEventListener('DOMContentLoaded', () => {
    switchLanguage(document.documentElement.lang || 'en');

    const feed = document.querySelector('.reels-feed');
    if (!feed) return;

    var scrollRAF = null;
    function getVisibleVideo() {
        var slides = document.querySelectorAll('.reel-slide');
        var best = null, bestRatio = 0, winH = window.innerHeight;
        for (var si = 0; si < slides.length; si++) {
            var slide = slides[si];
            var rect = slide.getBoundingClientRect();
            var visible = Math.min(rect.bottom, winH) - Math.max(rect.top, 0);
            var ratio = Math.max(0, visible / rect.height);
            if (ratio > bestRatio) { bestRatio = ratio; best = slide.querySelector('.reel-video'); }
        }
        return best;
    }

    function syncVideos() {
        var active = getVisibleVideo();
        if (!active) return;
        var videos = document.querySelectorAll('.reel-video');
        for (var vi = 0; vi < videos.length; vi++) {
            var v = videos[vi];
            var overlay = v.nextElementSibling;
            if (v === active) {
                if (v.paused) {
                    v.play()['catch'](function () {});
                }
                if (overlay && overlay.classList.contains('play-overlay')) overlay.setAttribute('data-playing', '1');
            } else {
                v.pause();
                if (overlay && overlay.classList.contains('play-overlay')) overlay.removeAttribute('data-playing');
            }
        }
    }

    // Throttle scroll handler with rAF
    feed.addEventListener('scroll', function () {
        if (!scrollRAF) {
            scrollRAF = requestAnimationFrame(function () {
                scrollRAF = null;
                syncVideos();
            });
        }
    }, { passive: true });

    // Initial sync — delay 500ms
    setTimeout(syncVideos, 500);
});
</script>
</main>

</body>
</html>
