<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-slate-900">داشبورد مدیریت</h1>
        </div>

        {{-- Success Message --}}
        @if (session()->has('message'))
            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-2" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="font-medium">{{ session('message') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-200">
            <div class="p-6 text-slate-900">
                <h2 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <span class="flex items-center justify-center size-8 rounded-lg bg-amber-100 text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.172 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </span>
                    دیدگاه‌های در انتظار تایید
                </h2>

                @if($comments->isEmpty())
                    <div class="text-center py-12 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200">
                        <p class="text-slate-500 font-medium">هیچ دیدگاه جدیدی برای بررسی وجود ندارد.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-right text-slate-500">
                            <thead class="text-xs text-slate-700 uppercase bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th scope="col" class="px-6 py-4 rounded-tr-xl">کاربر</th>
                                    <th scope="col" class="px-6 py-4">دیدگاه</th>
                                    <th scope="col" class="px-6 py-4">پست مربوطه</th>
                                    <th scope="col" class="px-6 py-4">تاریخ</th>
                                    <th scope="col" class="px-6 py-4 rounded-tl-xl text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr wire:key="comment-row-{{ $comment->id }}" class="bg-white border-b border-slate-100 hover:bg-slate-50/50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <img class="size-8 rounded-full object-cover" src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}">
                                                {{ $comment->user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs truncate" title="{{ $comment->body }}">
                                            {{ \Illuminate\Support\Str::limit($comment->body, 50) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('posts.show', $comment->post->slug) }}" target="_blank" class="text-indigo-600 hover:underline truncate max-w-[150px] block">
                                                {{ $comment->post->title }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <button wire:click="approve({{ $comment->id }})"
                                                        wire:loading.attr="disabled"
                                                        class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="تایید">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                    </svg>
                                                </button>
                                                <button wire:click="delete({{ $comment->id }})"
                                                        wire:confirm="آیا از حذف این دیدگاه اطمینان دارید؟"
                                                        wire:loading.attr="disabled"
                                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $comments->links("pagination::custom") }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
