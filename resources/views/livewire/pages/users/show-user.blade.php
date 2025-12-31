<!-- Main Content -->
<div class="lg:col-span-8">

    <!-- Profile Header -->
    <header class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 md:p-8 mb-12">
        <div class="flex flex-col md:flex-row items-center text-center md:text-start gap-6">
            <img src="{{ $user->image }}" alt="پروفایل {{ $user->name }}"
                 class="w-24 h-24 md:w-28 md:h-28 rounded-full border-4 border-white shadow-md flex-shrink-0">
            <div class="flex-1">
                <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">{{ $user->name }}</h1>
                <p class="text-slate-500 mt-2 text-sm sm:text-base leading-relaxed">{{ $user->bio }}</p>
                <div class="mt-4 flex items-center justify-center md:justify-start gap-x-6 text-sm text-slate-500">
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>عضو از {{ $user->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-1-5h.01"></path>
                        </svg>
                        <span>{{ $posts->total() }} پست</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- User's Posts -->
    <main>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">پست‌های منتشر شده</h2>

        @if($posts->count())
            <div class="space-y-12">
                @foreach($posts as $post)
                    <!-- Blog Post Card -->
                    <div wire:key="post-{{ $post->id }}"
                         class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="w-full h-52 sm:h-64 object-cover" src="{{ $post->image }}"
                                 alt="{{ $post->title }}">
                        </div>
                        <div class="p-6">
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-xs sm:text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3"><a
                                        href="{{ route("posts.show", $post->slug) }}"
                                        class="hover:text-indigo-600 transition-colors">{{ $post->title }}</a></h3>
                            <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-5 line-clamp-3">{{ \Illuminate\Support\Str::limit($post->body, 150) }}</p>
                            <div class="flex items-center justify-between mt-auto border-t border-slate-200/80 pt-5">
                                <p class="text-sm text-slate-500">
                                    {{ $post->created_at->diffForHumans() }} &middot; {{ $post->reading_time }}</p>
                                <a href="{{ route('posts.show', $post->slug) }}"
                                   class="inline-block bg-indigo-500 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-indigo-600 transition-colors">مشاهده
                                    پست</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $posts->links("pagination::custom") }}
            </div>
        @else
            <div class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm p-8 text-center">
                <p class="text-gray-500 text-lg">این کاربر هنوز پستی منتشر نکرده است.</p>
            </div>
        @endif
    </main>

</div>


