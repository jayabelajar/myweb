(() => {
    const initMobileMenu = () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconMenu = document.getElementById('icon-menu');
        const iconClose = document.getElementById('icon-close');

        if (!btn || !menu || !iconMenu || !iconClose) {
            return;
        }

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');

            if (menu.classList.contains('hidden')) {
                iconMenu.classList.remove('opacity-0', 'scale-75');
                iconMenu.classList.add('opacity-100', 'scale-100');

                iconClose.classList.remove('opacity-100', 'scale-100');
                iconClose.classList.add('opacity-0', 'scale-75');
            } else {
                iconMenu.classList.remove('opacity-100', 'scale-100');
                iconMenu.classList.add('opacity-0', 'scale-75');

                iconClose.classList.remove('opacity-0', 'scale-75');
                iconClose.classList.add('opacity-100', 'scale-100');
            }
        });

        const mobileLinks = menu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
                iconMenu.classList.remove('opacity-0', 'scale-75');
                iconMenu.classList.add('opacity-100', 'scale-100');
                iconClose.classList.remove('opacity-100', 'scale-100');
                iconClose.classList.add('opacity-0', 'scale-75');
            });
        });
    };

    const initReveal = () => {
        const items = Array.from(document.querySelectorAll('[data-reveal]'));
        if (!items.length) return;

        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReduced) {
            items.forEach(el => el.classList.add('is-visible'));
            return;
        }

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const delay = Number(el.getAttribute('data-reveal-delay')) || 0;
                setTimeout(() => el.classList.add('is-visible'), delay);
                io.unobserve(el);
            });
        }, { threshold: 0.25 });

        items.forEach(el => io.observe(el));
    };

    document.addEventListener('DOMContentLoaded', () => {
        initMobileMenu();
        initReveal();
    });
})();
