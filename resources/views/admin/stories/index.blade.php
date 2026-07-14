@extends('admin.layouts.admin')

@section('title', 'Stories')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Stories</h1>
        <a href="{{ route('admin.stories.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New
        </a>
    </div>

    <div class="grid gap-3" style="grid-template-columns:repeat(auto-fill,minmax(160px,1fr))">
        @forelse ($stories as $story)
            <div class="rounded-[3px] overflow-hidden bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] transition-transform duration-300 hover:-translate-y-1">
                <div class="h-32 flex items-center justify-center overflow-hidden"
                    style="background:{{ $story->bg_color ?: ($story->type === 'text' ? 'linear-gradient(135deg, #161615, #3E3E3A)' : 'linear-gradient(135deg, #f53003, #ff8a66)') }}">
                    @if ($story->image_data || $story->image_path)
                        <img src="{{ $story->image_url }}" alt="{{ $story->title }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            @if ($story->type === 'text')
                                <path d="M12 20h9" /><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            @elseif ($story->type === 'mixed')
                                <path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" /><circle cx="12" cy="13" r="3" />
                            @else
                                <rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="1.5" /><path d="m21 15-5-5L5 21" />
                            @endif
                        </svg>
                    @endif
                </div>
                <div class="p-3">
                    <div class="flex items-center justify-between mb-1">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-purple-100 text-purple-700">
                            {{ $story->type ?? 'default' }}
                        </span>
                        <span class="text-[10px] text-[#706f6c]">#{{ $story->order }}</span>
                    </div>
                    <h3 class="font-medium text-xs text-[#1b1b18] dark:text-[#EDEDEC]">{{ $story->title }}</h3>
                    <div class="flex items-center justify-between mt-2 pt-2 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <form method="POST" action="{{ route('admin.stories.toggle', $story) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-medium {{ $story->is_active ? 'bg-green-100 text-green-700' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c]' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $story->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                {{ $story->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.stories.edit', $story) }}" class="inline-flex items-center justify-center w-7 h-7 rounded text-[#c42802] hover:text-[#f53003] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all" title="Edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.stories.destroy', $story) }}" class="inline" onsubmit="return confirm('Are you sure?')">
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
                <svg class="w-12 h-12 mx-auto text-[#706f6c] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <p class="text-sm">No stories yet.</p>
                <a href="{{ route('admin.stories.create') }}" class="mt-2 inline-block text-sm text-[#c42802] hover:text-[#f53003]">Add your first story</a>
            </div>
        @endforelse
    </div>
@endsection
