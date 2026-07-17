@extends('admin.layouts.admin')

@section('title', __("Settings"))

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]" data-translate-key="Settings">{{ __("Settings") }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]" data-translate-key="Manage your site-wide settings and configuration.">{{ __("Manage your site-wide settings and configuration.") }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6">
            @csrf

            <h2 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] pb-2 border-b border-[#e3e3e0] dark:border-[#3E3E3A]" data-translate-key="General">{{ __("General") }}</h2>

            {{-- Site Name --}}
            <div>
                <label for="site_name" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Site Name">{{ __("Site Name") }}</label>
                <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('site_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Site Description --}}
            <div>
                <label for="site_description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Site Description">{{ __("Site Description") }}</label>
                <textarea id="site_description" name="site_description" rows="3" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                @error('site_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Logo --}}
            <div>
                <label for="logo" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Logo">{{ __("Logo") }}</label>
                @isset($settings['logo'])
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ __("Site logo") }}" class="h-12 rounded-lg">
                    </div>
                @endisset
                <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp" class="w-full text-sm text-[#706f6c] dark:text-[#A1A09A] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] dark:file:bg-[#3E3E3A] file:text-[#c42802] hover:file:bg-[#fdf0ed] dark:hover:file:bg-[#2a2a28]">
                <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]" data-translate-key="Only WebP format is accepted.">{{ __("Only WebP format is accepted.") }}</p>
                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <h2 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] pb-2 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pt-4" data-translate-key="Hero Section">{{ __("Hero Section") }}</h2>

            {{-- Hero Title --}}
            <div>
                <label for="hero_title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Hero Title">{{ __("Hero Title") }}</label>
                <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('hero_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hero Subtitle --}}
            <div>
                <label for="hero_subtitle" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Hero Subtitle">{{ __("Hero Subtitle") }}</label>
                <input type="text" id="hero_subtitle" name="hero_subtitle" value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('hero_subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hero Image --}}
            <div>
                <label for="hero_image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Hero Image">{{ __("Hero Image") }}</label>
                @isset($settings['hero_image'])
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="{{ __("Hero image") }}" class="h-24 rounded-lg object-cover">
                    </div>
                @endisset
                <input type="file" id="hero_image" name="hero_image" accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp" class="w-full text-sm text-[#706f6c] dark:text-[#A1A09A] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] dark:file:bg-[#3E3E3A] file:text-[#c42802] hover:file:bg-[#fdf0ed] dark:hover:file:bg-[#2a2a28]">
                <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]" data-translate-key="Only WebP format is accepted.">{{ __("Only WebP format is accepted.") }}</p>
                @error('hero_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <h2 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] pb-2 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pt-4" data-translate-key="Social & Contact">{{ __("Social & Contact") }}</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Facebook --}}
                <div>
                    <label for="facebook_url" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Facebook URL">{{ __("Facebook URL") }}</label>
                    <input type="url" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('facebook_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Twitter --}}
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Twitter/X URL">{{ __("Twitter/X URL") }}</label>
                    <input type="url" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('twitter_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Instagram --}}
                <div>
                    <label for="instagram_url" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Instagram URL">{{ __("Instagram URL") }}</label>
                    <input type="url" id="instagram_url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('instagram_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- LinkedIn --}}
                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="LinkedIn URL">{{ __("LinkedIn URL") }}</label>
                    <input type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('linkedin_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Email">{{ __("Email") }}</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Phone">{{ __("Phone") }}</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Address --}}
                <div class="sm:col-span-2">
                    <label for="address" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Address">{{ __("Address") }}</label>
                    <textarea id="address" name="address" rows="3" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('address', $settings['address'] ?? '') }}</textarea>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <h2 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] pb-2 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pt-4" data-translate-key="Services">{{ __("Services") }}</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @for ($i = 1; $i <= 5; $i++)
                <div>
                    <label for="service_{{ $i }}" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">{{ __("Service") }} {{ $i }}</label>
                    <input type="text" id="service_{{ $i }}" name="service_{{ $i }}" value="{{ old('service_' . $i, $settings['service_' . $i] ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                    @error('service_' . $i)
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                @endfor
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <button type="submit" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    <span data-translate-key="Save Settings">{{ __("Save Settings") }}</span>
                </button>
            </div>
        </form>
    </div>
@endsection
