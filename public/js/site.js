/* =========================================================================
   Site behaviour. No dependencies.
   ========================================================================= */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

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
        var SELECTOR = '.card--hover, .rate-card, .doc-card';
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

    /* ------------------------------------------------ branch roster tabs -- */
    (function roster() {
        var tablist = document.querySelector('.roster-tabs');
        if (!tablist) return;

        var tabs = Array.prototype.slice.call(tablist.querySelectorAll('.roster-tab'));
        var panels = Array.prototype.slice.call(document.querySelectorAll('.roster-panel'));
        // bail out rather than half-apply if the markup pairs up wrongly - the
        // CSS fallback then leaves every panel visible
        if (!tabs.length || tabs.length !== panels.length) return;

        function select(i, moveFocus) {
            tabs.forEach(function (tab, n) {
                var on = n === i;
                tab.setAttribute('aria-selected', String(on));
                tab.setAttribute('tabindex', on ? '0' : '-1');
                panels[n].classList.toggle('is-active', on);
            });
            if (moveFocus) {
                tabs[i].focus();
                // keep the chosen pill on screen when the bar scrolls sideways
                tabs[i].scrollIntoView({ block: 'nearest', inline: 'nearest' });
            }
        }

        tabs.forEach(function (tab, i) {
            tab.addEventListener('click', function () { select(i); });
            tab.addEventListener('keydown', function (e) {
                var next = null;
                if (e.key === 'ArrowRight') next = (i + 1) % tabs.length;
                else if (e.key === 'ArrowLeft') next = (i - 1 + tabs.length) % tabs.length;
                else if (e.key === 'Home') next = 0;
                else if (e.key === 'End') next = tabs.length - 1;
                if (next === null) return;
                e.preventDefault();
                select(next, true);
            });
        });

        // no scrollIntoView here: on load it could yank the page down to the tabs
        select(0);
    })();

    /* -------------------------------------------------- maturity explorer -- */
    (function maturity() {
        var group = document.querySelector('.maturity-chips');
        if (!group) return;

        var chips = Array.prototype.slice.call(group.querySelectorAll('.maturity-chip'));
        var cards = Array.prototype.slice.call(document.querySelectorAll('.maturity-card'));
        if (!chips.length || !cards.length) return;

        function select(index, moveFocus) {
            var amount = chips[index].getAttribute('data-amount');

            chips.forEach(function (chip, i) {
                var on = i === index;
                chip.setAttribute('aria-checked', String(on));
                chip.setAttribute('tabindex', on ? '0' : '-1');
            });

            cards.forEach(function (card) {
                var values = Array.prototype.slice.call(card.querySelectorAll('.maturity-value'));
                var matched = false;
                values.forEach(function (v) {
                    var on = v.getAttribute('data-amount') === amount;
                    v.classList.toggle('is-active', on);
                    if (on) matched = true;
                });
                // A term that does not offer this amount would otherwise render
                // blank; fall back to its first value, whose own label states
                // which amount it belongs to, so it can never mislead.
                if (!matched && values.length) values[0].classList.add('is-active');
            });

            if (moveFocus) chips[index].focus();
        }

        chips.forEach(function (chip, i) {
            chip.addEventListener('click', function () { select(i); });
            chip.addEventListener('keydown', function (e) {
                var next = null;
                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') next = (i + 1) % chips.length;
                else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') next = (i - 1 + chips.length) % chips.length;
                else if (e.key === 'Home') next = 0;
                else if (e.key === 'End') next = chips.length - 1;
                if (next === null) return;
                e.preventDefault();
                select(next, true);
            });
        });

        select(0);
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

    /* ----------------------------------------------------- PDF preview modal -- */
    (function pdfModal() {
        var modal = document.getElementById('pdf-modal');
        if (!modal) return;

        var iframe = modal.querySelector('.pdf-modal-iframe');
        var titleEl = modal.querySelector('.pdf-modal-title');
        var downloadBtn = modal.querySelector('.pdf-modal-download');
        var closeBtns = modal.querySelectorAll('.pdf-modal-close, .pdf-modal-backdrop');

        function openModal(url, title) {
            if (titleEl) titleEl.textContent = title || 'PDF Document';
            if (downloadBtn) {
                downloadBtn.href = url;
                var filename = url.split('/').pop().split('?')[0] || 'document.pdf';
                downloadBtn.setAttribute('download', decodeURIComponent(filename));
            }
            if (iframe) {
                iframe.src = url;
            }
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            if (iframe) {
                iframe.src = 'about:blank';
            }
        }

        document.addEventListener('click', function (e) {
            var link = e.target.closest('a[href]');
            if (!link) return;

            // If click is inside the modal itself (e.g. download button), let default link click happen
            if (link.closest('#pdf-modal')) {
                return;
            }

            var href = link.getAttribute('href');
            if (!href) return;

            var isPdf = /\.pdf($|\?)/i.test(href) || link.hasAttribute('download');

            if (isPdf) {
                e.preventDefault();
                
                var title = link.getAttribute('data-title') || link.innerText.trim() || link.getAttribute('title');
                if (title) {
                    title = title.replace(/\s+/g, ' ').trim();
                }
                if (!title || title.length > 80) {
                    var fileName = href.split('/').pop().split('?')[0];
                    title = decodeURIComponent(fileName).replace(/\.pdf$/i, '');
                }

                openModal(href, title);
            }
        });

        closeBtns.forEach(function (btn) {
            btn.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) {
                closeModal();
            }
        });
    })();
})();
