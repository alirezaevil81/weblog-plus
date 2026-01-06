@props(['comment', 'replyToId'])

<div wire:key="comment-{{ $comment->id }}" class="flex items-start gap-4">
    <img src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}" class="size-12 rounded-full object-cover shrink-0">
    <div class="flex-1">
        <div @class([
            'border rounded-2xl p-5 relative',
            'bg-white border-slate-200' => $comment->is_approved,
            'bg-amber-50 border-amber-300' => !$comment->is_approved,
        ])>
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <p class="font-bold text-slate-900">{{ $comment->user->name }}</p>
                    @if(!$comment->is_approved)
                        <span class="px-3 py-1 text-xs font-semibold text-amber-800 bg-amber-200 rounded-full">در انتظار تایید</span>
                    @endif
                </div>
                <span class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-slate-700 leading-relaxed text-base">{{ $comment->body }}</p>
        </div>

        <div class="mt-3 flex items-center gap-4">
            @auth
                <button wire:click="setReplyTo({{ $comment->id }})" type="button" class="flex items-center gap-1.5 text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>
                    <span>پاسخ</span>
                </button>
            @endauth
            @if($replyToId === $comment->id)
                <button wire:click="setReplyTo(null)" type="button" class="flex items-center gap-1.5 text-sm font-bold text-red-500 hover:text-red-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    <span>لغو</span>
                </button>
            @endif
        </div>

        {{-- Reply Form --}}
        @if($replyToId === $comment->id)
            <div class="mt-4" x-data="{}" x-init="$nextTick(() => $refs.replyInput.focus())">
                <form wire:submit.prevent="save" class="relative">
                    <label for="reply-comment-{{ $comment->id }}" class="sr-only">پاسخ شما</label>
                    <textarea wire:model="body" x-ref="replyInput" id="reply-comment-{{ $comment->id }}"
                              class="w-full px-5 py-4 rounded-2xl border-2 border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-0 transition-all duration-200 text-slate-800 placeholder-slate-400"
                              rows="3"
                              placeholder="پاسخ خود را بنویسید..."></textarea>
                    @error('body') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                                wire:loading.attr="disabled"
                                class="flex items-center justify-center px-5 py-2.5 rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 font-semibold tracking-wide shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98] disabled:opacity-70 disabled:cursor-wait">
                            <span wire:loading.remove wire:target="save">ارسال پاسخ</span>
                            <span wire:loading wire:target="save">در حال ارسال...</span>
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- Replies --}}
        @if($comment->replies->isNotEmpty())
            <div class="mt-8 pl-8 border-r-2 border-slate-200 space-y-8">
                @foreach($comment->replies as $reply)
                    <x-pages.posts.comment-card :comment="$reply" :replyToId="$replyToId" />
                @endforeach
            </div>
        @endif
    </div>
</div>
