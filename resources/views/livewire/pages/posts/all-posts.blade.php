<div class="lg:col-span-8">
    <div class="space-y-12">
        @if($posts)
            @foreach($posts as $post)
                <!-- Blog Post Card -->
                <div wire:key="post-{{ $post->id }}" class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 ease-in-out group hover:shadow-lg hover:shadow-slate-300/40">
                    <div class="overflow-hidden">
                        <img class="w-full h-52 sm:h-64 object-cover transition-transform duration-300 group-hover:scale-105"
                             src="{{ $post->image }}" alt="{{ $post->title }}">
                    </div>
                    <div class="p-6">
                        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs sm:text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                        <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3"><a
                                    href="{{ route('posts.show', $post->slug) }}"
                                    class="hover:text-indigo-600 transition-colors">{{ $post->title }}</a></h3>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-5 line-clamp-2">{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-y-4">
                            <a href="{{ route('users.show', $post->user->name) }}" class="flex items-center">
                                <img class="w-10 h-10 rounded-full me-3 object-cover" src="{{$post->user->image}}"
                                     alt="پروفایل">
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm">{{$post->user->name}}</p>
                                    <p class="text-xs text-slate-500">
                                        {{ $post->created_at->diffForHumans() }} &middot; {{ $post->reading_time }}</p>
                                </div>
                            </a>
                            <a href="{{ route('posts.show', $post->slug) }}"
                               class="w-full sm:w-auto inline-block text-center bg-indigo-500 text-white text-sm font-semibold px-4 py-2.5 rounded-lg hover:bg-indigo-600 transition-colors">مشاهده
                                پست</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination -->
            <div class="mt-12">
                {{$posts->links("pagination::custom")}}
            </div>
        @else
            <div class="flex flex-col items-center justify-center p-10 border-2 border-dashed border-gray-300 rounded-2xl bg-gray-50 text-center">
                <div class="bg-gray-200 p-4 rounded-full mb-4">
                    <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-700">محتوایی یافت نشد</h3>
                <p class="text-gray-500 mb-6">در حال حاضر هیچ پستی برای نمایش در این بخش وجود ندارد.</p>
                <button class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    ایجاد اولین پست
                </button>
            </div>
        @endif
    </div>

</div>
