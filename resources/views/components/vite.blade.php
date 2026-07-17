@props(['entry' => ['resources/css/app.css', 'resources/js/app.js']])
@php
    $entries = (array) $entry;
@endphp
@if (!app()->isProduction())
    @vite($entries)
@else
    @php
        $manifestPath = public_path('build/manifest.json');
        if (!file_exists($manifestPath)) { echo "<!-- Vite manifest not found -->"; return; }
        $manifest = json_decode(file_get_contents($manifestPath), true);
    @endphp
    @foreach ($entries as $key)
        @php
            $data = $manifest[$key] ?? null;
            if (!$data) continue;
            $isJs = str_ends_with($data['file'] ?? '', '.js');
            $isCss = str_ends_with($data['file'] ?? '', '.css');
        @endphp
        @if ($isCss)
            <link rel="stylesheet" href="{{ asset('build/' . $data['file']) }}" media="print" onload="this.media='all'" fetchpriority="low">
            <noscript><link rel="stylesheet" href="{{ asset('build/' . $data['file']) }}"></noscript>
        @endif
        @if ($isJs)
            @foreach (($data['css'] ?? []) as $css)
                <link rel="stylesheet" href="{{ asset('build/' . $css) }}" media="print" onload="this.media='all'" fetchpriority="low">
                <noscript><link rel="stylesheet" href="{{ asset('build/' . $css) }}"></noscript>
            @endforeach
            @foreach (($data['imports'] ?? []) as $importKey)
                @php $importData = $manifest[$importKey] ?? null; @endphp
                @if ($importData)
                    @foreach (($importData['css'] ?? []) as $css)
                        <link rel="stylesheet" href="{{ asset('build/' . $css) }}" media="print" onload="this.media='all'" fetchpriority="low">
                        <noscript><link rel="stylesheet" href="{{ asset('build/' . $css) }}"></noscript>
                    @endforeach
                @endif
            @endforeach
            <script type="module" crossorigin src="{{ asset('build/' . $data['file']) }}"></script>
        @endif
    @endforeach
@endif