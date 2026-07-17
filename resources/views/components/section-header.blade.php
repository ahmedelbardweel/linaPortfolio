@props(['title', 'subtitle' => ''])
<div class="mb-10">
    <h2 data-translate-key="{{ $title }}" class="section-title">{{ __($title) }}</h2>
    @if ($subtitle)
        <p data-translate-key="{{ $subtitle }}" class="section-subtitle">{{ __($subtitle) }}</p>
    @endif
</div>