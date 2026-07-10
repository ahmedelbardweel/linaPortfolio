@extends('admin.layouts.admin')

@section('title', isset($tip) ? 'Edit Tip' : 'Create Tip')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($tip) ? 'Edit Tip' : 'Create Tip' }}</h1>
        <p class="mt-1 text-sm text-gray-500">{{ isset($tip) ? 'Update the tip details below.' : 'Fill in the details to create a new tip.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($tip) ? route('admin.tips.update', $tip) : route('admin.tips.store') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
            @csrf
            @isset($tip)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $tip->title ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category --}}
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <input type="text" id="category" name="category" value="{{ old('category', $tip->category ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="e.g. Photography, Business, Editing">
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea id="content" name="content" rows="6" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('content', $tip->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" id="order" name="order" value="{{ old('order', $tip->order ?? 0) }}" class="w-32 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $tip->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    {{ isset($tip) ? 'Update Tip' : 'Create Tip' }}
                </button>
                <a href="{{ route('admin.tips.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
