<footer class="bg-white border-t border-slate-200 mt-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Footer Top Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 py-16">

            {{-- About Section --}}
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
                    <img src="{{ asset('favicon.ico') }}" alt="لوگو بلاگ‌پلاس" class="size-7">
                    <span class="text-2xl font-extrabold text-slate-900">بلاگ‌پلاس</span>
                </a>
                <p class="text-sm text-slate-600 leading-relaxed">
                    بلاگ‌پلاس، مرکز دانش مدرن برای مقالات و آموزش‌های تخصصی در حوزه برنامه‌نویسی، طراحی و تکنولوژی.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h3 class="text-lg font-bold text-slate-900 mb-4">لینک‌های سریع</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">خانه</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">داشبورد</a></li>
                    {{-- Add more links as needed --}}
                </ul>
            </div>

            {{-- Legal Links --}}
            <div>
                <h3 class="text-lg font-bold text-slate-900 mb-4">اطلاعات قانونی</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">سیاست حفظ حریم خصوصی</a></li>
                    <li><a href="#" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">شرایط استفاده</a></li>
                </ul>
            </div>

            {{-- Newsletter --}}
            <div>
                <h3 class="text-lg font-bold text-slate-900 mb-4">عضویت در خبرنامه</h3>
                <p class="text-sm text-slate-600 mb-4">جدیدترین مقالات را مستقیم در ایمیل خود دریافت کنید.</p>
                <form class="flex">
                    <input type="email" placeholder="ایمیل شما" class="w-full px-4 py-3 rounded-r-xl border-2 border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-0 transition-all duration-200">
                    <button type="submit" class="px-5 py-3 bg-indigo-600 text-white font-semibold rounded-l-xl hover:bg-indigo-700 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-1">عضویت</button>
                </form>
            </div>

        </div>

        {{-- Footer Bottom Section --}}
        <div class="border-t border-slate-200 py-8 flex flex-col sm:flex-row items-center justify-between gap-6">
            <p class="text-sm text-slate-600">&copy; {{ date("Y") }} بلاگ‌پلاس. تمام حقوق محفوظ است.</p>

            {{-- Social Icons --}}
            <div class="flex items-center gap-5">
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors" aria-label="Twitter">
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                </a>
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors" aria-label="GitHub">
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.168 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" clip-rule="evenodd" /></svg>
                </a>
                {{-- Add more social icons as needed --}}
            </div>
        </div>
    </div>
</footer>
