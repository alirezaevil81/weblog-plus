import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
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

    // --- Header Scroll Effect ---
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        const isScrolled = window.scrollY > 10;
        header.classList.toggle('shadow-md', isScrolled);
        header.classList.toggle('border-b', isScrolled);
        header.classList.toggle('border-slate-200/80', isScrolled);
    });

    // --- Reveal on Scroll Animation ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});