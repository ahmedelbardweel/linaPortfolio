@extends('admin.layouts.admin')

@section('title', isset($portfolio) ? 'Edit Portfolio Item' : 'Create Portfolio Item')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($portfolio) ? 'Edit Portfolio Item' : 'Create Portfolio Item' }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]">{{ isset($portfolio) ? 'Update the portfolio item below.' : 'Fill in the details to create a new portfolio item.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($portfolio) ? route('admin.portfolios.update', $portfolio) : route('admin.portfolios.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6">
            @csrf
            @isset($portfolio)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('description', $portfolio->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Image</label>
                @if (isset($portfolio) && ($portfolio->image_data || $portfolio->image_path))
                    <div class="mb-2">
                        <img src="{{ $portfolio->image_url }}" alt="Current image" class="w-24 h-24 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-sm text-[#706f6c] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] file:text-[#c42802] hover:file:bg-[#fdf0ed]">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gradient --}}
            <div>
                <label for="gradient" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Gradient</label>
                <input type="text" id="gradient" name="gradient" value="{{ old('gradient', $portfolio->gradient ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm" placeholder="e.g. linear-gradient(135deg, #667eea 0%, #764ba2 100%)">
                @error('gradient')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Order</label>
                <input type="number" id="order" name="order" value="{{ old('order', $portfolio->order ?? 0) }}" class="w-32 rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $portfolio->is_active ?? true) ? 'checked' : '' }} class="rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#c42802] focus:ring-[#c42802]/30">
                <label for="is_active" class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    {{ isset($portfolio) ? 'Update Portfolio Item' : 'Create Portfolio Item' }}
                </button>
                <a href="{{ route('admin.portfolios.index') }}" class="px-4 py-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
