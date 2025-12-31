import './bootstrap';

document.addEventListener('livewire:navigated', () => {
    // --- Mobile Menu ---
    const mobileMenu = document.getElementById('mobile-menu');
    const openMenuBtn = document.getElementById('mobile-menu-button');
    const closeMenuBtn = document.getElementById('mobile-menu-close-button');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');

    const toggleMenu = () => {
        const isMenuOpen = !mobileMenu.classList.contains('hidden');
        openMenuBtn.setAttribute('aria-expanded', String(!isMenuOpen));

        if (isMenuOpen) {
            mobileMenu.classList.add('opacity-0');
            setTimeout(() => mobileMenu.classList.add('hidden'), 300);
        } else {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => mobileMenu.classList.remove('opacity-0'), 10);
        }
        if (openIcon && closeIcon) {
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }
    };

    openMenuBtn.addEventListener('click', toggleMenu);
    closeMenuBtn.addEventListener('click', toggleMenu);

    // --- Header Scroll Effect (FIXED) ---
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        const isScrolled = window.scrollY > 10;
        header.classList.toggle('shadow-md', isScrolled);
        header.classList.toggle('border-slate-200/80', isScrolled);
        header.classList.toggle('border-transparent', !isScrolled);
    });

    // --- Reveal on Scroll Animation ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {threshold: 0.1});

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});

document.addEventListener('livewire:navigated', function () {
    const header = document.getElementById('main-header');
    const headerLogo = document.getElementById('header-logo');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const mobileMenuPanel = document.getElementById('mobile-menu-panel');
    const openBtn = document.getElementById('mobile-menu-button');
    const closeBtn = document.getElementById('mobile-menu-close-button');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');
    const navLinks = document.querySelectorAll('#mobile-menu-panel a, #mobile-menu-panel button');

    // Header scroll effect
    window.addEventListener('scroll', function () {
        if (window.scrollY > 10) {
            header.classList.add('bg-white/90', 'backdrop-blur-lg', 'shadow-sm', 'border-b', 'border-slate-200/80');
        } else {
            header.classList.remove('bg-white/90', 'backdrop-blur-lg', 'shadow-sm', 'border-b', 'border-slate-200/80');
        }
    });

    function openMenu() {
        document.body.style.overflow = 'hidden';
        mobileMenuOverlay.classList.remove('opacity-0', 'pointer-events-none');
        mobileMenuPanel.classList.remove('translate-x-full');
        openIcon.classList.add('opacity-0', 'pointer-events-none');
        closeIcon.classList.remove('opacity-0', 'pointer-events-none');
        openBtn.setAttribute('aria-expanded', 'true');
        headerLogo.classList.add('opacity-0', 'pointer-events-none');
        openBtn.classList.add('opacity-0', 'pointer-events-none'); // Hide the button itself during transition
    }

    function closeMenu() {
        document.body.style.overflow = '';
        mobileMenuPanel.classList.add('translate-x-full');
        mobileMenuOverlay.classList.add('opacity-0', 'pointer-events-none');
        openIcon.classList.remove('opacity-0', 'pointer-events-none');
        closeIcon.classList.add('opacity-0', 'pointer-events-none');
        openBtn.setAttribute('aria-expanded', 'false');
        headerLogo.classList.remove('opacity-0', 'pointer-events-none');
        openBtn.classList.remove('opacity-0', 'pointer-events-none'); // Show the button itself after transition
    }

    openBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    mobileMenuOverlay.addEventListener('click', closeMenu);
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Prevent closing for dropdown-like behaviors if any
            if (link.closest('[role="menu"]') || link.tagName === 'BUTTON' && link.type === 'submit') {
                return;
            }
            closeMenu();
        });
    });
});

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Vazirmatn', 'sans-serif'],
            },
        },
    },
}