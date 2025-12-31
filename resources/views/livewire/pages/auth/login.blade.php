<div class="min-h-screen flex items-center justify-center pb-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 md:p-10 rounded-2xl border border-slate-200/80 shadow-lg shadow-slate-300/30">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-slate-900">ورود به حساب کاربری</h2>
                <p class="mt-2 text-sm text-slate-600">
                    خوشحالیم که دوباره شما را می‌بینیم!
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

            <form wire:submit="login" class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">آدرس ایمیل</label>
                    <div class="mt-1">
                        <input wire:model.blur="form.email" dir="ltr" id="email" name="email" type="email" autocomplete="email"
                               value="{{ old('email') }}"
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">رمز عبور</label>
                    <div class="mt-1">
                        <input wire:model.blur="form.password" dir="ltr" id="password" name="password" type="password" autocomplete="current-password"
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input wire:model.blur="form.remember" id="remember-me" name="remember-me" type="checkbox"
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                        <label for="remember-me" class="mr-2 block text-sm text-slate-900">مرا به خاطر بسپار</label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            رمز عبور خود را فراموش کرده‌اید؟
                        </a>
                    </div>
                </div>

                <div class="flex justify-center pt-2">
                    <button wire:loading.attr="disabled" wire:target="login" type="submit"
                            class="group relative flex items-center justify-center min-w-35 bg-linear-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-600 text-white font-bold tracking-wide py-3 px-8 rounded-xl transition-all duration-300 shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 active:scale-95 disabled:opacity-70 disabled:cursor-wait disabled:active:scale-100 disabled:hover:translate-y-0">
                        <div wire:loading.remove wire:target="login" class="flex items-center gap-2">
                            <span>ورود</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 transition-transform group-hover:-translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                        </div>
                        <div wire:loading.flex wire:target="login" class="flex items-center gap-2">
                            <svg class="animate-spin size-5 text-white shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="whitespace-nowrap">در حال ورود...</span>
                        </div>
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    حساب کاربری ندارید؟
                    <a href="{{ route("register") }}" wire:navigate class="font-medium text-indigo-600 hover:text-indigo-500">
                        ثبت‌نام کنید
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>