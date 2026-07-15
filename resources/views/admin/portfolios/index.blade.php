@extends('admin.layouts.admin')

@section('title', __("Portfolio"))

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]" data-translate-key="Portfolio">{{ __("Portfolio") }}</h1>
        <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors" data-translate-key="Add New">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            {{ __("Add New") }}
        </a>
    </div>

    <div class="grid gap-3" style="grid-template-columns:repeat(auto-fill,minmax(160px,1fr))">
        @forelse ($portfolios as $portfolio)
            <div class="rounded-[3px] overflow-hidden bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] transition-transform duration-300 hover:-translate-y-1">
                <div class="aspect-[4/3] relative flex items-center justify-center overflow-hidden"
                    style="background:linear-gradient(135deg,#fdf6f0,#f5e6d3)">
                    @if ($portfolio->image_data || $portfolio->image_path)
                        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-12 h-12 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
                        </svg>
                    @endif
                    @if ($portfolio->gradient)
                        <div class="absolute bottom-2 left-2 w-6 h-6 rounded" style="background:{{ $portfolio->gradient }};border:2px solid white"></div>
                    @endif
                </div>
                <div class="p-3 max-w-full overflow-hidden">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="font-medium text-xs text-[#1b1b18] dark:text-[#EDEDEC] break-words max-w-[80%]">{{ $portfolio->title }}</h3>
                        <span class="text-[10px] text-[#706f6c] shrink-0">#{{ $portfolio->order }}</span>
                    </div>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] text-[11px] leading-relaxed break-words overflow-hidden max-h-[3.3em]">{{ $portfolio->description }}</p>
                    <div class="flex items-center justify-between mt-2 pt-2 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <form method="POST" action="{{ route('admin.portfolios.toggle', $portfolio) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-medium {{ $portfolio->is_active ? 'bg-green-100 text-green-700' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c]' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $portfolio->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                <span data-translate-key="{{ $portfolio->is_active ? 'Active' : 'Inactive' }}">{{ $portfolio->is_active ? __("Active") : __("Inactive") }}</span>
                            </button>
                        </form>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="inline-flex items-center justify-center w-7 h-7 rounded text-[#c42802] hover:text-[#f53003] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="{{ __("Edit") }}" data-translate-key="Edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}" class="inline" onsubmit="return confirm('{{ __("Are you sure?") }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-7 h-7 rounded text-red-600 hover:text-red-800 hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="{{ __("Delete") }}" data-translate-key="Delete">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-[#706f6c]">
                <svg class="w-12 h-12 mx-auto text-[#706f6c] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-sm" data-translate-key="No portfolio items yet.">{{ __("No portfolio items yet.") }}</p>
                <a href="{{ route('admin.portfolios.create') }}" class="mt-2 inline-block text-sm text-[#c42802] hover:text-[#f53003]" data-translate-key="Add your first portfolio item">{{ __("Add your first portfolio item") }}</a>
            </div>
        @endforelse
    </div>
@endsection
