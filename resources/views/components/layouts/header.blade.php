<!-- Header -->
<header id="main-header" class="bg-white/90 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-1">
                <div class="bg-indigo-600 p-2 rounded-xl shadow-lg shadow-indigo-500/30">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v11.494m-5.747-5.747h11.494"/></svg>
                </div>
                <span class="text-2xl font-extrabold text-slate-900">بلاگ‌پلاس</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-i-2">
                <a href="{{ route("home") }}" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all">خانه</a>
                <a href="#" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all">مقالات</a>
                <a href="#" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all">درباره ما</a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center space-i-2">
                <a href="{{ route("login") }}" class="p-2 hidden md:block rounded-full text-slate-500 hover:bg-slate-100 transition-colors" aria-label="پروفایل">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </a>
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-full text-slate-500 hover:bg-slate-100" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">باز کردن منو</span>
                    <svg id="menu-open-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                    <svg id="menu-close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="hidden fixed inset-0 bg-white/95 backdrop-blur-sm z-[60] opacity-0">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col items-center justify-center text-center">
        <button id="mobile-menu-close-button" class="absolute top-7 right-6 p-2 text-slate-500" aria-label="بستن منو">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
        <nav class="flex flex-col space-y-8">
            <a href="#" class="text-3xl font-bold text-slate-800 hover:text-indigo-600 transition-colors">خانه</a>
            <a href="#" class="text-3xl font-bold text-slate-800 hover:text-indigo-600 transition-colors">مقالات</a>
            <a href="#" class="text-3xl font-bold text-slate-800 hover:text-indigo-600 transition-colors">درباره ما</a>
            <a href="#" class="text-3xl font-bold text-slate-800 hover:text-indigo-600 transition-colors">پروفایل</a>
        </nav>
    </div>
</div>