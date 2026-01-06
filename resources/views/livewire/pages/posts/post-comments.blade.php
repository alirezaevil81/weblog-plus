<div class="mt-16 pt-12 border-t border-slate-200">
    <h2 class="text-2xl font-extrabold text-slate-900 mb-8">دیدگاه‌ها</h2>

    {{-- Main Comment Form --}}
    @auth
        @if($replyToId === null)
            <div class="mb-16">
                <div class="flex items-start gap-4">
                    <img src="{{ auth()->user()->image }}" alt="{{ auth()->user()->name }}" class="size-12 rounded-full object-cover shrink-0">
                    <div class="flex-1">
                        <form wire:submit.prevent="save" class="relative">
                            <label for="main-comment" class="sr-only">دیدگاه شما</label>
                            <textarea wire:model="body" id="main-comment"
                                      class="w-full px-5 py-4 rounded-2xl border-2 border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-0 transition-all duration-200 text-slate-800 placeholder-slate-400"
                                      rows="4"
                                      placeholder="دیدگاه خود را بنویسید..."></textarea>
                            @error('body') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                        wire:loading.attr="disabled"
                                        class="flex items-center justify-center px-6 py-3 rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 font-semibold tracking-wide shadow-lg shadow-indigo-600/20 transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98] disabled:opacity-70 disabled:cursor-wait">
                                    <span wire:loading.remove wire:target="save">ارسال دیدگاه</span>
                                    <span wire:loading wire:target="save">در حال ارسال...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="mb-16 p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
            <p class="text-slate-700 font-medium">برای ثبت دیدگاه، لطفاً ابتدا <a href="{{ route('login') }}" wire:navigate class="text-indigo-600 font-bold hover:underline">وارد شوید</a>.</p>
        </div>
    @endauth

    {{-- Comments List --}}
    <div class="space-y-10">
        @forelse($comments as $comment)
            <x-pages.posts.comment-card :comment="$comment" :replyToId="$replyToId" />
        @empty
            <div class="p-8 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl text-center">
                <p class="text-slate-600 font-medium text-base">هنوز هیچ دیدگاهی برای این پست ثبت نشده است. اولین نفر باشید!</p>
            </div>
        @endforelse
    </div>
</div>
