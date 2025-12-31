<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="w-full max-w-[480px]">
        <div class="bg-white p-8 sm:p-12 rounded-[2rem] border border-slate-200 shadow-2xl shadow-slate-200/60 relative overflow-hidden">

            <!-- Back Button -->
            <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('home') }}" wire:navigate
               class="absolute top-6 left-6 p-2.5 rounded-xl text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 z-10"
               aria-label="بازگشت به صفحه قبل"
               title="بازگشت">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>

            <!-- Header -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center size-16 rounded-2xl bg-indigo-50 text-indigo-600 mb-6 shadow-sm ring-1 ring-indigo-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-3">ساخت حساب جدید</h1>
                <p class="text-base text-slate-600 leading-relaxed">
                    به جمع ما بپیوندید و از امکانات استفاده کنید.
                </p>
            </div>

            <form wire:submit="save" class="space-y-7" action="#" method="POST">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-800 mb-2">نام کامل</label>
                        <div class="relative group">
                            <input wire:model.blur="form.name" id="name" name="name" type="text" autocomplete="name"
                                   class="w-full pl-4 pr-12 py-4 rounded-xl border-2 @error('form.name') border-red-300 bg-red-50 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @else border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:border-indigo-600 @enderror font-medium focus:bg-white focus:ring-0 transition-all duration-200 ease-in-out shadow-sm group-hover:border-slate-300">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none @error('form.name') text-red-500 @else text-slate-400 group-focus-within:text-indigo-600 @enderror transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </div>
                        @error('form.name')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1 animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-800 mb-2">آدرس ایمیل</label>
                        <div class="relative group">
                            <input wire:model.blur="form.email" dir="ltr" id="email" name="email" type="email" autocomplete="email"
                                   class="w-full pl-4 pr-12 py-4 rounded-xl border-2 @error('form.email') border-red-300 bg-red-50 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @else border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:border-indigo-600 @enderror font-medium focus:bg-white focus:ring-0 transition-all duration-200 ease-in-out shadow-sm group-hover:border-slate-300">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none @error('form.email') text-red-500 @else text-slate-400 group-focus-within:text-indigo-600 @enderror transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                        </div>
                        @error('form.email')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1 animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-slate-800 mb-2">رمز عبور</label>
                        <div class="relative group">
                            <input wire:model.blur="form.password" dir="ltr" id="password" name="password" type="password" autocomplete="new-password"
                                   class="w-full pl-4 pr-12 py-4 rounded-xl border-2 @error('form.password') border-red-300 bg-red-50 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @else border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:border-indigo-600 @enderror font-medium focus:bg-white focus:ring-0 transition-all duration-200 ease-in-out shadow-sm group-hover:border-slate-300">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none @error('form.password') text-red-500 @else text-slate-400 group-focus-within:text-indigo-600 @enderror transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                        </div>
                        @error('form.password')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1 animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="confirm-password" class="block text-sm font-bold text-slate-800 mb-2">تکرار رمز عبور</label>
                        <div class="relative group">
                            <input dir="ltr" wire:model.blur="form.password_confirmation" id="confirm-password" name="confirm-password" type="password" autocomplete="new-password"
                                   class="w-full pl-4 pr-12 py-4 rounded-xl border-2 @error('form.password_confirmation') border-red-300 bg-red-50 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @else border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:border-indigo-600 @enderror font-medium focus:bg-white focus:ring-0 transition-all duration-200 ease-in-out shadow-sm group-hover:border-slate-300">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none @error('form.password_confirmation') text-red-500 @else text-slate-400 group-focus-within:text-indigo-600 @enderror transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                        </div>
                        @error('form.password_confirmation')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1 animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <button wire:loading.attr="disabled" wire:target="save" type="submit"
                        class="w-full flex items-center justify-center py-4 px-6 rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 font-bold text-lg tracking-wide shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:translate-y-0">
                    <span wire:loading.remove wire:target="save">ایجاد حساب کاربری</span>
                    <div wire:loading.flex wire:target="save" class="flex items-center gap-3">
                        <svg class="animate-spin size-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>در حال پردازش...</span>
                    </div>
                </button>
            </form>

            <div class="mt-10 pt-6 border-t border-slate-100 text-center">
                <p class="text-slate-600 text-sm font-medium">
                    قبلاً ثبت‌نام کرده‌اید؟
                    <a href="{{ route("login") }}" wire:navigate class="inline-block font-bold text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-4 transition-all mr-1 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded px-1">
                        وارد شوید
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>