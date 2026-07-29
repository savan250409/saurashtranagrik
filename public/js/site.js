/* =========================================================================
   Site behaviour. No dependencies.
   The theme is applied by a tiny inline script in <head> so there is never a
   flash of the wrong theme; this file only handles the toggle afterwards.
   ========================================================================= */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    /* ---------------------------------------------------- theme toggle -- */
    (function theme() {
        var root = document.documentElement;
        var btns = document.querySelectorAll('.theme-toggle');
        if (!btns.length) return;

        function label() {
            var isDark = root.getAttribute('data-theme') === 'dark';
            btns.forEach(function (btn) {
                btn.setAttribute('aria-label', isDark ? 'Switch to light theme' : 'Switch to dark theme');
                btn.setAttribute('title', isDark ? 'Light mode' : 'Dark mode');
                btn.setAttribute('aria-pressed', String(isDark));
            });
        }

        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
                root.setAttribute('data-theme', next);
                try { localStorage.setItem('theme', next); } catch (e) { /* private mode */ }
                label();
            });
        });

        // follow the OS only while the visitor has not chosen explicitly
        var mq = window.matchMedia('(prefers-color-scheme: dark)');
        var onChange = function (e) {
            var stored = null;
            try { stored = localStorage.getItem('theme'); } catch (err) { /* ignore */ }
            if (stored) return;
            root.setAttribute('data-theme', e.matches ? 'dark' : 'light');
            label();
        };
        mq.addEventListener ? mq.addEventListener('change', onChange) : mq.addListener(onChange);

        label();
    })();

    /* ------------------------------------------------- mobile full menu -- */
    (function mobileNav() {
        var toggle = document.querySelector('.nav-toggle');
        var closeBtn = document.querySelector('.mobile-nav-close');
        var drawer = document.getElementById('mobile-nav');
        if (!toggle || !drawer) return;

        // stagger the link reveal purely via a CSS custom property
        Array.prototype.forEach.call(drawer.querySelectorAll('.mobile-nav-links a'), function (a, i) {
            a.style.setProperty('--i', i);
        });

        function setOpen(open) {
            drawer.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            document.body.style.overflow = open ? 'hidden' : '';
        }

        toggle.addEventListener('click', function () { setOpen(true); });
        if (closeBtn) closeBtn.addEventListener('click', function () { setOpen(false); });

        drawer.addEventListener('click', function (e) {
            if (e.target.tagName === 'A') setOpen(false);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
                setOpen(false);
                toggle.focus();
            }
        });

        // never leave the overlay open when it stops being the active nav
        window.matchMedia('(min-width: 1041px)').addEventListener('change', function (e) {
            if (e.matches) setOpen(false);
        });
    })();

    /* --------------------------------------------------- sticky header -- */
    (function stickyHeader() {
        var header = document.querySelector('.site-header');
        if (!header) return;
        var ticking = false;
        function update() {
            header.classList.toggle('is-stuck', window.scrollY > 8);
            ticking = false;
        }
        window.addEventListener('scroll', function () {
            if (!ticking) { ticking = true; window.requestAnimationFrame(update); }
        }, { passive: true });
        update();
    })();

    /* -------------------------------------------------------- accordion -- */
    (function accordion() {
        document.querySelectorAll('.accordion-trigger').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                var panel = document.getElementById(trigger.getAttribute('aria-controls'));
                if (!panel) return;
                var open = trigger.getAttribute('aria-expanded') === 'true';
                trigger.setAttribute('aria-expanded', String(!open));
                panel.classList.toggle('is-open', !open);
            });
        });
    })();

    /* ------------------------------------------------------ hero slider -- */
    (function hero() {
        var slider = document.querySelector('.hero-slider');
        if (!slider) return;

        var slides = Array.prototype.slice.call(slider.querySelectorAll('.hero-slide'));
        if (slides.length < 2) return;

        var dots = Array.prototype.slice.call(document.querySelectorAll('.hero-dots button'));
        var index = slides.findIndex(function (s) { return s.classList.contains('is-active'); });
        if (index < 0) index = 0;
        var timer = null;
        var DELAY = 6500;

        /* Slides past the first hold their URL in data-src. Swapping it in only
           when the slide is about to be shown keeps the initial page load to a
           single hero image instead of the whole carousel. */
        function load(i) {
            var img = slides[(i + slides.length) % slides.length].querySelector('img[data-src]');
            if (!img) return;
            img.src = img.getAttribute('data-src');
            img.removeAttribute('data-src');
        }

        function show(next) {
            next = (next + slides.length) % slides.length;
            if (next === index) return;
            load(next);
            load(next + 1); // stay one ahead so the next transition is instant
            slides[index].classList.remove('is-active');
            slides[index].setAttribute('aria-hidden', 'true');
            slides[next].classList.add('is-active');
            slides[next].setAttribute('aria-hidden', 'false');
            if (dots[index]) dots[index].setAttribute('aria-current', 'false');
            if (dots[next]) dots[next].setAttribute('aria-current', 'true');
            index = next;
        }

        load(index + 1);

        function start() {
            if (reduceMotion) return;
            stop();
            timer = window.setInterval(function () { show(index + 1); }, DELAY);
        }
        function stop() { if (timer) { window.clearInterval(timer); timer = null; } }

        dots.forEach(function (dot, i) {
            dot.addEventListener('click', function () { show(i); start(); });
        });

        var prev = document.querySelector('.hero-arrow--prev');
        var next = document.querySelector('.hero-arrow--next');
        if (prev) prev.addEventListener('click', function () { show(index - 1); start(); });
        if (next) next.addEventListener('click', function () { show(index + 1); start(); });

        slider.addEventListener('mouseenter', stop);
        slider.addEventListener('mouseleave', start);
        slider.addEventListener('focusin', stop);
        slider.addEventListener('focusout', start);

        document.addEventListener('visibilitychange', function () {
            document.hidden ? stop() : start();
        });

        var startX = null;
        slider.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; stop(); }, { passive: true });
        slider.addEventListener('touchend', function (e) {
            if (startX === null) return;
            var dx = e.changedTouches[0].clientX - startX;
            if (Math.abs(dx) > 45) show(index + (dx < 0 ? 1 : -1));
            startX = null;
            start();
        });

        start();
    })();

    /* ----------------------------------------------------- scroll reveal -- */
    (function reveal() {
        var targets = document.querySelectorAll('.reveal, .reveal-group');
        if (!targets.length) return;

        if (reduceMotion || !('IntersectionObserver' in window)) {
            targets.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        document.querySelectorAll('.reveal-group').forEach(function (group) {
            Array.prototype.forEach.call(group.children, function (child, i) {
                child.style.setProperty('--i', Math.min(i, 12));
            });
        });

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

        targets.forEach(function (el) { io.observe(el); });
    })();

    /* --------------------------------------------------- count-up stats -- */
    (function countUp() {
        var els = document.querySelectorAll('.stat-number[data-target]');
        if (!els.length) return;

        // The server already renders the correct final value (progressive
        // enhancement), so with reduced motion or no IntersectionObserver we
        // simply leave it alone - there is nothing left to do.
        if (reduceMotion || !('IntersectionObserver' in window)) return;

        function animate(el) {
            var target = parseFloat(el.getAttribute('data-target')) || 0;
            var suffix = el.getAttribute('data-suffix') || '';
            var duration = 1300;
            var start = null;
            el.textContent = '0' + suffix;

            function frame(ts) {
                if (start === null) start = ts;
                var p = Math.min((ts - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.round(target * eased) + suffix;
                if (p < 1) window.requestAnimationFrame(frame);
            }
            window.requestAnimationFrame(frame);
        }

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                animate(entry.target);
                io.unobserve(entry.target);
            });
        }, { threshold: 0.4 });

        els.forEach(function (el) { io.observe(el); });
    })();

    /* ----------------------------------------------------- card spotlight -- */
    (function spotlight() {
        if (reduceMotion || !finePointer) return;
        var SELECTOR = '.card--hover, .rate-row, .download-row';
        document.addEventListener('pointermove', function (e) {
            var el = e.target.closest(SELECTOR);
            if (!el) return;
            var r = el.getBoundingClientRect();
            el.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
            el.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100) + '%');
        }, { passive: true });
    })();

    /* ----------------------------------------------------- magnetic CTAs -- */
    (function magnetic() {
        if (reduceMotion || !finePointer) return;
        document.querySelectorAll('.btn-magnetic').forEach(function (btn) {
            btn.addEventListener('mousemove', function (e) {
                var r = btn.getBoundingClientRect();
                var x = (e.clientX - (r.left + r.width / 2)) * 0.3;
                var y = (e.clientY - (r.top + r.height / 2)) * 0.3;
                var max = 10;
                x = Math.max(-max, Math.min(max, x));
                y = Math.max(-max, Math.min(max, y));
                btn.style.transition = 'none';
                btn.style.transform = 'translate(' + x + 'px,' + y + 'px)';
            });
            btn.addEventListener('mouseleave', function () {
                btn.style.transition = 'transform .4s ' + getComputedStyle(document.documentElement).getPropertyValue('--ease');
                btn.style.transform = 'translate(0,0)';
            });
        });
    })();

    /* ------------------------------------------------------ video gallery -- */
    (function videos() {
        document.addEventListener('play', function (e) {
            if (e.target.tagName !== 'VIDEO') return;
            document.querySelectorAll('video').forEach(function (v) {
                if (v !== e.target) v.pause();
            });
        }, true);
    })();
})();
