<div class="mt-16">
    <h2 class="text-2xl font-bold text-slate-900 mb-8">دیدگاه‌ها ({{ $comments->count() }})</h2>

    {{-- Comment Form --}}
    @auth
        <div class="mb-12">
            <div class="flex items-start gap-4">
                <img src="{{ auth()->user()->image }}" alt="{{ auth()->user()->name }}" class="size-12 rounded-full object-cover">
                <div class="flex-1">
                    <form wire:submit.prevent="save" class="relative">
                        <textarea wire:model="body"
                                  class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 bg-slate-50 focus:bg-white focus:border-indigo-500 focus:ring-0 transition-all duration-200 text-slate-800 placeholder-slate-400"
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
    @else
        <div class="mb-12 p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
            <p class="text-slate-700 font-medium">برای ثبت دیدگاه، لطفاً ابتدا <a href="{{ route('login') }}" wire:navigate class="text-indigo-600 font-bold hover:underline">وارد شوید</a>.</p>
        </div>
    @endauth

    {{-- Comments List --}}
    <div class="space-y-8">
        @forelse($comments as $comment)
            <div wire:key="comment-{{ $comment->id }}" class="flex items-start gap-4">
                <img src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}" class="size-12 rounded-full object-cover">
                <div class="flex-1">
                    <div @class([
                        'border rounded-2xl p-5',
                        'bg-slate-50 border-slate-200' => $comment->is_approved,
                        'bg-amber-50 border-amber-200' => !$comment->is_approved,
                    ])>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <p class="font-bold text-slate-800">{{ $comment->user->name }}</p>
                                @if(!$comment->is_approved)
                                    <span class="px-2.5 py-1 text-xs font-semibold text-amber-800 bg-amber-200 rounded-full">در انتظار تایید</span>
                                @endif
                            </div>
                            <span class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-slate-600 leading-relaxed">{{ $comment->body }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-6 bg-slate-50 border border-slate-200 rounded-2xl text-center">
                <p class="text-slate-600 font-medium">هنوز هیچ دیدگاهی برای این پست ثبت نشده است. اولین نفر باشید!</p>
            </div>
        @endforelse
    </div>
</div>
