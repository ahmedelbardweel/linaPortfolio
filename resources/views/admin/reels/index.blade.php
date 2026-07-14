@extends('admin.layouts.admin')

@section('title', 'Reels')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Reels</h1>
        <a href="{{ route('admin.reels.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New
        </a>
    </div>

    <div class="grid gap-3" style="grid-template-columns:repeat(auto-fill,minmax(160px,1fr))">
        @forelse ($reels as $reel)
            <div class="rounded-[3px] overflow-hidden bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] transition-transform duration-300 hover:-translate-y-1">
                <div class="aspect-video relative flex items-center justify-center overflow-hidden bg-gray-100 dark:bg-[#2a2a28]">
                    @if ($reel->thumbnail_data || $reel->thumbnail)
                        <img src="{{ $reel->thumbnail_url }}" alt="{{ $reel->title }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-12 h-12 text-[#706f6c]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @endif
                </div>
                <div class="p-3">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="font-medium text-xs text-[#1b1b18] dark:text-[#EDEDEC]">{{ $reel->title }}</h3>
                        <span class="text-[10px] text-[#706f6c]">#{{ $reel->order }}</span>
                    </div>
                    <div class="flex items-center justify-between mt-2 pt-2 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <form method="POST" action="{{ route('admin.reels.toggle', $reel) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-medium {{ $reel->is_active ? 'bg-green-100 text-green-700' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c]' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $reel->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                {{ $reel->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.reels.edit', $reel) }}" class="inline-flex items-center justify-center w-7 h-7 rounded text-[#c42802] hover:text-[#f53003] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="Edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.reels.destroy', $reel) }}" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-7 h-7 rounded text-red-600 hover:text-red-800 hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="Delete">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-[#706f6c]">
                <svg class="w-12 h-12 mx-auto text-[#706f6c] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p class="text-sm">No reels yet.</p>
                <a href="{{ route('admin.reels.create') }}" class="mt-2 inline-block text-sm text-[#c42802] hover:text-[#f53003]">Add your first reel</a>
            </div>
        @endforelse
    </div>
@endsection
