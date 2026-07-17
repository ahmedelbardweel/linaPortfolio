@props(['weights' => '400,500,600', 'withPlayfair' => false])
@php $wList = explode(',', $weights); @endphp
<link rel="preconnect" href="/fonts">
@foreach($wList as $w)
    <link rel="preload" as="font" type="font/woff2" crossorigin href="/fonts/instrument-sans-{{ $w }}.woff2">
@endforeach
<style>
@foreach($wList as $w)
@font-face{font-family:'Instrument Sans';font-style:normal;font-weight:{{ $w }};font-stretch:100%;font-display:swap;src:url('/fonts/instrument-sans-{{ $w }}.woff2') format('woff2')}
@endforeach
@if($withPlayfair)
@font-face{font-family:'Playfair Display';font-style:normal;font-weight:400;font-stretch:100%;font-display:swap;src:url('/fonts/playfair-display-400.woff2') format('woff2')}
@font-face{font-family:'Playfair Display';font-style:normal;font-weight:700;font-stretch:100%;font-display:swap;src:url('/fonts/playfair-display-700.woff2') format('woff2')}
@endif
</style>