@props([
    'hero' => false,
    'sidebar' => false
])
<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth" data-theme="dark">
<x-layouts.head/>
<body class="antialiased">

<x-layouts.header/>
<main class="container mx-auto px-4 sm:px-6 lg:px-8 pt-24">
    @if($hero)
        <x-layouts.hero/>
    @endif
    <div {{ $attributes }} >
        <!-- Main Content -->
        {{ $slot }}
        @if($sidebar)
            <x-layouts.sidebar/>
        @endif
    </div>
</main>

@include("components.layouts.footer")

@vite("resources/js/app.js")
</body>
</html>
