<x-layouts.layout class="min-h-screen flex items-center justify-center pb-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 md:p-10 rounded-2xl border border-slate-200/80 shadow-lg shadow-slate-300/30">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-slate-900">ایجاد حساب کاربری جدید</h2>
                <p class="mt-2 text-sm text-slate-600">
                    برای دسترسی به تمام امکانات، ثبت‌نام کنید.
                </p>
            </div>
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="fullname" class="block text-sm font-medium text-slate-700">نام کامل</label>
                    <div class="mt-1">
                        <input id="fullname" name="fullname" type="text" autocomplete="name" required
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

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
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-slate-700">تکرار رمز عبور</label>
                    <div class="mt-1">
                        <input id="confirm-password" name="confirm-password" type="password" autocomplete="new-password" required
                               class="w-full px-4 py-2.5 rounded-lg border border-slate-300 placeholder-slate-400 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-indigo-700 transition-colors shadow-md shadow-indigo-500/40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        ثبت‌نام
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <p class="text-sm text-slate-600">
                    قبلا ثبت‌نام کرده‌اید؟
                    <a href="{{ route("login") }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        وارد شوید
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.layout>