<x-layouts.layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Dashboard Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-4 sm:mb-0">داشبورد مدیریت</h1>
            <a href="#" class="flex items-center bg-indigo-600 text-white font-semibold py-2.5 px-5 rounded-lg hover:bg-indigo-700 transition-colors shadow-md shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="h-5 w-5 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                ایجاد پست جدید
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1: Total Posts (FIXED ICON) -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">مجموع پست‌ها</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">۴۲</p>
                </div>
                <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                    </svg>
                </div>
            </div>
            <!-- Card 2: Total Views (FIXED ICON) -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">مجموع بازدیدها</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">۱۲,۴۵۰</p>
                </div>
                <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                </div>
            </div>
            <!-- Card 3: New Comments (Correct Icon) -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">نظرات جدید</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">۱۶</p>
                </div>
                <div class="bg-pink-100 text-pink-600 p-3 rounded-full">
                    <!-- Card 2: Total Views (FIXED ICON) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </div>
            </div>
            <!-- Card 4: Users (Correct Icon) -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">کاربران</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">۱۲۸</p>
                </div>
                <div class="bg-cyan-100 text-cyan-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </div>
            </div>
        </div>


        <!-- Main Chart & Recent Posts -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Chart -->
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                <h3 class="text-lg font-bold text-slate-800 mb-4">آمار بازدید هفته گذشته</h3>
                <div class="h-80 flex items-end justify-between px-4">
                    <div class="w-1/12 h-2/5 bg-indigo-200 rounded-t-lg" title="شنبه"></div>
                    <div class="w-1/12 h-3/5 bg-indigo-300 rounded-t-lg" title="یکشنبه"></div>
                    <div class="w-1/12 h-4/5 bg-indigo-400 rounded-t-lg" title="دوشنبه"></div>
                    <div class="w-1/12 h-3/5 bg-indigo-300 rounded-t-lg" title="سه‌شنبه"></div>
                    <div class="w-1/12 h-5/6 bg-indigo-500 rounded-t-lg" title="چهارشنبه"></div>
                    <div class="w-1/12 h-2/5 bg-indigo-200 rounded-t-lg" title="پنج‌شنبه"></div>
                    <div class="w-1/12 h-1/2 bg-indigo-300 rounded-t-lg" title="جمعه"></div>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
                <h3 class="text-lg font-bold text-slate-800 mb-4">آخرین پست‌ها</h3>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-4">
                        <img class="w-16 h-16 rounded-lg object-cover" src="https://placehold.co/100x100/6366f1/ffffff" alt="">
                        <div>
                            <a href="#" class="font-semibold text-slate-800 hover:text-indigo-600">آینده هوش مصنوعی</a>
                            <p class="text-sm text-slate-500">۱۰ روز پیش</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4">
                        <img class="w-16 h-16 rounded-lg object-cover" src="https://placehold.co/100x100/8b5cf6/ffffff" alt="">
                        <div>
                            <a href="#" class="font-semibold text-slate-800 hover:text-purple-600">راهنمای جامع React Hooks</a>
                            <p class="text-sm text-slate-500">۱۲ روز پیش</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-4">
                        <img class="w-16 h-16 rounded-lg object-cover" src="https://placehold.co/100x100/ec4899/ffffff" alt="">
                        <div>
                            <a href="#" class="font-semibold text-slate-800 hover:text-pink-600">طراحی رابط کاربری مدرن</a>
                            <p class="text-sm text-slate-500">۱۵ روز پیش</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.layout>