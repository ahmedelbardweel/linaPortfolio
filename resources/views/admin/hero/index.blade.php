@extends('admin.layouts.admin')

@section('title', 'Hero Sections')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Hero Sections</h1>
            <p class="mt-1 text-sm text-[#706f6c]">Manage hero section content.</p>
        </div>
        <a href="{{ route('admin.hero.create') }}" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">Add New</a>
    </div>

    <div class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-[#f0f0ef] dark:bg-[#2a2a28] border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <th class="text-left px-4 py-3 font-medium text-[#706f6c]">#</th>
                    <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Main Image</th>
                    <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Title</th>
                    <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Status</th>
                    <th class="text-left px-4 py-3 font-medium text-[#706f6c]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($heroSections as $hero)
                <tr class="border-b border-[#e3e3e0] dark:border-[#3E3E3A] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28]">
                    <td class="px-4 py-3 text-[#706f6c]">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">
                        @if ($hero->main_image)
                            <img src="{{ asset('storage/' . $hero->main_image) }}" class="w-16 h-12 object-cover rounded">
                        @else
                            <span class="text-[#706f6c]">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $hero->title }}</td>
                    <td class="px-4 py-3">
                        <form method="POST" action="{{ route('admin.hero.toggle', $hero) }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="px-2.5 py-1 text-xs font-medium rounded-full {{ $hero->is_active ? 'bg-green-100 text-green-700' : 'bg-[#e3e3e0] dark:bg-[#3E3E3A] text-[#706f6c]' }}">
                                {{ $hero->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.hero.edit', $hero) }}" class="text-[#c42802] hover:text-[#f53003] text-xs font-medium">Edit</a>
                            <form method="POST" action="{{ route('admin.hero.destroy', $hero) }}" onsubmit="return confirm('Delete this hero section?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-4 py-10 text-center text-[#706f6c]">No hero sections yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
