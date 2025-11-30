<header id="main-header" class="bg-transparent fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a id="header-logo" href="{{ route('home') }}" class="flex items-center space-x-2 rtl:space-x-reverse transition-opacity duration-300">
                <img src="{{ asset('favicon.ico') }}" alt="لوگو بلاگ‌پلاس" class="h-7 w-7">
                <span class="text-2xl font-extrabold text-slate-900">بلاگ‌پلاس</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-1 rtl:space-x-reverse">
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-slate-700 font-medium hover:bg-indigo-100 hover:text-indigo-600 transition-colors {{ request()->routeIs('home') ? 'bg-indigo-100 text-indigo-600' : '' }}">خانه</a>
                <a href="#" class="px-3 py-2 rounded-lg text-slate-700 font-medium hover:bg-indigo-100 hover:text-indigo-600 transition-colors {{ request()->routeIs('posts.index') ? 'bg-indigo-100 text-indigo-600' : '' }}">مقالات</a>
                <a href="#" class="px-3 py-2 rounded-lg text-slate-700 font-medium hover:bg-indigo-100 hover:text-indigo-600 transition-colors {{ request()->routeIs('about') ? 'bg-indigo-100 text-indigo-600' : '' }}">درباره ما</a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                @guest
                    <a href="{{ route('login') }}" class="hidden md:inline-block px-4 py-2 text-slate-700 font-medium hover:text-indigo-600 transition-colors">ورود</a>
                    <a href="{{ route('register') }}" class="hidden md:inline-block px-4 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all">ثبت‌نام</a>
                @endguest
                @auth
                    <!-- Profile Dropdown for Desktop -->
                    <div class="relative group hidden md:block">
                        <button type="button" class="p-1.5 rounded-full ring-2 ring-transparent group-hover:ring-indigo-500 transition-all" aria-label="پروفایل کاربر">
                            <img class="size-8 rounded-full" src="{{ auth()->user()->image }}" alt="آواتار {{ auth()->user()->name }}">
                        </button>
                        <div class="absolute top-full left-0 w-56 bg-white rounded-xl shadow-lg ring-1 ring-slate-900/5 origin-top-left transform opacity-0 scale-95 pointer-events-none group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto transition-all duration-200 focus:outline-none" role="menu">
                            <div class="p-1.5">
                                <div class="px-3 py-2 border-b border-slate-200/80 mb-1">
                                    <p class="text-sm text-slate-800 font-semibold truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="{{ route('users.show', auth()->user()->name) }}" class="flex items-center w-full px-3 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-md" role="menuitem">
                                    <svg class="h-5 w-5 me-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                                    <span>پروفایل من</span>
                                </a>
                                <div class="my-1 h-px bg-slate-200/80"></div>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-md" role="menuitem">
                                        <svg class="h-5 w-5 me-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                                        <span>خروج</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg text-slate-500 hover:bg-slate-100 transition-opacity duration-300" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">باز کردن منو</span>
                    <svg id="menu-open-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg id="menu-close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Panel -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-40 hidden"></div>
<div id="mobile-menu-panel" class="fixed top-0 right-0 bottom-0 w-full max-w-sm bg-white shadow-xl z-50 transition-transform duration-300 ease-in-out transform translate-x-full">
    <div class="p-6">
        <div class="flex justify-between items-center mb-10">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
                <img src="{{ asset('favicon.ico') }}" alt="لوگو بلاگ‌پلاس" class="h-7 w-7">
                <span class="text-2xl font-extrabold text-slate-900">بلاگ‌پلاس</span>
            </a>
            <button id="mobile-menu-close-button" class="p-2 text-slate-500" aria-label="بستن منو">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <nav id="mobile-nav-links" class="flex flex-col space-y-2">
            <a href="{{ route('home') }}" class="block text-lg font-semibold px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('home') ? 'bg-indigo-100 text-indigo-600' : 'text-slate-800 hover:bg-indigo-50' }}">خانه</a>
            <a href="#" class="block text-lg font-semibold px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('posts.index') ? 'bg-indigo-100 text-indigo-600' : 'text-slate-800 hover:bg-indigo-50' }}">مقالات</a>
            <a href="#" class="block text-lg font-semibold px-4 py-2.5 rounded-lg transition-colors {{ request()->routeIs('about') ? 'bg-indigo-100 text-indigo-600' : 'text-slate-800 hover:bg-indigo-50' }}">درباره ما</a>
        </nav>
        <div class="mt-8 pt-6 border-t border-slate-200">
            @guest
                <a href="{{ route('register') }}" class="w-full block text-center px-4 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all mb-3">ثبت‌نام</a>
                <a href="{{ route('login') }}" class="w-full block text-center px-4 py-2.5 bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 rounded-lg transition-colors">ورود</a>
            @endguest
            @auth
                <div class="bg-slate-50 rounded-lg p-4">
                    <div class="flex items-center mb-4">
                        <img class="size-12 rounded-full" src="{{ auth()->user()->image }}" alt="آواتار {{ auth()->user()->name }}">
                        <div class="ms-3">
                            <p class="text-base font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-slate-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <a href="{{ route('users.show', auth()->user()->name) }}" class="flex items-center w-full text-start font-semibold px-3 py-2 rounded-md text-slate-700 hover:bg-white hover:text-indigo-600 transition-colors">
                            <svg class="h-5 w-5 me-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                            <span>پروفایل من</span>
                        </a>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center w-full text-start font-semibold px-3 py-2 rounded-md text-red-600 hover:bg-red-100 transition-colors" role="menuitem">
                                <svg class="h-5 w-5 me-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                                <span>خروج</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
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
        mobileMenuOverlay.classList.remove('hidden');
        mobileMenuPanel.classList.remove('translate-x-full');
        openIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        openBtn.setAttribute('aria-expanded', 'true');
        headerLogo.classList.add('opacity-0', 'pointer-events-none');
        openBtn.classList.add('opacity-0', 'pointer-events-none');
    }

    function closeMenu() {
        document.body.style.overflow = '';
        mobileMenuPanel.classList.add('translate-x-full');
        setTimeout(() => {
            mobileMenuOverlay.classList.add('hidden');
        }, 300);
        openIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        openBtn.setAttribute('aria-expanded', 'false');
        headerLogo.classList.remove('opacity-0', 'pointer-events-none');
        openBtn.classList.remove('opacity-0', 'pointer-events-none');
    }

    openBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    mobileMenuOverlay.addEventListener('click', closeMenu);
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (link.getAttribute('aria-label') === 'بستن منو') {
                return;
            }
            closeMenu();
        });
    });
});
</script>
