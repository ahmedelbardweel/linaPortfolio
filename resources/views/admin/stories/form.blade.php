@extends('admin.layouts.admin')

@section('title', isset($story) ? 'Edit Story' : 'Create Story')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($story) ? 'Edit Story' : 'Create Story' }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]">{{ isset($story) ? 'Update the story details below.' : 'Fill in the details to create a new story.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($story) ? route('admin.stories.update', $story) : route('admin.stories.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6">
            @csrf
            @isset($story)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $story->title ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div>
                <label for="content" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Content</label>
                <textarea id="content" name="content" rows="4" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('content', $story->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Type --}}
            <div>
                <label for="type" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Type</label>
                <select id="type" name="type" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    <option value="visual" {{ old('type', $story->type ?? '') == 'visual' ? 'selected' : '' }}>Visual</option>
                    <option value="text" {{ old('type', $story->type ?? '') == 'text' ? 'selected' : '' }}>Text</option>
                    <option value="mixed" {{ old('type', $story->type ?? '') == 'mixed' ? 'selected' : '' }}>Mixed</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Background Color --}}
            <div>
                <label for="bg_color" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Background Color</label>
                <input type="text" id="bg_color" name="bg_color" value="{{ old('bg_color', $story->bg_color ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm" placeholder="e.g. #6366f1 or bg-gradient-to-r from-pink-500 to-purple-500">
                @error('bg_color')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Image</label>
                @if (isset($story) && ($story->image_data || $story->image_path))
                    <div class="mb-2">
                        <img src="{{ $story->image_url }}" alt="Current image" class="w-24 h-24 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-sm text-[#706f6c] dark:text-[#A1A09A] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] dark:file:bg-[#3E3E3A] file:text-[#c42802] hover:file:bg-[#fdf0ed] dark:hover:file:bg-[#2a2a28]">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Order</label>
                <input type="number" id="order" name="order" value="{{ old('order', $story->order ?? 0) }}" class="w-32 rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $story->is_active ?? true) ? 'checked' : '' }} class="rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#c42802] focus:ring-[#c42802]/30">
                <label for="is_active" class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    {{ isset($story) ? 'Update Story' : 'Create Story' }}
                </button>
                <a href="{{ route('admin.stories.index') }}" class="px-4 py-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
