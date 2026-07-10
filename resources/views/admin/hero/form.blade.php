@extends('admin.layouts.admin')

@section('title', isset($hero) ? 'Edit Hero Section' : 'Create Hero Section')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($hero) ? 'Edit Hero Section' : 'Create Hero Section' }}</h1>
        <p class="mt-1 text-sm text-gray-500">{{ isset($hero) ? 'Update the hero section images.' : 'Upload images for the hero section.' }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($hero) ? route('admin.hero.update', $hero) : route('admin.hero.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
            @csrf
            @isset($hero) @method('PUT') @endisset

            <div>
                <label for="main_image" class="block text-sm font-medium text-gray-700 mb-1">Main Image (center)</label>
                <input type="file" id="main_image" name="main_image" class="w-full text-sm">
                @if (isset($hero) && $hero->main_image)
                    <img src="{{ asset('storage/' . $hero->main_image) }}" class="mt-2 h-32 rounded object-cover">
                @endif
                @error('main_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="right_image" class="block text-sm font-medium text-gray-700 mb-1">Right Image</label>
                <input type="file" id="right_image" name="right_image" class="w-full text-sm">
                @if (isset($hero) && $hero->right_image)
                    <img src="{{ asset('storage/' . $hero->right_image) }}" class="mt-2 h-32 rounded object-cover">
                @endif
                @error('right_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                    {{ isset($hero) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('admin.hero.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
@endsection
