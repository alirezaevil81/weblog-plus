<x-layouts.layout :hero="true" :sidebar="true" class="grid grid-cols-1 lg:grid-cols-12 lg:gap-12">
    <div class="lg:col-span-8">
            <div class="space-y-12">
                @foreach($posts as $post)
                    <!-- Blog Post Card 1 -->
                    <div class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 ease-in-out group hover:shadow-lg hover:shadow-slate-300/40">
                        <div class="overflow-hidden">
                            <img class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" src="{{ $post->image }}" alt="{{ $post->title }}">
                        </div>
                        <div class="p-6 md:p-8">
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">{{ $post->category }}</span>
                            <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4"><a href="#" class="hover:text-indigo-600 transition-colors">{{ $post->title }}</a></h3>
                            <p class="text-slate-600 leading-relaxed mb-6 line-clamp-3">{{ \Illuminate\Support\Str::limit($post->body,30) }}</p>
                            <div class="flex items-center mt-auto">
                                <img class="w-12 h-12 rounded-full me-4 object-cover" src="{{$post->user->image}}" alt="پروفایل">
                                <div>
                                    <p class="font-semibold text-slate-800">{{$post->user->name}}</p>
                                    <p class="text-sm text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Blog Post Card 2 -->
                {{--
                            <div class="reveal bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 ease-in-out group hover:shadow-lg hover:shadow-slate-300/40">
                                <div class="overflow-hidden">
                                    <img class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" src="https://placehold.co/800x400/8b5cf6/ffffff?text=برنامه‌نویسی" alt="تصویر پست برنامه‌نویسی">
                                </div>
                                <div class="p-6 md:p-8">
                                    <span class="inline-block bg-purple-100 text-purple-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">برنامه‌نویسی</span>
                                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4"><a href="#" class="hover:text-purple-600 transition-colors">راهنمای جامع React Hooks</a></h3>
                                    <p class="text-slate-600 leading-relaxed mb-6 line-clamp-3">در این مقاله به بررسی کامل هوک‌های ری‌اکت می‌پردازیم و یاد می‌گیریم چگونه کدهای خوانا و بهینه‌تری بنویسیم.</p>
                                    <div class="flex items-center mt-auto">
                                        <img class="w-12 h-12 rounded-full me-4 object-cover" src="https://placehold.co/100x100/e2e8f0/334155?text=S" alt="آواتار سارا محمدی">
                                        <div>
                                            <p class="font-semibold text-slate-800">سارا محمدی</p>
                                            <p class="text-sm text-slate-500">۱۲ روز پیش &middot; ۸ دقیقه مطالعه</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                --}}
            </div>
            <!-- Pagination -->
            {{$posts->links("pagination::custom")}}
            {{--<nav class="reveal flex items-center justify-center mt-16" aria-label="Pagination">
                <a href="#" class="px-4 py-2 me-2 text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 hover:shadow-md hover:-translate-y-0.5 transform transition-all duration-200">&laquo; قبلی</a>
                <a href="#" aria-current="page" class="px-4 py-2 text-white bg-indigo-600 rounded-lg shadow-md shadow-indigo-500/30">1</a>
                <a href="#" class="px-4 py-2 ms-2 text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 hover:shadow-md hover:-translate-y-0.5 transform transition-all duration-200">بعدی &raquo;</a>
            </nav>--}}
        </div>
</x-layouts.layout>
