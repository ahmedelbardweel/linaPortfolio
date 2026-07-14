@extends('admin.layouts.admin')

@section('title', isset($reel) ? 'Edit Reel' : 'Create Reel')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($reel) ? 'Edit Reel' : 'Create Reel' }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]">{{ isset($reel) ? 'Update the reel details below.' : 'Fill in the details to create a new reel.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($reel) ? route('admin.reels.update', $reel) : route('admin.reels.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6"
{{-- Vercel Blob upload URL (for large videos) --}}@if ($blobUploadUrl ?? null) data-blob-upload-url="{{ $blobUploadUrl }}" data-blob-public-url="{{ $blobPublicUrl }}"@endif>
            @csrf
            @isset($reel)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $reel->title ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('description', $reel->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Video --}}
            <div>
                <label for="video" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Video</label>
                @isset($reel->video_path)
                    <div class="mb-2 flex items-center gap-2 text-sm text-[#706f6c]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Current video: {{ basename($reel->video_path) }}</span>
                    </div>
                @endisset
                <input type="file" id="video" name="video" accept="video/*" class="w-full text-sm text-[#706f6c] dark:text-[#A1A09A] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] dark:file:bg-[#3E3E3A] file:text-[#c42802] hover:file:bg-[#fdf0ed] dark:hover:file:bg-[#2a2a28]">
                @error('video')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Thumbnail --}}
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Thumbnail</label>
                @if (isset($reel) && ($reel->thumbnail_data || $reel->thumbnail))
                    <div class="mb-2">
                        <img src="{{ $reel->thumbnail_url }}" alt="Current thumbnail" class="w-24 h-24 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="w-full text-sm text-[#706f6c] dark:text-[#A1A09A] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] dark:file:bg-[#3E3E3A] file:text-[#c42802] hover:file:bg-[#fdf0ed] dark:hover:file:bg-[#2a2a28]">
                @error('thumbnail')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Order</label>
                <input type="number" id="order" name="order" value="{{ old('order', $reel->order ?? 0) }}" class="w-32 rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $reel->is_active ?? true) ? 'checked' : '' }} class="rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#c42802] focus:ring-[#c42802]/30">
                <label for="is_active" class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    {{ isset($reel) ? 'Update Reel' : 'Create Reel' }}
                </button>
                <a href="{{ route('admin.reels.index') }}" class="px-4 py-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:text-[#EDEDEC] transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
