<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($title != null) ? "بلاگ‌پلاس | $title" : "بلاگ‌پلاس | مرکز دانش مدرن" }}</title>

    <!-- SEO & Social Meta Tags -->
    <meta name="description" content="بلاگ‌پلاس، مرکز دانش مدرن برای مقالات تکنولوژی، برنامه‌نویسی و طراحی.">
    <meta property="og:title" content="قالب وبلاگ کامل | بلاگ‌پلاس">
    <meta property="og:description" content="جدیدترین مقالات در حوزه تکنولوژی، برنامه‌نویسی و طراحی را در بلاگ‌پلاس بخوانید.">
    <meta property="og:image" content="https://placehold.co/1200x630/6366f1/ffffff?text=BlogPlus">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">

    @vite("resources/css/app.css")

    <!-- Tailwind Config -->
    <script type="tailwind/config">
        module.exports = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Vazirmatn', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <!-- Google Fonts: Vazirmatn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style type="text/tailwindcss">

    </style>
</head>
