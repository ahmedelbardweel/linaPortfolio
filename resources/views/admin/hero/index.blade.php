@extends('admin.layouts.admin')

@section('title', 'Hero Sections')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Hero Sections</h1>
            <p class="mt-1 text-sm text-gray-500">Manage hero section content.</p>
        </div>
        <a href="{{ route('admin.hero.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">Add New</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="text-left px-4 py-3 font-medium text-gray-600">#</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Main Image</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Title</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Status</th>
                    <th class="text-left px-4 py-3 font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($heroSections as $hero)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">
                        @if ($hero->main_image)
                            <img src="{{ asset('storage/' . $hero->main_image) }}" class="w-16 h-12 object-cover rounded">
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $hero->title }}</td>
                    <td class="px-4 py-3">
                        <form method="POST" action="{{ route('admin.hero.toggle', $hero) }}">
                            @csrf @method('PATCH')
                            <button type="submit" class="px-2.5 py-1 text-xs font-medium rounded-full {{ $hero->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ $hero->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.hero.edit', $hero) }}" class="text-indigo-600 hover:text-indigo-800 text-xs font-medium">Edit</a>
                            <form method="POST" action="{{ route('admin.hero.destroy', $hero) }}" onsubmit="return confirm('Delete this hero section?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-4 py-10 text-center text-gray-400">No hero sections yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
