@extends('admin.layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
        <p class="mt-1 text-sm text-gray-500">Manage your site-wide settings and configuration.</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
            @csrf

            <h2 class="text-lg font-semibold text-gray-900 pb-2 border-b border-gray-200">General</h2>

            {{-- Site Name --}}
            <div>
                <label for="site_name" class="block text-sm font-medium text-gray-700 mb-1">Site Name</label>
                <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('site_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Site Description --}}
            <div>
                <label for="site_description" class="block text-sm font-medium text-gray-700 mb-1">Site Description</label>
                <textarea id="site_description" name="site_description" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                @error('site_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Logo --}}
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                @isset($settings['logo'])
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Site logo" class="h-12 rounded-lg">
                    </div>
                @endisset
                <input type="file" id="logo" name="logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <h2 class="text-lg font-semibold text-gray-900 pb-2 border-b border-gray-200 pt-4">Hero Section</h2>

            {{-- Hero Title --}}
            <div>
                <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-1">Hero Title</label>
                <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('hero_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hero Subtitle --}}
            <div>
                <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Hero Subtitle</label>
                <input type="text" id="hero_subtitle" name="hero_subtitle" value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                @error('hero_subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hero Image --}}
            <div>
                <label for="hero_image" class="block text-sm font-medium text-gray-700 mb-1">Hero Image</label>
                @isset($settings['hero_image'])
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="Hero image" class="h-24 rounded-lg object-cover">
                    </div>
                @endisset
                <input type="file" id="hero_image" name="hero_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('hero_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <h2 class="text-lg font-semibold text-gray-900 pb-2 border-b border-gray-200 pt-4">Social & Contact</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Facebook --}}
                <div>
                    <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-1">Facebook URL</label>
                    <input type="url" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    @error('facebook_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Twitter --}}
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-gray-700 mb-1">Twitter/X URL</label>
                    <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    @error('twitter_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Instagram --}}
                <div>
                    <label for="instagram_url" class="block text-sm font-medium text-gray-700 mb-1">Instagram URL</label>
                    <input type="url" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    @error('instagram_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Address --}}
                <div class="sm:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea id="address" name="address" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('address', $settings['address'] ?? '') }}</textarea>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
