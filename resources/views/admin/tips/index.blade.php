@extends('admin.layouts.admin')

@section('title', __("Tips & Insights"))

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]" data-translate-key="Tips & Insights">{{ __("Tips & Insights") }}</h1>
        <a href="{{ route('admin.tips.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors" data-translate-key="Add New">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            {{ __("Add New") }}
        </a>
    </div>

    <div class="grid gap-3" style="grid-template-columns:repeat(auto-fill,minmax(160px,1fr))">
        @forelse ($tips as $tip)
            <div class="rounded-[3px] p-4 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] transition-transform duration-300 hover:-translate-y-1 flex flex-col overflow-hidden max-w-full">
                <div class="flex items-center justify-between mb-2">
                    <span class="inline-block px-2 py-0.5 rounded text-[10px] font-medium text-white" style="background:#f53003">{{ $tip->category ?? __("Uncategorized") }}</span>
                    <span class="text-[10px] text-[#706f6c] shrink-0">#{{ $tip->order }}</span>
                </div>
                <h3 class="font-medium text-xs text-[#1b1b18] dark:text-[#EDEDEC] mb-1 break-words">{{ $tip->title }}</h3>
                <p class="text-[#706f6c] dark:text-[#A1A09A] text-[11px] leading-relaxed flex-1 break-words overflow-hidden max-h-[3.3em]">{{ $tip->content }}</p>
                <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <form method="POST" action="{{ route('admin.tips.toggle', $tip) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-medium {{ $tip->is_active ? 'bg-green-100 text-green-700' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c]' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $tip->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                <span data-translate-key="{{ $tip->is_active ? 'Active' : 'Inactive' }}">{{ $tip->is_active ? __("Active") : __("Inactive") }}</span>
                        </button>
                    </form>
                    <div class="flex items-center gap-1">
                        <a href="{{ route('admin.tips.edit', $tip) }}" class="inline-flex items-center justify-center w-7 h-7 rounded text-[#c42802] hover:text-[#f53003] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="{{ __("Edit") }}" data-translate-key="Edit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.tips.destroy', $tip) }}" class="inline" onsubmit="return confirm('{{ __("Are you sure?") }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-7 h-7 rounded text-red-600 hover:text-red-800 hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="{{ __("Delete") }}" data-translate-key="Delete">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-[#706f6c]">
                <svg class="w-12 h-12 mx-auto text-[#706f6c] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                <p class="text-sm" data-translate-key="No tips yet.">{{ __("No tips yet.") }}</p>
                <a href="{{ route('admin.tips.create') }}" class="mt-2 inline-block text-sm text-[#c42802] hover:text-[#f53003]" data-translate-key="Add your first tip">{{ __("Add your first tip") }}</a>
            </div>
        @endforelse
    </div>
@endsection
