<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth" data-theme="dark">
@include("layouts.head")
<body class="antialiased">

@include("layouts.header")

<main class="container mx-auto px-4 sm:px-6 lg:px-8 pt-24">
    @includeWhen(isset($hero),"layouts.hero")
    <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12">
        <!-- Main Content -->
        @yield('content')
        @include("layouts.sidebar")
    </div>
</main>

@include("layouts.footer")

@vite("resources/js/app.js")
</body>
</html>
