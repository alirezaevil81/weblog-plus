<x-layouts.layout :title="$post->title" class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12" :hero="true" :sidebar="true">
    <!-- Main Post Content -->
    <div class="lg:col-span-8">
        <div class="bg-white p-4 sm:p-6 md:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
            <!-- Post Header -->
            <div class="mb-6 md:mb-8 text-center">
                <span class="inline-block bg-indigo-100 text-indigo-800 text-xs sm:text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center justify-center flex-wrap gap-x-4 gap-y-2 mt-6 text-xs sm:text-sm text-slate-500">
                    <a href="{{ route('users.show', $post->user->name) }}" class="flex items-center group">
                        <img class="w-8 h-8 sm:w-10 sm:h-10 rounded-full me-3 object-cover group-hover:ring-2 group-hover:ring-indigo-500 transition-all" src="{{ $post->user->image }}" alt="آواتار {{ $post->user->name }}">
                        <span class="font-semibold text-slate-700 group-hover:text-indigo-600 transition-colors">نوشته {{ $post->user->name }}</span>
                    </a>
                    <span class="hidden sm:inline">&middot;</span>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        <span>{{ $post->updated_at->diffForHumans() }}</span>
                    </div>
                    <span class="hidden sm:inline">&middot;</span>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ $post->reading_time }}</span>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-6 md:mb-8">
                <img class="w-full h-auto rounded-xl object-cover shadow-lg" src="{{ $post->image }}" alt="تصویر شاخص پست">
            </div>

            <!-- Post Body with Typography plugin -->
            <article class="prose prose-base sm:prose-lg max-w-none prose-slate">{{ $post->body }}</article>

            <!-- Author Box -->
            <div class="mt-10 pt-6 border-t border-slate-200/80">
                <div class="flex items-center">
                    <a href="{{ route('users.show', $post->user->name) }}" class="flex-shrink-0">
                        <img class="w-14 h-14 sm:w-16 sm:h-16 rounded-full object-cover" src="{{ $post->user->image }}" alt="آواتار {{ $post->user->name }}">
                    </a>
                    <div class="ms-4">
                        <a href="{{ route('users.show', $post->user->name) }}" class="text-base sm:text-lg font-bold text-slate-900 hover:text-indigo-600 transition-colors">{{ $post->user->name }}</a>
                        <p class="text-slate-600 mt-1 text-xs sm:text-sm">{{ $post->user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comments Section -->
        <div id="comments" class="bg-white mt-8 p-4 sm:p-6 md:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-6">نظر خود را ثبت کنید</h3>

            <!-- New Comment Form -->
            <div class="mb-10">
                @auth
                    <form class="flex items-start gap-x-3">
                        <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover flex-shrink-0" src="{{ auth()->user()->image }}" alt="آواتار شما">
                        <div class="flex-1">
                            <textarea name="content" rows="4" class="w-full rounded-lg border border-slate-300 p-3 text-sm sm:text-base shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200" placeholder="نظر شما برای ما ارزشمند است..."></textarea>
                            <div class="mt-3 flex items-center justify-end">
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                                    ارسال نظر
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="bg-slate-50 border-r-4 border-slate-300 p-4 rounded-lg">
                        <p class="text-slate-800 text-sm sm:text-base">
                            برای ثبت نظر، لطفاً ابتدا
                            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:underline">وارد شوید</a>
                            یا
                            <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:underline">ثبت‌نام کنید</a>.
                        </p>
                    </div>
                @endauth
            </div>

            <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-6">نظرات ({{ $post->allComments->count() }})</h3>
            <!-- Comments List -->
            <div class="space-y-6">
                @foreach($post->comments as $comment)
                    <article class="flex items-start gap-x-3">
                        <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover flex-shrink-0" src="{{ $comment->user->image }}" alt="آواتار {{ $comment->user->name }}">
                        <div class="flex-1">
                            <div class="flex justify-between items-center mb-1">
                                <div>
                                    <span class="font-semibold text-slate-800 text-sm">{{ $comment->user->name }}</span>
                                    @if($post->user_id == $comment->user->id)
                                        <span class="ms-2 text-xs font-medium bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">نویسنده</span>
                                    @endif
                                    <p class="text-xs text-slate-500 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                <button class="flex items-center gap-x-1 text-xs font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6-6m-6 6l6 6" /></svg>
                                    <span>پاسخ</span>
                                </button>
                            </div>
                            <p class="text-slate-600 text-sm sm:text-base">{{ $comment->content }}</p>

                            @if($comment->replies->count() > 0)
                                <div class="mt-4 space-y-4 border-r border-slate-200 pr-4">
                                    @foreach($comment->replies as $reply)
                                        <article class="flex items-start gap-x-3">
                                            <img class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover flex-shrink-0" src="{{ $reply->user->image }}" alt="آواتار {{ $reply->user->name }}">
                                            <div class="flex-1">
                                                <div class="flex justify-between items-center mb-1">
                                                    <div>
                                                        <span class="font-semibold text-slate-800 text-sm">{{ $reply->user->name }}</span>
                                                        @if($post->user_id == $reply->user->id)
                                                            <span class="ms-2 text-xs font-medium bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">نویسنده</span>
                                                        @endif
                                                        <p class="text-xs text-slate-500 mt-1">{{ $reply->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                                <p class="text-slate-600 text-sm sm:text-base">{{ $reply->content }}</p>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.layout>
