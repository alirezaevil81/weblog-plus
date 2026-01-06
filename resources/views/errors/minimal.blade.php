<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite("resources/css/app.css")

        <!-- Google Fonts: Vazirmatn -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap"
              rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center text-center px-4 bg-slate-50">
            <div class="max-w-lg w-full">
                <div class="mb-8">
                    <h1 class="text-6xl font-extrabold text-indigo-600 tracking-tighter">@yield('code')</h1>
                    <p class="mt-3 text-slate-600 text-lg">@yield('message')</p>
                </div>

                <a href="{{ app('router')->has('home') ? route('home') : url('/') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 font-semibold transition-colors">
                    <span>بازگشت به خانه</span>
                </a>
            </div>
        </div>
    </body>
</html>
