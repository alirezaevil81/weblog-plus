<div x-data="{ menuOpen: false, scrolled: false }"
     @scroll.window="scrolled = (window.scrollY > 10)">
    <header :class="{'bg-white/90 backdrop-blur-lg shadow-sm border-slate-200/80': scrolled, 'border-transparent': !scrolled}"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}"
                   class="flex items-center space-x-2 rtl:space-x-reverse transition-opacity duration-300">
                    <img src="{{ asset('favicon.ico') }}" alt="لوگو بلاگ‌پلاس" class="size-7">
                    <span class="text-2xl font-extrabold text-slate-900">بلاگ‌پلاس</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-1 rtl:space-x-reverse">
                    @foreach($headerNav as $item)
                        @php $item = (object) $item; @endphp
                        <a href="{{ $item->href }}" wire:current.exact="!bg-indigo-100 !text-indigo-600" wire:navigate
                           class="px-3 py-2 mx-1 rounded-lg text-slate-700 font-medium hover:bg-indigo-100 hover:text-indigo-600 transition-colors ">{{ $item->name }}</a>
                    @endforeach
                </nav>

                <!-- Actions -->
                <div class="flex items-center h-full gap-4">
                    @guest
                        <a href="{{ route('login') }}" wire:navigate
                           class="hidden md:inline-block px-4 py-2 text-slate-700 font-medium hover:text-indigo-600 transition-colors">ورود</a>
                        <a href="{{ route('register') }}" wire:navigate
                           class="hidden md:inline-block px-4 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all">ثبت‌نام</a>
                    @endguest
                    @auth
                        <!-- Profile Dropdown for Desktop -->
                        <div class="relative group hidden md:flex items-center h-full">
                            <button type="button"
                                    class="flex items-center h-full">
                                <img class="size-9 rounded-full ring-2 ring-white group-hover:ring-indigo-200 transition-all" src="{{ auth()->user()->image }}"
                                     alt="آواتار {{ auth()->user()->name }}">
                            </button>

                            <div class="absolute top-full left-0 w-56 bg-white rounded-xl shadow-lg ring-1 ring-slate-900/5 origin-top-right transform opacity-0 scale-95 pointer-events-none group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto transition-all duration-300 ease-in-out focus:outline-none"
                                 role="menu">
                                <div class="p-1.5">
                                    <div class="px-3 py-2 border-b border-slate-200/80 mb-1">
                                        <p class="text-sm text-slate-800 font-semibold truncate">{{ auth()->user()->name }}</p>
                                        <p class="text-sm text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                    </div>
                                    @foreach($profileNav as $item)
                                        @php $item = (object) $item; @endphp
                                        <a href="{{ $item->href }}" wire:navigate
                                           class="flex items-center text-start w-full px-3 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-md"
                                           role="menuitem">
                                            <svg class="size-5 me-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                {!! $item->svg !!}
                                            </svg>
                                            <span>{{ $item->name }}</span>
                                        </a>
                                    @endforeach
                                    <div class="my-1 h-px bg-slate-200/80"></div>
                                    <button wire:click="logout" wire:loading.attr="disabled"
                                            class="group flex items-center w-full text-sm text-start px-3 py-2 rounded-md text-slate-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 disabled:opacity-70 disabled:cursor-wait"
                                            role="menuitem">

                                        <div wire:loading.remove wire:target="logout" class="flex items-center w-full">
                                            <svg class="size-5 me-3 text-slate-400 group-hover:text-red-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"/>
                                            </svg>
                                            <span class="font-medium">خروج</span>
                                        </div>

                                        <div wire:loading.flex wire:target="logout" class="flex items-center w-full text-red-600">
                                            <svg class="animate-spin size-5 me-3 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            <span class="font-medium whitespace-nowrap">در حال خروج...</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endauth

                    <button @click="menuOpen = !menuOpen"
                            class="md:hidden p-2 rounded-lg text-slate-500 hover:bg-slate-100 transition-opacity duration-300"
                            aria-controls="mobile-menu" :aria-expanded="menuOpen.toString()">
                        <span class="sr-only">باز کردن منو</span>
                        <svg x-show="!menuOpen" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="menuOpen" x-cloak class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Panel -->
    <div x-show="menuOpen" x-cloak
         x-transition:enter="transition-opacity ease-in-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in-out duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="menuOpen = false"
         class="fixed inset-0 bg-black/20 backdrop-blur-sm z-40"></div>

    <div x-show="menuOpen" x-cloak
         x-transition:enter="transition-transform ease-in-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition-transform ease-in-out duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 bottom-0 w-full max-w-sm bg-white shadow-xl z-50">
        <div class="p-6">
            <div class="flex justify-between items-center mb-10">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
                    <img src="{{ asset('favicon.ico') }}" alt="لوگو بلاگ‌پلاس" class="h-7 w-7">
                    <span class="text-2xl font-extrabold text-slate-900">بلاگ‌پلاس</span>
                </a>
                <button @click="menuOpen = false" class="p-2 text-slate-500" aria-label="بستن منو">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <nav class="flex flex-col space-y-2">
                @foreach($headerNav as $item)
                    @php $item = (object) $item; @endphp
                    <a href="{{ $item->href }}"  wire:navigate
                       class="block text-lg font-semibold px-4 py-2.5 rounded-lg transition-colors text-slate-800 hover:bg-indigo-50"
                       wire:current.exact="!bg-indigo-100 !text-indigo-600">{{ $item->name }}</a>
                @endforeach
            </nav>
            <div class="mt-8 pt-6 border-t border-slate-200">
                @guest
                    <a href="{{ route('register') }}" wire:navigate
                       class="w-full block text-center px-4 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all mb-3">ثبت‌نام</a>
                    <a href="{{ route('login') }}" wire:navigate
                       class="w-full block text-center px-4 py-2.5 bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 rounded-lg transition-colors">ورود</a>
                @endguest
                @auth
                    <div class="bg-slate-50 rounded-lg p-4">
                        <div class="flex items-center mb-4">
                            <img class="size-12 rounded-full" src="{{ auth()->user()->image }}"
                                 alt="آواتار {{ auth()->user()->name }}">
                            <div class="ms-3">
                                <p class="text-base font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-sm text-slate-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <a href="{{ route('users.show', auth()->user()->name) }}"
                               class="flex items-center w-full text-start font-semibold px-3 py-2 rounded-md text-slate-700 hover:bg-white hover:text-indigo-600 transition-colors">
                                <svg class="h-5 w-5 me-3 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                </svg>
                                <span>پروفایل من</span>
                            </a>
                            <button wire:click="logout" wire:loading.attr="disabled"
                                    class="group flex items-center w-full text-start font-semibold px-3 py-2 rounded-md text-slate-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 disabled:opacity-70"
                                    role="menuitem">

                                <div wire:loading.remove wire:target="logout" class="flex items-center w-full">
                                    <svg class="size-5 me-3 text-slate-400 group-hover:text-red-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15"/>
                                    </svg>
                                    <span>خروج</span>
                                </div>

                                <div wire:loading.flex wire:target="logout" class="flex items-center w-full text-red-600">
                                    <svg class="animate-spin size-5 me-3 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="font-medium whitespace-nowrap">در حال خروج...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
