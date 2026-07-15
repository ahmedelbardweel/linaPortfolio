@extends('admin.layouts.admin')

@section('title', isset($portfolio) ? __("Edit Portfolio Item") : __("Create Portfolio Item"))

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]" data-translate-key="{{ isset($portfolio) ? 'Edit Portfolio Item' : 'Create Portfolio Item' }}">{{ isset($portfolio) ? __("Edit Portfolio Item") : __("Create Portfolio Item") }}</h1>
        <p class="mt-1 text-sm text-[#706f6c]" data-translate-key="{{ isset($portfolio) ? 'Update the portfolio item below.' : 'Fill in the details to create a new portfolio item.' }}">{{ isset($portfolio) ? __("Update the portfolio item below.") : __("Fill in the details to create a new portfolio item.") }}</p>
    </div>

    <div class="max-w-2xl">
        <form method="POST" action="{{ isset($portfolio) ? route('admin.portfolios.update', $portfolio) : route('admin.portfolios.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-[#161615] rounded-xl shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 space-y-6">
            @csrf
            @isset($portfolio)
                @method('PUT')
            @endisset

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Title">{{ __("Title") }}</label>
                <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Description">{{ __("Description") }}</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">{{ old('description', $portfolio->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Image">{{ __("Image") }}</label>
                @if (isset($portfolio) && ($portfolio->image_data || $portfolio->image_path))
                    <div class="mb-2">
                        <img src="{{ $portfolio->image_url }}" alt="{{ __("Current image") }}" class="w-24 h-24 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*" onchange="compressImage(this, 800, 800, 0.6)" class="w-full text-sm text-[#706f6c] dark:text-[#A1A09A] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#fdf0ed] dark:file:bg-[#3E3E3A] file:text-[#c42802] hover:file:bg-[#fdf0ed] dark:hover:file:bg-[#2a2a28]">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gradient --}}
            <div>
                <label for="gradient" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Gradient">{{ __("Gradient") }}</label>
                <input type="text" id="gradient" name="gradient" value="{{ old('gradient', $portfolio->gradient ?? '') }}" class="w-full rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm" placeholder="{{ __("e.g. linear-gradient(135deg, #667eea 0%, #764ba2 100%)") }}">
                @error('gradient')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Order --}}
            <div>
                <label for="order" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1" data-translate-key="Order">{{ __("Order") }}</label>
                <input type="number" id="order" name="order" value="{{ old('order', $portfolio->order ?? 0) }}" class="w-32 rounded-lg border-[#e3e3e0] dark:border-[#3E3E3A] dark:bg-[#2a2a28] dark:text-[#EDEDEC] shadow-sm focus:border-[#c42802] focus:ring-[#c42802]/30 text-sm">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $portfolio->is_active ?? true) ? 'checked' : '' }} class="rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#c42802] focus:ring-[#c42802]/30">
                <label for="is_active" class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]" data-translate-key="Active">{{ __("Active") }}</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-4 py-2 bg-[#c42802] hover:bg-[#f53003] text-white text-sm font-medium rounded-lg transition-colors">
                    <span data-translate-key="{{ isset($portfolio) ? 'Update Portfolio Item' : 'Create Portfolio Item' }}">{{ isset($portfolio) ? __("Update Portfolio Item") : __("Create Portfolio Item") }}</span>
                </button>
                <a href="{{ route('admin.portfolios.index') }}" class="px-4 py-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#1b1b18] dark:text-[#EDEDEC] transition-colors" data-translate-key="Cancel">{{ __("Cancel") }}</a>
            </div>
        </form>
    </div>

    <script>
    function compressImage(input, maxW, maxH, quality) {
        if (!input.files || !input.files[0]) return;
        var file = input.files[0];
        if (file.size < 1024 * 1024) return;
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = new Image();
            img.onload = function() {
                var canvas = document.createElement('canvas');
                var w = img.width, h = img.height;
                var scale = Math.min(maxW / w, maxH / h, 1);
                canvas.width = Math.round(w * scale);
                canvas.height = Math.round(h * scale);
                var ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                canvas.toBlob(function(blob) {
                    if (!blob) return;
                    var compressed = new File([blob], file.name, { type: 'image/webp' });
                    var dt = new DataTransfer();
                    dt.items.add(compressed);
                    input.files = dt.files;
                }, 'image/webp', quality);
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
    </script>
@endsection
