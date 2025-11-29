<x-layouts.layout :title="$user->name" :sidebar="true" class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12">

    <!-- Main Content -->
    <div class="lg:col-span-8">

        <!-- Profile Header -->
        <header class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 md:p-8 mb-12 flex flex-col sm:flex-row items-center text-center sm:text-right">
            <img src="{{ $user->image }}" alt="پروفایل {{ $user->name }}" class="w-28 h-28 md:w-36 md:h-36 rounded-full border-4 border-white shadow-lg mb-4 sm:mb-0 sm:ms-6 flex-shrink-0">
            <div class="flex-1">
                <h1 class="text-4xl font-extrabold text-slate-900">{{ $user->name }}</h1>
                <p class="text-slate-600 mt-3 leading-relaxed">{{ $user->bio }}</p>
                <p class="text-sm text-slate-500 mt-4">
                    عضو از {{ $user->created_at->diffForHumans() }}
                </p>
            </div>
        </header>

        <!-- User's Posts -->
        <main>
            <h2 class="text-2xl font-bold text-slate-800 mb-6">پست‌های منتشر شده توسط {{ $user->name }}</h2>

            @if($posts->count())
                <div class="space-y-12">
                    @foreach($posts as $post)
                        <!-- Blog Post Card -->
                        <div class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 ease-in-out group hover:shadow-lg hover:shadow-slate-300/40">
                            <div class="overflow-hidden">
                                <img class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" src="{{ $post->image }}" alt="{{ $post->title }}">
                            </div>
                            <div class="p-6 md:p-8">
                                <span class="inline-block bg-indigo-100 text-indigo-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                                <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4"><a href="{{ route("posts.show", $post->slug) }}" class="hover:text-indigo-600 transition-colors">{{ $post->title }}</a></h3>
                                <p class="text-slate-600 leading-relaxed mb-6 line-clamp-3">{{ \Illuminate\Support\Str::limit($post->body, 150) }}</p>
                                <div class="flex items-center mt-auto">
                                    <p class="text-sm text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16">
                    {{ $posts->links("pagination::custom") }}
                </div>
            @else
                <div class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm p-8 text-center">
                    <p class="text-gray-500 text-lg">این کاربر هنوز پستی منتشر نکرده است.</p>
                </div>
            @endif
        </main>

    </div>

</x-layouts.layout>