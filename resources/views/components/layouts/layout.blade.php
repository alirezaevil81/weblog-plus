@props([
    'hero' => false,
    'sidebar' => false,
    'title' => null
])
<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth" data-theme="dark">
<x-layouts.partials.head :title="$title"/>
<body class="antialiased">

<x-layouts.partials.header/>
<main class="container mx-auto px-4 sm:px-6 lg:px-8 pt-24">
    @if($hero)
        <x-layouts.partials.hero/>
    @endif
    <div {{ $attributes }} >
        <!-- Main Content -->
        {{ $slot }}
        @if($sidebar)
            <x-layouts.partials.sidebar/>
        @endif
    </div>
</main>

<x-layouts.partials.footer/>

@vite("resources/js/app.js")
</body>
</html>
