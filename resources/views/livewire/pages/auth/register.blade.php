<div class="min-h-screen flex items-center justify-center pb-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 md:p-10 rounded-2xl border border-slate-200/80 shadow-lg shadow-slate-300/30">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-slate-900">ایجاد حساب کاربری جدید</h2>
                <p class="mt-2 text-sm text-slate-600">
                    برای دسترسی به تمام امکانات، ثبت‌نام کنید.
                </p>
            </div>

            <!-- Error Message Area -->
            @if($errors->any())
                <div id="error-container" class="bg-red-100 border space-y-1 border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    @foreach($errors->all() as $error)
                        <div class="flex">
                            <svg class="fill-current size-4 text-red-500 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zM11.414 10l2.829-2.829a1 1 0 0 0-1.414-1.414L10 8.586 7.172 5.757a1 1 0 0 0-1.414 1.414L8.586 10l-2.829 2.829a1 1 0 1 0 1.414 1.414L10 11.414l2.829 2.829a1 1 0 0 0 1.414-1.414L11.414 10z"/></svg>
                            <p id="error-message" class="font-bold text-xs">{{ $error }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            <form wire:submit="save" class="space-y-6" action="#" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">نام کامل</label>
                    <div class="mt-1">
                        <input wire:model.blur="form.name" id="name" name="name" type="text" autocomplete="name"
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">آدرس ایمیل</label>
                    <div class="mt-1">
                        <input wire:model.blur="form.email" id="email" name="email" type="email" autocomplete="email"
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">رمز عبور</label>
                    <div class="mt-1">
                        <input wire:model.blur="form.password" id="password" name="password" type="password" autocomplete="new-password"
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-slate-700">تکرار رمز عبور</label>
                    <div class="mt-1">
                        <input wire:model.blur="form.password_confirmation" id="confirm-password" name="confirm-password" type="password" autocomplete="new-password"
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div class="flex justify-center pt-2">
                    <button wire:loading.attr="disabled" wire:target="save" type="submit"
                            class="group relative flex items-center justify-center min-w-35 bg-linear-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-600 text-white font-bold tracking-wide py-3 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 active:scale-95 disabled:opacity-70 disabled:cursor-wait disabled:active:scale-100 disabled:hover:translate-y-0">
                        <div wire:loading.remove wire:target="save" class="flex items-center gap-2">
                            <span>ثبت نام</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 transition-transform group-hover:-translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                        </div>
                        <div wire:loading.flex wire:target="save" class="flex items-center gap-2">
                            <svg class="animate-spin size-5 text-white shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="whitespace-nowrap">در حال ثبت‌نام...</span>
                        </div>
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    قبلا ثبت‌نام کرده‌اید؟
                    <a href="{{ route("login") }}" wire:navigate class="font-medium text-indigo-600 hover:text-indigo-500">
                        وارد شوید
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>