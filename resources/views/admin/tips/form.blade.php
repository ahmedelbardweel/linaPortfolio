@extends('admin.layouts.admin')

@section('title', isset($tip) ? 'Edit Tip' : 'Create Tip')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($tip) ? 'Edit Tip' : 'Create Tip' }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]">{{ isset($tip) ? 'Update the tip details below.' : 'Fill in the details to create a new tip.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($tip) ? route('admin.tips.update', $tip) : route('admin.tips.store') }}" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6">
            @csrf
            @isset($tip)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $tip->title ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category --}}
            <div>
                <label for="category" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Category</label>
                <input type="text" id="category" name="category" value="{{ old('category', $tip->category ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm" placeholder="e.g. Photography, Business, Editing">
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div>
                <label for="content" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Content</label>
                <textarea id="content" name="content" rows="6" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('content', $tip->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Order</label>
                <input type="number" id="order" name="order" value="{{ old('order', $tip->order ?? 0) }}" class="w-32 rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $tip->is_active ?? true) ? 'checked' : '' }} class="rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#c42802] focus:ring-[#c42802]/30">
                <label for="is_active" class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    {{ isset($tip) ? 'Update Tip' : 'Create Tip' }}
                </button>
                <a href="{{ route('admin.tips.index') }}" class="px-4 py-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
