<x-layouts.layout :hero="true" :sidebar="true" class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12">
    <div class="lg:col-span-8">
        <div class="space-y-12">
            @foreach($posts as $post)
                <!-- Blog Post Card -->
                <div class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 ease-in-out group hover:shadow-lg hover:shadow-slate-300/40">
                    <div class="overflow-hidden">
                        <img class="w-full h-52 sm:h-64 object-cover transition-transform duration-300 group-hover:scale-105" src="{{ $post->image }}" alt="{{ $post->title }}">
                    </div>
                    <div class="p-6">
                        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs sm:text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                        <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3"><a href="{{ route('posts.show', $post->slug) }}" class="hover:text-indigo-600 transition-colors">{{ $post->title }}</a></h3>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-5 line-clamp-2">{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-y-4">
                            <a href="{{ route('users.show', $post->user->name) }}" class="flex items-center">
                                <img class="w-10 h-10 rounded-full me-3 object-cover" src="{{$post->user->image}}" alt="پروفایل">
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm">{{$post->user->name}}</p>
                                    <p class="text-xs text-slate-500">{{ $post->created_at->diffForHumans() }} &middot; {{ $post->reading_time }}</p>
                                </div>
                            </a>
                            <a href="{{ route('posts.show', $post->slug) }}" class="w-full sm:w-auto inline-block text-center bg-indigo-500 text-white text-sm font-semibold px-4 py-2.5 rounded-lg hover:bg-indigo-600 transition-colors">مشاهده پست</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="mt-12">
            {{$posts->links("pagination::custom")}}
        </div>
    </div>
</x-layouts.layout>
