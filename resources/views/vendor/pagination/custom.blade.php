@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="reveal flex items-center justify-center mt-16">
        {{-- دکمه صفحه قبلی --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 me-2 text-slate-400 bg-white border border-slate-300 rounded-lg cursor-not-allowed">&laquo; قبلی</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 me-2 text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 hover:shadow-md hover:-translate-y-0.5 transform transition-all duration-200">&laquo; قبلی</a>
        @endif

        {{-- المان‌های صفحه‌بندی (شماره صفحات و سه نقطه) --}}
        @foreach ($elements as $element)
            {{-- مدیریت سه نقطه (...) در صورت زیاد بودن تعداد صفحات --}}
            @if (is_string($element))
                <span class="px-4 py-2 mx-1 text-slate-500 bg-white border border-slate-300 rounded-lg cursor-default">{{ $element }}</span>
            @endif

            {{-- نمایش لینک شماره صفحات --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- استایل صفحه فعال --}}
                        <span aria-current="page" class="px-4 py-2 mx-1 text-white bg-indigo-600 rounded-lg shadow-md shadow-indigo-500/30">{{ $page }}</span>
                    @else
                        {{-- استایل صفحات دیگر --}}
                        <a href="{{ $url }}" class="px-4 py-2 mx-1 text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 hover:shadow-md hover:-translate-y-0.5 transform transition-all duration-200">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- دکمه صفحه بعدی --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 ms-2 text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 hover:shadow-md hover:-translate-y-0.5 transform transition-all duration-200">بعدی &raquo;</a>
        @else
            <span class="px-4 py-2 ms-2 text-slate-400 bg-white border border-slate-300 rounded-lg cursor-not-allowed">بعدی &raquo;</span>
        @endif
    </nav>
@endif
