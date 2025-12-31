@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between gap-6">

        {{-- Results Counter --}}
        <div class="hidden sm:block">
            <p class="text-sm font-medium text-slate-600">
                نمایش
                <span class="font-bold text-slate-800">{{ $paginator->firstItem() }}</span>
                تا
                <span class="font-bold text-slate-800">{{ $paginator->lastItem() }}</span>
                از
                <span class="font-bold text-slate-800">{{ $paginator->total() }}</span>
                نتیجه
            </p>
        </div>

        {{-- Pagination Links --}}
        <div class="flex items-center gap-3">
            {{-- Previous Page Button --}}
            <span>
                @if ($paginator->onFirstPage())
                    <span class="flex items-center justify-center size-11 text-sm font-semibold text-slate-400 bg-white border-2 border-slate-200 rounded-xl cursor-not-allowed shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                    </span>
                @else
                    <button type="button"
                            wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            class="flex items-center justify-center size-11 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl shadow-sm transition-all duration-200 hover:bg-slate-50 hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2"
                            aria-label="{{ __('pagination.previous') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                    </button>
                @endif
            </span>

            {{-- Mobile Pagination Summary --}}
            <div class="sm:hidden">
                <span class="px-4 py-2.5 text-sm font-bold rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/30">
                    صفحه {{ $paginator->currentPage() }}
                </span>
            </div>

            {{-- Desktop Pagination Elements --}}
            <div class="hidden sm:flex items-center gap-2">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="inline-flex items-center justify-center size-11 text-sm font-bold text-slate-500 bg-white border-2 border-slate-200 rounded-xl shadow-sm cursor-default">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                @if ($page == $paginator->currentPage())
                                    <span class="inline-flex items-center justify-center size-11 text-sm font-bold rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/30"
                                          aria-current="page">{{ $page }}</span>
                                @else
                                    <button type="button"
                                            wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                            wire:loading.attr="disabled"
                                            class="inline-flex items-center justify-center size-11 text-sm font-bold bg-white text-slate-700 border-2 border-slate-200 rounded-xl shadow-sm transition-all duration-200 hover:bg-slate-50 hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2"
                                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </button>
                                @endif
                            </span>
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Button --}}
            <span>
                @if ($paginator->hasMorePages())
                    <button type="button"
                            wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            class="flex items-center justify-center size-11 text-sm font-bold text-slate-700 bg-white border-2 border-slate-200 rounded-xl shadow-sm transition-all duration-200 hover:bg-slate-50 hover:border-slate-300 hover:shadow-md hover:-translate-y-0.5 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:ring-offset-2"
                            aria-label="{{ __('pagination.next') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
                    </button>
                @else
                    <span class="flex items-center justify-center size-11 text-sm font-semibold text-slate-400 bg-white border-2 border-slate-200 rounded-xl cursor-not-allowed shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
                    </span>
                @endif
            </span>
        </div>
    </nav>
@endif
