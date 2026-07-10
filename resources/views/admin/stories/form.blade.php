@extends('admin.layouts.admin')

@section('title', isset($story) ? 'Edit Story' : 'Create Story')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($story) ? 'Edit Story' : 'Create Story' }}</h1>
        <p class="mt-1 text-sm text-gray-500">{{ isset($story) ? 'Update the story details below.' : 'Fill in the details to create a new story.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($story) ? route('admin.stories.update', $story) : route('admin.stories.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
            @csrf
            @isset($story)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $story->title ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea id="content" name="content" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('content', $story->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Type --}}
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <input type="text" id="type" name="type" value="{{ old('type', $story->type ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="e.g. default, featured, highlight">
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Background Color --}}
            <div>
                <label for="bg_color" class="block text-sm font-medium text-gray-700 mb-1">Background Color</label>
                <input type="text" id="bg_color" name="bg_color" value="{{ old('bg_color', $story->bg_color ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="e.g. #6366f1 or bg-gradient-to-r from-pink-500 to-purple-500">
                @error('bg_color')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                @isset($story->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $story->image_path) }}" alt="Current image" class="w-24 h-24 rounded-lg object-cover">
                    </div>
                @endisset
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" id="order" name="order" value="{{ old('order', $story->order ?? 0) }}" class="w-32 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $story->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    {{ isset($story) ? 'Update Story' : 'Create Story' }}
                </button>
                <a href="{{ route('admin.stories.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
