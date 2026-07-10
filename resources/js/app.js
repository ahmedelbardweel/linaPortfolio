import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// --- Dark Mode ---
(function () {
    const key = 'theme';
    const html = document.documentElement;

    function applyTheme(theme) {
        if (theme === 'dark') {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    }

    const saved = localStorage.getItem(key);
    if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        applyTheme('dark');
    }

    window.toggleDark = function () {
        const isDark = html.classList.contains('dark');
        applyTheme(isDark ? 'light' : 'dark');
        localStorage.setItem(key, isDark ? 'light' : 'dark');
    };
})();

// --- RTL / Language Toggle ---
(function () {
    const key = 'lang';
    const html = document.documentElement;

    function applyLang(lang) {
        html.setAttribute('lang', lang);
        html.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');
        if (lang === 'ar') {
            html.classList.add('rtl');
        } else {
            html.classList.remove('rtl');
        }
        document.querySelectorAll('.lang-btn').forEach(function (btn) {
            btn.textContent = lang === 'ar' ? 'AR' : 'EN';
        });
    }

    // On page load: restore from localStorage if not already set by server
    const saved = localStorage.getItem(key);
    if (saved === 'ar' && html.getAttribute('lang') !== 'ar') {
        applyLang('ar');
    }

    window.toggleLang = function () {
        const current = html.getAttribute('lang') || 'en';
        const next = current === 'ar' ? 'en' : 'ar';
        // If the page has a full switchLanguage function (with translations), use it
        if (typeof window.switchLanguage === 'function') {
            window.switchLanguage(next);
        } else {
            applyLang(next);
            localStorage.setItem(key, next);
            fetch(`/lang/${next}`).catch(function () {});
        }
    };
})();
