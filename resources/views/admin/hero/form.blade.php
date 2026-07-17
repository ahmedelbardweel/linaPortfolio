@extends('admin.layouts.admin')

@section('title', isset($hero) ? __("Edit Hero Section") : __("Create Hero Section"))

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]" data-translate-key="{{ isset($hero) ? 'Edit Hero Section' : 'Create Hero Section' }}">{{ isset($hero) ? __("Edit Hero Section") : __("Create Hero Section") }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]" data-translate-key="{{ isset($hero) ? 'Update the hero section images.' : 'Upload images for the hero section.' }}">{{ isset($hero) ? __("Update the hero section images.") : __("Upload images for the hero section.") }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($hero) ? route('admin.hero.update', $hero) : route('admin.hero.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6">
            @csrf
            @isset($hero) @method('PUT') @endisset

            <div>
                <label for="main_image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Main Image (center)">{{ __("Main Image (center)") }}</label>
                <input type="file" id="main_image" name="main_image" accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp" class="w-full text-sm dark:text-[#EDEDEC]">
                <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]" data-translate-key="Only WebP format is accepted.">{{ __("Only WebP format is accepted.") }}</p>
                @if (isset($hero) && ($hero->main_image_data || $hero->main_image))
                    <img src="{{ $hero->main_image_url }}" class="mt-2 h-32 rounded object-cover">
                @endif
                @error('main_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="right_image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Right Image">{{ __("Right Image") }}</label>
                <input type="file" id="right_image" name="right_image" accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp" class="w-full text-sm dark:text-[#EDEDEC]">
                <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]" data-translate-key="Only WebP format is accepted.">{{ __("Only WebP format is accepted.") }}</p>
                @if (isset($hero) && ($hero->right_image_data || $hero->right_image))
                    <img src="{{ $hero->right_image_url }}" class="mt-2 h-32 rounded object-cover">
                @endif
                @error('right_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    <span data-translate-key="{{ isset($hero) ? 'Update' : 'Create' }}">{{ isset($hero) ? __("Update") : __("Create") }}</span>
                </button>
                <a href="{{ route('admin.hero.index') }}" class="px-6 py-2.5 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors" data-translate-key="Cancel">{{ __("Cancel") }}</a>
            </div>
        </form>
    </div>
@endsection
