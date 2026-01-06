<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | بلاگ‌پلاس</title>

    @vite("resources/css/app.css")

    <!-- Google Fonts: Vazirmatn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">
</head>
<body class="antialiased bg-slate-50">

    <div class="min-h-screen flex flex-col items-center justify-center text-center px-4">
        <div class="max-w-lg w-full">
            <div class="mb-8">
                <h1 class="text-8xl sm:text-9xl font-extrabold text-indigo-600 tracking-tighter">@yield('code')</h1>
                <h2 class="mt-4 text-2xl sm:text-3xl font-bold text-slate-900">@yield('title')</h2>
                <p class="mt-3 text-slate-600 text-base sm:text-lg">@yield('message')</p>
            </div>

            <a href="{{ app('router')->has('home') ? route('home') : url('/') }}"
               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 font-semibold tracking-wide shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
                </svg>
                <span>بازگشت به صفحه اصلی</span>
            </a>
        </div>
    </div>

</body>
</html>
