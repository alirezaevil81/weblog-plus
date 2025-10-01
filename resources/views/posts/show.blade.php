<x-layouts.layout :title="$post->title" class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12" :hero="true" :sidebar="true">
    <!-- Main Post Content -->
    <div class="lg:col-span-8">
        <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
            <!-- Post Header -->
            <div class="mb-8">
                <span class="inline-block bg-indigo-100 text-indigo-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center mt-6 text-sm text-slate-500">
                    <img class="w-10 h-10 rounded-full me-3 object-cover" src="{{ $post->user->image }}" alt="Avatar of Ali Rezaei">
                    <span>نوشته <span class="font-semibold text-slate-700">{{ $post->user->name }}</span></span>
                    <span class="mx-2">&middot;</span>
                    <span>{{ $post->updated_at->diffForHumans() }}</span>
                    <span class="mx-2">&middot;</span>
                    <span>۵ دقیقه مطالعه</span>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-8">
                <img class="w-full h-auto rounded-xl object-cover" src="{{ $post->image }}" alt="Featured image for the post">
            </div>

            <!-- Post Body with Typography plugin -->
            <article class="prose prose-lg max-w-none">{{ $post->body }}</article>

            <!-- Author Box -->
            <div class="mt-12 pt-8 border-t border-slate-200/80">
                <div class="flex items-start space-x-4">
                    <img class="w-16 h-16 rounded-full object-cover" src="{{ $post->user->image }}" alt="Avatar of Ali Rezaei">
                    <div>
                        <h4 class="text-lg font-bold text-slate-900">{{ $post->user->name }}</h4>
                        <p class="text-slate-600 mt-1">{{ $post->user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comments Section with Replies -->
        <div id="comments" class="bg-white mt-8 p-6 md:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">نظرات ({{ $post->allComments->count() }})</h3>

            <!-- New Comment Form -->
            <div class="mb-10">
                <!-- Form content remains the same -->
            </div>

            <!-- Comments List -->
            <div class="space-y-8">
                <!-- Comment Thread 1 -->
                <div>
                    @foreach($post->comments as $comment)
                        <!-- Parent Comment -->
                        <article class="flex items-start space-x-2 @if(!$loop->first and !$loop->last) mt-8 pt-8 border-t-2 border-slate-200/80 @endif">
                            <img class="w-12 h-12 rounded-full object-cover flex-shrink-0" src="{{ $comment->user->image }}" alt="آواتار سارا محمدی">
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-1">
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $comment->user->name }} @if($post->user_id == $comment->user->id) <span class="ms-2 text-xs font-medium bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full">نویسنده</span> @endif </p>
                                        <p class="text-sm text-slate-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">پاسخ</button>
                                </div>
                                <p class="text-slate-600 bg-slate-50/80 p-4 rounded-lg">{{ $comment->content }}</p>
                            </div>
                        </article>

                        @if($comment->replies->count() > 0)
                            @foreach($comment->replies as $reply)
                                <!-- Reply to Comment 1 -->
                                <div class="mt-6 pr-10 lg:pr-14 border-r-2 border-slate-200">
                                    <article class="flex items-start space-x-2">
                                        <img class="w-12 h-12 rounded-full object-cover flex-shrink-0" src="{{ $reply->user->image }}" alt="آواتار علی رضایی">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center mb-1">
                                                <div>
                                                    <p class="font-semibold text-slate-800">{{ $reply->user->name }} @if($post->user_id == $reply->user->id) <span class="ms-2 text-xs font-medium bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full">نویسنده</span> @endif </p>
                                                    <p class="text-sm text-slate-500">{{ $reply->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            <p class="text-slate-600 bg-slate-50/80 p-4 rounded-lg">{{ $reply->content }}</p>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>


</x-layouts.layout>