@php
    use App\Models\Post;
    $persianNumbers = ['۱', '۲', '۳']; // Updated to only include 3 numbers
    $random_posts = Post::inRandomOrder()->select('title','slug')->take(3)->get(); // Changed to take 3 posts
@endphp
        <!-- Sidebar -->
<aside class="lg:col-span-4 mt-12 lg:mt-0">
    <div class="sticky top-28 space-y-8">
        <!-- Popular Posts -->
        <div class="reveal bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="text-xl font-bold text-slate-900 mb-6">پست‌های محبوب</h3>
            <ul class="space-y-5">
                @foreach($random_posts as $post)
                    <li class="flex items-center space-x-2 group">
                        <span class="text-2xl font-bold text-slate-300 group-hover:text-indigo-500 transition-colors">
                            {{ $persianNumbers[$loop->index] }}
                        </span>
                        <div>
                            <a href="{{ route("posts.show",$post->slug) }}"
                               class="font-semibold text-slate-800 group-hover:text-indigo-600 transition-colors leading-tight">
                                {{ $post->title }}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Newsletter -->
        <div class="reveal bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="text-xl font-bold text-slate-900 mb-4">عضویت در خبرنامه</h3>
            <p class="text-slate-600 text-sm mb-4">به ما بپیوندید تا جدیدترین مقالات را مستقیم در ایمیل خود دریافت
                کنید.</p>
            <form class="flex flex-col space-y-3">
                <input type="email" placeholder="ایمیل شما"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-500 transition outline-none">
                <button type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-2.5 rounded-lg hover:bg-indigo-700 transition-colors shadow-md shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    عضویت
                </button>
            </form>
        </div>
    </div>
</aside>
