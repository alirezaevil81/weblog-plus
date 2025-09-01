<x-layouts.layout class="min-h-screen flex items-center justify-center pb-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 md:p-10 rounded-2xl border border-slate-200/80 shadow-lg shadow-slate-300/30">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-slate-900">ورود به حساب کاربری</h2>
                <p class="mt-2 text-sm text-slate-600">
                    خوشحالیم که دوباره شما را می‌بینیم!
                </p>
            </div>
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">آدرس ایمیل</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">رمز عبور</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                        <label for="remember-me" class="mr-2 block text-sm text-slate-900">مرا به خاطر بسپار</label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            رمز عبور خود را فراموش کرده‌اید؟
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-indigo-700 transition-colors shadow-md shadow-indigo-500/40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        ورود
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    حساب کاربری ندارید؟
                    <a href="{{ route("register") }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        ثبت‌نام کنید
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.layout>