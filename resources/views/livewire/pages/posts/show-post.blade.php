<div class="lg:col-span-8">
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200/80 shadow-sm">
        <!-- Post Header -->
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mb-4">{{ $post->title }}</h1>
            <div class="flex items-center gap-x-6 text-sm text-slate-500">
                <a href="{{ route('users.show', $post->user->name) }}" class="flex items-center gap-x-2">
                    <img class="w-10 h-10 rounded-full object-cover" src="{{$post->user->image}}" alt="پروفایل">
                    <span class="font-semibold text-slate-800">{{$post->user->name}}</span>
                </a>
                <span>{{ $post->created_at->diffForHumans() }}</span>
                <span>{{ $post->reading_time }}</span>
            </div>
        </div>

        <!-- Post Image -->
        <div class="mb-8">
            <img class="w-full rounded-2xl" src="{{ $post->image }}" alt="{{ $post->title }}">
        </div>

        <!-- Post Body -->
        <div class="prose prose-lg prose-slate max-w-none">
            {!! $post->body !!}
        </div>
    </div>

    <!-- Comments Section -->
    <livewire:pages.posts.post-comments :post="$post" :key="$post->id" />
</div>
