<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth" data-theme="dark">
@props([
    'hero' => false,
    'sidebar' => false,
    'title' => null
])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($title != null) ? "بلاگ‌پلاس | $title" : "بلاگ‌پلاس | مرکز دانش مدرن" }}</title>

    <!-- SEO & Social Meta Tags -->
    <meta name="description" content="بلاگ‌پلاس، مرکز دانش مدرن برای مقالات تکنولوژی، برنامه‌نویسی و طراحی.">
    <meta property="og:title" content="قالب وبلاگ کامل | بلاگ‌پلاس">
    <meta property="og:description"
          content="جدیدترین مقالات در حوزه تکنولوژی، برنامه‌نویسی و طراحی را در بلاگ‌پلاس بخوانید.">
    <meta property="og:image" content="https://placehold.co/1200x630/6366f1/ffffff?text=BlogPlus">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">

    @vite("resources/css/app.css")

    <!-- Google Fonts: Vazirmatn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    @livewireStyles
</head>


<body class="antialiased"
      x-data="{ showNotification: false, notificationMessage: '' }"
      @comment-added.window="
          notificationMessage = $event.detail[0];
          showNotification = true;
          setTimeout(() => showNotification = false, 5000);
      ">

<livewire:partials.header/>

<main class="container mx-auto px-4 sm:px-6 lg:px-8 pt-24">
    @if($hero)
        <x-layouts.partials.hero/>
    @endif
    @if($sidebar)
        <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12 lg:items-start">
            <!-- Main Content -->
            {{ $slot }}
            <x-layouts.partials.sidebar/>
        </div>
    @else
        <div>
            <!-- Main Content -->
            {{ $slot }}
        </div>
    @endif
</main>

<x-layouts.partials.footer/>

<!-- Notification Toast -->
<div x-show="showNotification"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="transform opacity-0 scale-95"
     x-transition:enter-end="transform opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="transform opacity-100 scale-100"
     x-transition:leave-end="transform opacity-0 scale-95"
     class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg"
     style="display: none;">
    <p x-text="notificationMessage"></p>
</div>

@livewireScripts
@vite("resources/js/app.js")
</body>
</html>
