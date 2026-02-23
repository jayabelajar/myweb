(() => {
    const initMarquee = () => {
        const marquee = document.getElementById('testi-marquee');
        const track = marquee ? marquee.querySelector('.testi-track') : null;
        if (!track) return;

        const items = Array.from(track.children);
        items.forEach(item => track.appendChild(item.cloneNode(true)));

        const update = () => {
            const halfWidth = track.scrollWidth / 2;
            if (halfWidth <= 0) return;
            track.style.setProperty('--marquee-distance', `-${halfWidth}px`);
            const pxPerSec = 40;
            const duration = Math.max(20, halfWidth / pxPerSec);
            track.style.setProperty('--marquee-duration', `${duration}s`);
        };

        let resizeTimer = null;
        const onResize = () => {
            if (resizeTimer) clearTimeout(resizeTimer);
            resizeTimer = setTimeout(update, 150);
        };

        update();
        window.addEventListener('resize', onResize);
    };

    const initStats = () => {
        const stats = Array.from(document.querySelectorAll('[data-stat]'));
        if (!stats.length) return;

        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const animateNumber = (el, to, suffix, duration = 1200) => {
            const start = performance.now();
            const from = 0;
            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const value = Math.round(from + (to - from) * (progress * (2 - progress)));
                el.textContent = `${value}${suffix || ''}`;
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    el.style.animation = 'stat-pop 400ms ease';
                }
            };
            requestAnimationFrame(step);
        };

        const reveal = (card, i) => {
            const numberEl = card.querySelector('[data-count]');
            if (numberEl && !card.dataset.animated) {
                card.dataset.animated = 'true';
                setTimeout(() => {
                    card.classList.add('is-visible');
                    if (prefersReduced) {
                        const to = Number(numberEl.getAttribute('data-count')) || 0;
                        const suffix = numberEl.getAttribute('data-suffix') || '';
                        numberEl.textContent = `${to}${suffix}`;
                    } else {
                        animateNumber(
                            numberEl,
                            Number(numberEl.getAttribute('data-count')) || 0,
                            numberEl.getAttribute('data-suffix') || '',
                            1100
                        );
                    }
                }, i * 120);
            }
        };

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const idx = stats.indexOf(entry.target);
                    reveal(entry.target, idx >= 0 ? idx : 0);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.35 });

        stats.forEach((card, i) => {
            if (prefersReduced) {
                reveal(card, i);
            } else {
                io.observe(card);
            }
        });
    };

    window.addEventListener('load', () => {
        initMarquee();
        initStats();
    });
})();
