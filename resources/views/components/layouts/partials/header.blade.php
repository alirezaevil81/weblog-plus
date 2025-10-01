<!-- Header -->
<header id="main-header" class="bg-white/90 backdrop-blur-lg fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-transparent">
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
            <nav class="hidden md:flex items-center space-x-0">
                <a href="{{ route("home") }}" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all">خانه</a>
                <a href="#" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all">مقالات</a>
                <a href="#" class="px-4 py-2 rounded-lg text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-all">درباره ما</a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center space-x-2">
                @guest
                    <a href="{{ route("login") }}" class="p-2 hidden md:block rounded-full text-slate-500 hover:bg-slate-100 transition-colors" aria-label="پروفایل">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </a>
                @endguest
                @auth
                    <!-- Profile Dropdown -->
                    <div class="relative hidden md:block group">
                        <button type="button" class="p-2" aria-label="پروفایل کاربر" aria-haspopup="true">
                            <img class="size-7 rounded-full group-hover:shadow-indigo-600 group-hover:shadow-md duration-200 transform ease-in-out transition-all" src="{{ auth()->user()->image }}" alt="" srcset="">
                        </button>

                        <!-- Dropdown Panel -->
                        <div class="absolute top-full left-0 w-56 bg-white rounded-xl shadow-lg ring-1 ring-slate-900/5 origin-top-left
                            transform opacity-0 scale-95 pointer-events-none group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto
                            transition ease-in-out duration-200
                            focus:outline-none"
                             role="menu" aria-orientation="vertical">
                            <div class="p-1" role="none">
                                <!-- User Info -->
                                <div class="px-3 py-2 border-b border-slate-200/80 mb-1">
                                    <p class="text-sm text-slate-800 font-semibold truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <!-- Menu Items -->
                                <a href="{{ route("dashboard") }}" class="flex items-center w-full px-3 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md" role="menuitem">
                                    <svg class="h-5 w-5 me-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                                    <span>پروفایل من</span>
                                </a>
                                <a href="#" class="flex items-center w-full px-3 py-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md" role="menuitem">
                                    <svg class="h-5 w-5 me-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" /></svg>
                                    <span>تنظیمات</span>
                                </a>
                                <!-- Separator -->
                                <div class="my-1 h-px bg-slate-200/80"></div>
                                <!-- Logout -->
                                <form method="post" action="{{ route("logout") }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 rounded-md" role="menuitem">
                                        <svg class="h-5 w-5 me-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" /></svg>
                                        <span>خروج</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

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