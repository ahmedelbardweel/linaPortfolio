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

    <div class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#f0f0ef] dark:bg-[#2a2a28] border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <th class="text-left px-4 py-3 font-medium text-[#706f6c] w-12">#</th>
                        <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Image</th>
                        <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Title</th>
                        <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Type</th>
                        <th class="text-left px-4 py-3 font-medium text-[#706f6c] w-20">Order</th>
                        <th class="text-left px-4 py-3 font-medium text-[#706f6c] w-24">Status</th>
                        <th class="text-right px-4 py-3 font-medium text-[#706f6c] w-36">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($stories as $story)
                        <tr class="hover:bg-[#f0f0ef] dark:bg-[#2a2a28]">
                            <td class="px-4 py-3 text-[#706f6c]">{{ $story->id }}</td>
                            <td class="px-4 py-3">
                                @if ($story->image_data || $story->image_path)
                                    <img src="{{ $story->image_url }}" alt="{{ $story->title }}" class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 flex items-center justify-center text-[#706f6c]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $story->title }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                    {{ $story->type ?? 'default' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-[#706f6c]">{{ $story->order }}</td>
                            <td class="px-4 py-3">
                                <form method="POST" action="{{ route('admin.stories.toggle', $story) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $story->is_active ? 'bg-green-100 text-green-700' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c]' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $story->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                        {{ $story->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.stories.edit', $story) }}" class="inline-flex items-center gap-1 text-sm text-[#c42802] hover:text-[#f53003] mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.stories.destroy', $story) }}" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 text-sm text-red-600 hover:text-red-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-12 text-center text-[#706f6c]">
                                <svg class="w-12 h-12 mx-auto text-[#706f6c] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                <p class="text-sm">No stories yet.</p>
                                <a href="{{ route('admin.stories.create') }}" class="mt-2 inline-block text-sm text-[#c42802] hover:text-[#f53003]">Add your first story</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
