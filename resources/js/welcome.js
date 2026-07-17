var transCache = null, menuOpen = false;

document.addEventListener('click', function (e) {
    var t = e.target.closest('[data-click]');
    if (!t) return;
    var action = t.getAttribute('data-click');
    if (action === 'toggleDark') { toggleDark(); e.preventDefault(); }
    else if (action === 'toggleMenu') { toggleMobileMenu(); }
    else if (action === 'closeMenu') { closeMobileMenu(); }
    else if (action === 'switchLang') { switchLanguage(document.documentElement.lang === 'ar' ? 'en' : 'ar'); closeMobileMenu(); e.preventDefault(); }
    else if (action === 'closeStory') { closeWelcomeStory(e); }
    else if (action === 'openStory') { openWelcomeStory(t); }
    else if (action === 'stopPropagation') { e.stopPropagation(); }
});

function toggleDark() {
    var d = document.documentElement;
    d.classList.contains('dark') ? d.classList.remove('dark') : d.classList.add('dark');
    localStorage.setItem('theme', d.classList.contains('dark') ? 'dark' : 'light');
}

function toggleMobileMenu() {
    menuOpen = !menuOpen;
    requestAnimationFrame(function () {
        var menu = document.getElementById('mobileMenu'), oi = document.getElementById('menuIconOpen'), ci = document.getElementById('menuIconClose');
        if (!menu || !oi || !ci) return;
        if (menuOpen) { menu.classList.remove('hidden'); requestAnimationFrame(function () { menu.style.transform = 'translateY(0%)'; }); }
        else { menu.style.transform = 'translateY(-100%)'; setTimeout(function () { menu.classList.add('hidden'); }, 300); }
        oi.classList.toggle('hidden', menuOpen); ci.classList.toggle('hidden', !menuOpen);
    });
}

function closeMobileMenu() {
    menuOpen = false;
    requestAnimationFrame(function () {
        var menu = document.getElementById('mobileMenu'), oi = document.getElementById('menuIconOpen'), ci = document.getElementById('menuIconClose');
        if (!menu || !oi || !ci) return;
        menu.style.transform = 'translateY(-100%)'; setTimeout(function () { menu.classList.add('hidden'); }, 300);
        oi.classList.remove('hidden'); ci.classList.add('hidden');
    });
}

function switchLanguage(lang) {
    if (lang === 'ar') {
        if (transCache) { applyLanguage('ar', transCache); }
        else { fetch('/lang/ar.json').then(function (r) { return r.json(); }).then(function (d) { transCache = d; applyLanguage('ar', d); }).catch(function () { applyLanguage('ar', null); }); }
    } else { applyLanguage('en', null); }
}

function applyLanguage(lang, dict) {
    var keyEls = document.querySelectorAll('[data-translate-key]'), htmlEls = document.querySelectorAll('[data-translate-html]'), attrEls = document.querySelectorAll('[data-translate-attrs]'), langBtns = document.querySelectorAll('.lang-btn');
    requestAnimationFrame(function () {
        document.documentElement.lang = lang;
        if (lang === 'ar') { document.documentElement.dir = 'rtl'; document.documentElement.classList.add('rtl'); }
        else { document.documentElement.dir = 'ltr'; document.documentElement.classList.remove('rtl'); }
        keyEls.forEach(function (el) { var k = el.getAttribute('data-translate-key'), t = dict && dict[k] ? dict[k] : k; if (t.indexOf(':year') >= 0) { t = t.replace(':year', new Date().getFullYear()); } el.textContent = t; });
        htmlEls.forEach(function (el) { var k = el.getAttribute('data-translate-html'); el.innerHTML = dict && dict[k] ? dict[k] : k; });
        attrEls.forEach(function (el) { var pairs = el.getAttribute('data-translate-attrs').split(','); for (var pi = 0; pi < pairs.length; pi++) { var parts = pairs[pi].split(':'); el.setAttribute(parts[0], dict && dict[parts[1]] ? dict[parts[1]] : parts[1]); } });
        langBtns.forEach(function (btn) { btn.textContent = lang === 'ar' ? 'AR' : 'EN'; });
    });
    localStorage.setItem('lang', lang); fetch('/lang/' + lang).catch(function () {});
}

function openWelcomeStory(el) {
    var content = el.getAttribute('data-content'), title = el.getAttribute('data-title'), bg = el.getAttribute('data-bg') || '#1a1a1a', type = el.getAttribute('data-type'), image = el.getAttribute('data-image'), modal = document.getElementById('storyModal'), inner = document.getElementById('storyModalContent');
    if (!modal || !inner) return;
    if (type === 'text') { inner.innerHTML = '<svg class="w-10 h-10 mx-auto mb-4 opacity-60" style="color:#f53003" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg><p class="text-2xl font-medium text-white leading-relaxed">' + content + '</p>'; }
    else if (image) { inner.innerHTML = '<img src="' + image + '" alt="' + title + '" class="w-full h-full object-cover">'; }
    else { inner.innerHTML = '<svg class="w-16 h-16 mx-auto mb-4 opacity-50 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg><p class="text-lg text-white/80">' + content + '</p>'; }
    inner.style.background = bg; modal.style.opacity = '1'; modal.style.pointerEvents = 'auto'; document.body.style.overflow = 'hidden';
}

function closeWelcomeStory(e) {
    if (e && e.target !== e.currentTarget) return;
    var modal = document.getElementById('storyModal');
    if (!modal) return;
    modal.style.opacity = '0'; modal.style.pointerEvents = 'none'; document.body.style.overflow = '';
}

document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeWelcomeStory(); });

document.addEventListener('DOMContentLoaded', function () {
    if (window.innerWidth <= 768) return;
    var sectionIds = ['hero-section', 'about', 'portfolio', 'stories', 'tips', 'contact'], currentIndex = 0, isAnimating = false, items = {};
    sectionIds.forEach(function (id, i) { items[id] = document.querySelector('.island-item[data-target="' + id + '"]'); });
    var PAGE_CLASSES = ['page-active', 'page-enter-right', 'page-enter-left', 'page-exit-left', 'page-exit-right'];
    function clearPageClasses(el) { if (el) el.classList.remove.apply(el.classList, PAGE_CLASSES); }
    function goToSection(index) {
        if (index < 0 || index >= sectionIds.length || index === currentIndex || isAnimating) return;
        isAnimating = true; var prevIndex = currentIndex; currentIndex = index;
        var prev = document.getElementById(sectionIds[prevIndex]), next = document.getElementById(sectionIds[currentIndex]), isRtl = document.documentElement.dir === 'rtl';
        requestAnimationFrame(function () {
            sectionIds.forEach(function (id) { clearPageClasses(document.getElementById(id)); });
            if (index > prevIndex) { if (prev) prev.classList.add(isRtl ? 'page-exit-right' : 'page-exit-left'); if (next) next.classList.add(isRtl ? 'page-enter-left' : 'page-enter-right'); }
            else { if (prev) prev.classList.add(isRtl ? 'page-exit-left' : 'page-exit-right'); if (next) next.classList.add(isRtl ? 'page-enter-right' : 'page-enter-left'); }
        });
        setTimeout(function () {
            requestAnimationFrame(function () {
                sectionIds.forEach(function (id) { clearPageClasses(document.getElementById(id)); });
                if (next) next.classList.add('page-active');
                Object.values(items).forEach(function (i) { if (i) i.classList.remove('active'); });
                if (items[sectionIds[index]]) items[sectionIds[index]].classList.add('active');
                isAnimating = false;
            });
        }, 650);
    }
    document.querySelectorAll('.island-item').forEach(function (item) {
        item.addEventListener('click', function () { var idx = sectionIds.indexOf(this.getAttribute('data-target')); if (idx >= 0) goToSection(idx); });
    });
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var href = this.getAttribute('href'), id = href.substring(1), idx = sectionIds.indexOf(id);
            if (idx >= 0) { e.preventDefault(); goToSection(idx); }
            else if (id) { e.preventDefault(); var el = document.getElementById(id); if (el) el.scrollIntoView({ behavior: 'smooth' }); }
        });
    });
    requestAnimationFrame(function () {
        sectionIds.forEach(function (id) { clearPageClasses(document.getElementById(id)); });
        var first = document.getElementById(sectionIds[0]); if (first) first.classList.add('page-active');
        if (items[sectionIds[0]]) items[sectionIds[0]].classList.add('active');
    });
    document.body.style.overflow = 'hidden';
});
