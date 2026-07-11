<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?: 'en' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __("Lina - Interior Design & Decoration") }}</title>
    <meta name="description" content="{{ __("Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.") }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|playfair-display:400,700&display=swap"
        rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer properties {
                @supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))) {

                    *,
                    :before,
                    :after,
                    ::backdrop {
                        --tw-translate-x: 0;
                        --tw-translate-y: 0;
                        --tw-translate-z: 0;
                        --tw-rotate-x: initial;
                        --tw-rotate-y: initial;
                        --tw-rotate-z: initial;
                        --tw-skew-x: initial;
                        --tw-skew-y: initial;
                        --tw-space-x-reverse: 0;
                        --tw-border-style: solid;
                        --tw-leading: initial;
                        --tw-font-weight: initial;
                        --tw-tracking: initial;
                        --tw-shadow: 0 0 #0000;
                        --tw-shadow-color: initial;
                        --tw-shadow-alpha: 100%;
                        --tw-inset-shadow: 0 0 #0000;
                        --tw-inset-shadow-color: initial;
                        --tw-inset-shadow-alpha: 100%;
                        --tw-ring-color: initial;
                        --tw-ring-shadow: 0 0 #0000;
                        --tw-inset-ring-color: initial;
                        --tw-inset-ring-shadow: 0 0 #0000;
                        --tw-ring-inset: initial;
                        --tw-ring-offset-width: 0px;
                        --tw-ring-offset-color: #fff;
                        --tw-ring-offset-shadow: 0 0 #0000;
                        --tw-blur: initial;
                        --tw-brightness: initial;
                        --tw-contrast: initial;
                        --tw-grayscale: initial;
                        --tw-hue-rotate: initial;
                        --tw-invert: initial;
                        --tw-opacity: initial;
                        --tw-saturate: initial;
                        --tw-sepia: initial;
                        --tw-drop-shadow: initial;
                        --tw-drop-shadow-color: initial;
                        --tw-drop-shadow-alpha: 100%;
                        --tw-drop-shadow-size: initial;
                        --tw-duration: initial;
                        --tw-ease: initial;
                        --tw-content: ""
                    }
                }
            }

            @layer theme {

                :root,
                :host {
                    --font-sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                    --font-serif: ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
                    --font-mono: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                    --color-red-50: oklch(97.1% .013 17.38);
                    --color-red-100: oklch(93.6% .032 17.717);
                    --color-red-200: oklch(88.5% .062 18.334);
                    --color-red-300: oklch(80.8% .114 19.571);
                    --color-red-400: oklch(70.4% .191 22.216);
                    --color-red-500: oklch(63.7% .237 25.331);
                    --color-red-600: oklch(57.7% .245 27.325);
                    --color-red-700: oklch(50.5% .213 27.518);
                    --color-red-800: oklch(44.4% .177 26.899);
                    --color-red-900: oklch(39.6% .141 25.723);
                    --color-red-950: oklch(25.8% .092 26.042);
                    --color-orange-50: oklch(98% .016 73.684);
                    --color-orange-100: oklch(95.4% .038 75.164);
                    --color-orange-200: oklch(90.1% .076 70.697);
                    --color-orange-300: oklch(83.7% .128 66.29);
                    --color-orange-400: oklch(75% .183 55.934);
                    --color-orange-500: oklch(70.5% .213 47.604);
                    --color-orange-600: oklch(64.6% .222 41.116);
                    --color-orange-700: oklch(55.3% .195 38.402);
                    --color-orange-800: oklch(47% .157 37.304);
                    --color-orange-900: oklch(40.8% .123 38.172);
                    --color-orange-950: oklch(26.6% .079 36.259);
                    --color-amber-50: oklch(98.7% .022 95.277);
                    --color-amber-100: oklch(96.2% .059 95.617);
                    --color-amber-200: oklch(92.4% .12 95.746);
                    --color-amber-300: oklch(87.9% .169 91.605);
                    --color-amber-400: oklch(82.8% .189 84.429);
                    --color-amber-500: oklch(76.9% .188 70.08);
                    --color-amber-600: oklch(66.6% .179 58.318);
                    --color-amber-700: oklch(55.5% .163 48.998);
                    --color-amber-800: oklch(47.3% .137 46.201);
                    --color-amber-900: oklch(41.4% .112 45.904);
                    --color-amber-950: oklch(27.9% .077 45.635);
                    --color-yellow-50: oklch(98.7% .026 102.212);
                    --color-yellow-100: oklch(97.3% .071 103.193);
                    --color-yellow-200: oklch(94.5% .129 101.54);
                    --color-yellow-300: oklch(90.5% .182 98.111);
                    --color-yellow-400: oklch(85.2% .199 91.936);
                    --color-yellow-500: oklch(79.5% .184 86.047);
                    --color-yellow-600: oklch(68.1% .162 75.834);
                    --color-yellow-700: oklch(55.4% .135 66.442);
                    --color-yellow-800: oklch(47.6% .114 61.907);
                    --color-yellow-900: oklch(42.1% .095 57.708);
                    --color-yellow-950: oklch(28.6% .066 53.813);
                    --color-lime-50: oklch(98.6% .031 120.757);
                    --color-lime-100: oklch(96.7% .067 122.328);
                    --color-lime-200: oklch(93.8% .127 124.321);
                    --color-lime-300: oklch(89.7% .196 126.665);
                    --color-lime-400: oklch(84.1% .238 128.85);
                    --color-lime-500: oklch(76.8% .233 130.85);
                    --color-lime-600: oklch(64.8% .2 131.684);
                    --color-lime-700: oklch(53.2% .157 131.589);
                    --color-lime-800: oklch(45.3% .124 130.933);
                    --color-lime-900: oklch(40.5% .101 131.063);
                    --color-lime-950: oklch(27.4% .072 132.109);
                    --color-green-50: oklch(98.2% .018 155.826);
                    --color-green-100: oklch(96.2% .044 156.743);
                    --color-green-200: oklch(92.5% .084 155.995);
                    --color-green-300: oklch(87.1% .15 154.449);
                    --color-green-400: oklch(79.2% .209 151.711);
                    --color-green-500: oklch(72.3% .219 149.579);
                    --color-green-600: oklch(62.7% .194 149.214);
                    --color-green-700: oklch(52.7% .154 150.069);
                    --color-green-800: oklch(44.8% .119 151.328);
                    --color-green-900: oklch(39.3% .095 152.535);
                    --color-green-950: oklch(26.6% .065 152.934);
                    --color-emerald-50: oklch(97.9% .021 166.113);
                    --color-emerald-100: oklch(95% .052 163.051);
                    --color-emerald-200: oklch(90.5% .093 164.15);
                    --color-emerald-300: oklch(84.5% .143 164.978);
                    --color-emerald-400: oklch(76.5% .177 163.223);
                    --color-emerald-500: oklch(69.6% .17 162.48);
                    --color-emerald-600: oklch(59.6% .145 163.225);
                    --color-emerald-700: oklch(50.8% .118 165.612);
                    --color-emerald-800: oklch(43.2% .095 166.913);
                    --color-emerald-900: oklch(37.8% .077 168.94);
                    --color-emerald-950: oklch(26.2% .051 172.552);
                    --color-teal-50: oklch(98.4% .014 180.72);
                    --color-teal-100: oklch(95.3% .051 180.801);
                    --color-teal-200: oklch(91% .096 180.426);
                    --color-teal-300: oklch(85.5% .138 181.071);
                    --color-teal-400: oklch(77.7% .152 181.912);
                    --color-teal-500: oklch(70.4% .14 182.503);
                    --color-teal-600: oklch(60% .118 184.704);
                    --color-teal-700: oklch(51.1% .096 186.391);
                    --color-teal-800: oklch(43.7% .078 188.216);
                    --color-teal-900: oklch(38.6% .063 188.416);
                    --color-teal-950: oklch(27.7% .046 192.524);
                    --color-cyan-50: oklch(98.4% .019 200.873);
                    --color-cyan-100: oklch(95.6% .045 203.388);
                    --color-cyan-200: oklch(91.7% .08 205.041);
                    --color-cyan-300: oklch(86.5% .127 207.078);
                    --color-cyan-400: oklch(78.9% .154 211.53);
                    --color-cyan-500: oklch(71.5% .143 215.221);
                    --color-cyan-600: oklch(60.9% .126 221.723);
                    --color-cyan-700: oklch(52% .105 223.128);
                    --color-cyan-800: oklch(45% .085 224.283);
                    --color-cyan-900: oklch(39.8% .07 227.392);
                    --color-cyan-950: oklch(30.2% .056 229.695);
                    --color-sky-50: oklch(97.7% .013 236.62);
                    --color-sky-100: oklch(95.1% .026 236.824);
                    --color-sky-200: oklch(90.1% .058 230.902);
                    --color-sky-300: oklch(82.8% .111 230.318);
                    --color-sky-400: oklch(74.6% .16 232.661);
                    --color-sky-500: oklch(68.5% .169 237.323);
                    --color-sky-600: oklch(58.8% .158 241.966);
                    --color-sky-700: oklch(50% .134 242.749);
                    --color-sky-800: oklch(44.3% .11 240.79);
                    --color-sky-900: oklch(39.1% .09 240.876);
                    --color-sky-950: oklch(29.3% .066 243.157);
                    --color-blue-50: oklch(97% .014 254.604);
                    --color-blue-100: oklch(93.2% .032 255.585);
                    --color-blue-200: oklch(88.2% .059 254.128);
                    --color-blue-300: oklch(80.9% .105 251.813);
                    --color-blue-400: oklch(70.7% .165 254.624);
                    --color-blue-500: oklch(62.3% .214 259.815);
                    --color-blue-600: oklch(54.6% .245 262.881);
                    --color-blue-700: oklch(48.8% .243 264.376);
                    --color-blue-800: oklch(42.4% .199 265.638);
                    --color-blue-900: oklch(37.9% .146 265.522);
                    --color-blue-950: oklch(28.2% .091 267.935);
                    --color-indigo-50: oklch(96.2% .018 272.314);
                    --color-indigo-100: oklch(93% .034 272.788);
                    --color-indigo-200: oklch(87% .065 274.039);
                    --color-indigo-300: oklch(78.5% .115 274.713);
                    --color-indigo-400: oklch(67.3% .182 276.935);
                    --color-indigo-500: oklch(58.5% .233 277.117);
                    --color-indigo-600: oklch(51.1% .262 276.966);
                    --color-indigo-700: oklch(45.7% .24 277.023);
                    --color-indigo-800: oklch(39.8% .195 277.366);
                    --color-indigo-900: oklch(35.9% .144 278.697);
                    --color-indigo-950: oklch(25.7% .09 281.288);
                    --color-violet-50: oklch(96.9% .016 293.756);
                    --color-violet-100: oklch(94.3% .029 294.588);
                    --color-violet-200: oklch(89.4% .057 293.283);
                    --color-violet-300: oklch(81.1% .111 293.571);
                    --color-violet-400: oklch(70.2% .183 293.541);
                    --color-violet-500: oklch(60.6% .25 292.717);
                    --color-violet-600: oklch(54.1% .281 293.009);
                    --color-violet-700: oklch(49.1% .27 292.581);
                    --color-violet-800: oklch(43.2% .232 292.759);
                    --color-violet-900: oklch(38% .189 293.745);
                    --color-violet-950: oklch(28.3% .141 291.089);
                    --color-purple-50: oklch(97.7% .014 308.299);
                    --color-purple-100: oklch(94.6% .033 307.174);
                    --color-purple-200: oklch(90.2% .063 306.703);
                    --color-purple-300: oklch(82.7% .119 306.383);
                    --color-purple-400: oklch(71.4% .203 305.504);
                    --color-purple-500: oklch(62.7% .265 303.9);
                    --color-purple-600: oklch(55.8% .288 302.321);
                    --color-purple-700: oklch(49.6% .265 301.924);
                    --color-purple-800: oklch(43.8% .218 303.724);
                    --color-purple-900: oklch(38.1% .176 304.987);
                    --color-purple-950: oklch(29.1% .149 302.717);
                    --color-fuchsia-50: oklch(97.7% .017 320.058);
                    --color-fuchsia-100: oklch(95.2% .037 318.852);
                    --color-fuchsia-200: oklch(90.3% .076 319.62);
                    --color-fuchsia-300: oklch(83.3% .145 321.434);
                    --color-fuchsia-400: oklch(74% .238 322.16);
                    --color-fuchsia-500: oklch(66.7% .295 322.15);
                    --color-fuchsia-600: oklch(59.1% .293 322.896);
                    --color-fuchsia-700: oklch(51.8% .253 323.949);
                    --color-fuchsia-800: oklch(45.2% .211 324.591);
                    --color-fuchsia-900: oklch(40.1% .17 325.612);
                    --color-fuchsia-950: oklch(29.3% .136 325.661);
                    --color-pink-50: oklch(97.1% .014 343.198);
                    --color-pink-100: oklch(94.8% .028 342.258);
                    --color-pink-200: oklch(89.9% .061 343.231);
                    --color-pink-300: oklch(82.3% .12 346.018);
                    --color-pink-400: oklch(71.8% .202 349.761);
                    --color-pink-500: oklch(65.6% .241 354.308);
                    --color-pink-600: oklch(59.2% .249 .584);
                    --color-pink-700: oklch(52.5% .223 3.958);
                    --color-pink-800: oklch(45.9% .187 3.815);
                    --color-pink-900: oklch(40.8% .153 2.432);
                    --color-pink-950: oklch(28.4% .109 3.907);
                    --color-rose-50: oklch(96.9% .015 12.422);
                    --color-rose-100: oklch(94.1% .03 12.58);
                    --color-rose-200: oklch(89.2% .058 10.001);
                    --color-rose-300: oklch(81% .117 11.638);
                    --color-rose-400: oklch(71.2% .194 13.428);
                    --color-rose-500: oklch(64.5% .246 16.439);
                    --color-rose-600: oklch(58.6% .253 17.585);
                    --color-rose-700: oklch(51.4% .222 16.935);
                    --color-rose-800: oklch(45.5% .188 13.697);
                    --color-rose-900: oklch(41% .159 10.272);
                    --color-rose-950: oklch(27.1% .105 12.094);
                    --color-slate-50: oklch(98.4% .003 247.858);
                    --color-slate-100: oklch(96.8% .007 247.896);
                    --color-slate-200: oklch(92.9% .013 255.508);
                    --color-slate-300: oklch(86.9% .022 252.894);
                    --color-slate-400: oklch(70.4% .04 256.788);
                    --color-slate-500: oklch(55.4% .046 257.417);
                    --color-slate-600: oklch(44.6% .043 257.281);
                    --color-slate-700: oklch(37.2% .044 257.287);
                    --color-slate-800: oklch(27.9% .041 260.031);
                    --color-slate-900: oklch(20.8% .042 265.755);
                    --color-slate-950: oklch(12.9% .042 264.695);
                    --color-gray-50: oklch(98.5% .002 247.839);
                    --color-gray-100: oklch(96.7% .003 264.542);
                    --color-gray-200: oklch(92.8% .006 264.531);
                    --color-gray-300: oklch(87.2% .01 258.338);
                    --color-gray-400: oklch(70.7% .022 261.325);
                    --color-gray-500: oklch(55.1% .027 264.364);
                    --color-gray-600: oklch(44.6% .03 256.802);
                    --color-gray-700: oklch(37.3% .034 259.733);
                    --color-gray-800: oklch(27.8% .033 256.848);
                    --color-gray-900: oklch(21% .034 264.665);
                    --color-gray-950: oklch(13% .028 261.692);
                    --color-zinc-50: oklch(98.5% 0 0);
                    --color-zinc-100: oklch(96.7% .001 286.375);
                    --color-zinc-200: oklch(92% .004 286.32);
                    --color-zinc-300: oklch(87.1% .006 286.286);
                    --color-zinc-400: oklch(70.5% .015 286.067);
                    --color-zinc-500: oklch(55.2% .016 285.938);
                    --color-zinc-600: oklch(44.2% .017 285.786);
                    --color-zinc-700: oklch(37% .013 285.805);
                    --color-zinc-800: oklch(27.4% .006 286.033);
                    --color-zinc-900: oklch(21% .006 285.885);
                    --color-zinc-950: oklch(14.1% .005 285.823);
                    --color-neutral-50: oklch(98.5% 0 0);
                    --color-neutral-100: oklch(97% 0 0);
                    --color-neutral-200: oklch(92.2% 0 0);
                    --color-neutral-300: oklch(87% 0 0);
                    --color-neutral-400: oklch(70.8% 0 0);
                    --color-neutral-500: oklch(55.6% 0 0);
                    --color-neutral-600: oklch(43.9% 0 0);
                    --color-neutral-700: oklch(37.1% 0 0);
                    --color-neutral-800: oklch(26.9% 0 0);
                    --color-neutral-900: oklch(20.5% 0 0);
                    --color-neutral-950: oklch(14.5% 0 0);
                    --color-stone-50: oklch(98.5% .001 106.423);
                    --color-stone-100: oklch(97% .001 106.424);
                    --color-stone-200: oklch(92.3% .003 48.717);
                    --color-stone-300: oklch(86.9% .005 56.366);
                    --color-stone-400: oklch(70.9% .01 56.259);
                    --color-stone-500: oklch(55.3% .013 58.071);
                    --color-stone-600: oklch(44.4% .011 73.639);
                    --color-stone-700: oklch(37.4% .01 67.558);
                    --color-stone-800: oklch(26.8% .007 34.298);
                    --color-stone-900: oklch(21.6% .006 56.043);
                    --color-stone-950: oklch(14.7% .004 49.25);
                    --color-black: #000;
                    --color-white: #fff;
                    --spacing: .25rem;
                    --breakpoint-sm: 40rem;
                    --breakpoint-md: 48rem;
                    --breakpoint-lg: 64rem;
                    --breakpoint-xl: 80rem;
                    --breakpoint-2xl: 96rem;
                    --container-3xs: 16rem;
                    --container-2xs: 18rem;
                    --container-xs: 20rem;
                    --container-sm: 24rem;
                    --container-md: 28rem;
                    --container-lg: 32rem;
                    --container-xl: 36rem;
                    --container-2xl: 42rem;
                    --container-3xl: 48rem;
                    --container-4xl: 56rem;
                    --container-5xl: 64rem;
                    --container-6xl: 72rem;
                    --container-7xl: 80rem;
                    --text-xs: .75rem;
                    --text-xs--line-height: calc(1 / .75);
                    --text-sm: .875rem;
                    --text-sm--line-height: calc(1.25 / .875);
                    --text-base: 1rem;
                    --text-base--line-height: 1.5;
                    --text-lg: 1.125rem;
                    --text-lg--line-height: calc(1.75 / 1.125);
                    --text-xl: 1.25rem;
                    --text-xl--line-height: calc(1.75 / 1.25);
                    --text-2xl: 1.5rem;
                    --text-2xl--line-height: calc(2 / 1.5);
                    --text-3xl: 1.875rem;
                    --text-3xl--line-height: 1.2;
                    --text-4xl: 2.25rem;
                    --text-4xl--line-height: calc(2.5 / 2.25);
                    --text-5xl: 3rem;
                    --text-5xl--line-height: 1;
                    --text-6xl: 3.75rem;
                    --text-6xl--line-height: 1;
                    --text-7xl: 4.5rem;
                    --text-7xl--line-height: 1;
                    --text-8xl: 6rem;
                    --text-8xl--line-height: 1;
                    --text-9xl: 8rem;
                    --text-9xl--line-height: 1;
                    --font-weight-thin: 100;
                    --font-weight-extralight: 200;
                    --font-weight-light: 300;
                    --font-weight-normal: 400;
                    --font-weight-medium: 500;
                    --font-weight-semibold: 600;
                    --font-weight-bold: 700;
                    --font-weight-extrabold: 800;
                    --font-weight-black: 900;
                    --tracking-tighter: -.05em;
                    --tracking-tight: -.025em;
                    --tracking-normal: 0em;
                    --tracking-wide: .025em;
                    --tracking-wider: .05em;
                    --tracking-widest: .1em;
                    --leading-tight: 1.25;
                    --leading-snug: 1.375;
                    --leading-normal: 1.5;
                    --leading-relaxed: 1.625;
                    --leading-loose: 2;
                    --radius-xs: .125rem;
                    --radius-sm: .25rem;
                    --radius-md: .375rem;
                    --radius-lg: .5rem;
                    --radius-xl: .75rem;
                    --radius-2xl: 1rem;
                    --radius-3xl: 1.5rem;
                    --radius-4xl: 2rem;
                    --shadow-2xs: 0 1px #0000000d;
                    --shadow-xs: 0 1px 2px 0 #0000000d;
                    --shadow-sm: 0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;
                    --shadow-md: 0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;
                    --shadow-lg: 0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a;
                    --shadow-xl: 0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a;
                    --shadow-2xl: 0 25px 50px -12px #00000040;
                    --inset-shadow-2xs: inset 0 1px #0000000d;
                    --inset-shadow-xs: inset 0 1px 1px #0000000d;
                    --inset-shadow-sm: inset 0 2px 4px #0000000d;
                    --drop-shadow-xs: 0 1px 1px #0000000d;
                    --drop-shadow-sm: 0 1px 2px #00000026;
                    --drop-shadow-md: 0 3px 3px #0000001f;
                    --drop-shadow-lg: 0 4px 4px #00000026;
                    --drop-shadow-xl: 0 9px 7px #0000001a;
                    --drop-shadow-2xl: 0 25px 25px #00000026;
                    --ease-in: cubic-bezier(.4, 0, 1, 1);
                    --ease-out: cubic-bezier(0, 0, .2, 1);
                    --ease-in-out: cubic-bezier(.4, 0, .2, 1);
                    --animate-spin: spin 1s linear infinite;
                    --animate-ping: ping 1s cubic-bezier(0, 0, .2, 1) infinite;
                    --animate-pulse: pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;
                    --animate-bounce: bounce 1s infinite;
                    --blur-xs: 4px;
                    --blur-sm: 8px;
                    --blur-md: 12px;
                    --blur-lg: 16px;
                    --blur-xl: 24px;
                    --blur-2xl: 40px;
                    --blur-3xl: 64px;
                    --perspective-dramatic: 100px;
                    --perspective-near: 300px;
                    --perspective-normal: 500px;
                    --perspective-midrange: 800px;
                    --perspective-distant: 1200px;
                    --aspect-video: 16 / 9;
                    --default-transition-duration: .15s;
                    --default-transition-timing-function: cubic-bezier(.4, 0, .2, 1);
                    --default-font-family: var(--font-sans);
                    --default-mono-font-family: var(--font-mono)
                }
            }

            @layer base {

                *,
                :after,
                :before,
                ::backdrop {
                    box-sizing: border-box;
                    border: 0 solid;
                    margin: 0;
                    padding: 0
                }

                ::file-selector-button {
                    box-sizing: border-box;
                    border: 0 solid;
                    margin: 0;
                    padding: 0
                }

                html,
                :host {
                    -webkit-text-size-adjust: 100%;
                    tab-size: 4;
                    line-height: 1.5;
                    font-family: var(--default-font-family, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");
                    font-feature-settings: var(--default-font-feature-settings, normal);
                    font-variation-settings: var(--default-font-variation-settings, normal);
                    -webkit-tap-highlight-color: transparent
                }

                hr {
                    height: 0;
                    color: inherit;
                    border-top-width: 1px
                }

                abbr:where([title]) {
                    -webkit-text-decoration: underline dotted;
                    text-decoration: underline dotted
                }

                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    font-size: inherit;
                    font-weight: inherit
                }

                a {
                    color: inherit;
                    -webkit-text-decoration: inherit;
                    text-decoration: inherit
                }

                b,
                strong {
                    font-weight: bolder
                }

                code,
                kbd,
                samp,
                pre {
                    font-family: var(--default-mono-font-family, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace);
                    font-feature-settings: var(--default-mono-font-feature-settings, normal);
                    font-variation-settings: var(--default-mono-font-variation-settings, normal);
                    font-size: 1em
                }

                small {
                    font-size: 80%
                }

                sub,
                sup {
                    vertical-align: baseline;
                    font-size: 75%;
                    line-height: 0;
                    position: relative
                }

                sub {
                    bottom: -.25em
                }

                sup {
                    top: -.5em
                }

                table {
                    text-indent: 0;
                    border-color: inherit;
                    border-collapse: collapse
                }

                :-moz-focusring {
                    outline: auto
                }

                progress {
                    vertical-align: baseline
                }

                summary {
                    display: list-item
                }

                ol,
                ul,
                menu {
                    list-style: none
                }

                img,
                svg,
                video,
                canvas,
                audio,
                iframe,
                embed,
                object {
                    vertical-align: middle;
                    display: block
                }

                img,
                video {
                    max-width: 100%;
                    height: auto
                }

                button,
                input,
                select,
                optgroup,
                textarea {
                    font: inherit;
                    font-feature-settings: inherit;
                    font-variation-settings: inherit;
                    letter-spacing: inherit;
                    color: inherit;
                    opacity: 1;
                    background-color: #0000;
                    border-radius: 0
                }

                ::file-selector-button {
                    font: inherit;
                    font-feature-settings: inherit;
                    font-variation-settings: inherit;
                    letter-spacing: inherit;
                    color: inherit;
                    opacity: 1;
                    background-color: #0000;
                    border-radius: 0
                }

                :where(select:is([multiple], [size])) optgroup {
                    font-weight: bolder
                }

                :where(select:is([multiple], [size])) optgroup option {
                    padding-inline-start: 20px
                }

                ::file-selector-button {
                    margin-inline-end: 4px
                }

                ::placeholder {
                    opacity: 1
                }

                @supports (not ((-webkit-appearance:-apple-pay-button))) or (contain-intrinsic-size:1px) {
                    ::placeholder {
                        color: currentColor
                    }

                    @supports (color:color-mix(in lab, red, red)) {
                        ::placeholder {
                            color: color-mix(in oklab, currentcolor 50%, transparent)
                        }
                    }
                }

                textarea {
                    resize: vertical
                }

                ::-webkit-search-decoration {
                    -webkit-appearance: none
                }

                ::-webkit-date-and-time-value {
                    min-height: 1lh;
                    text-align: inherit
                }

                ::-webkit-datetime-edit {
                    display: inline-flex
                }

                ::-webkit-datetime-edit-fields-wrapper {
                    padding: 0
                }

                ::-webkit-datetime-edit {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-year-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-month-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-day-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-hour-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-minute-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-second-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-millisecond-field {
                    padding-block: 0
                }

                ::-webkit-datetime-edit-meridiem-field {
                    padding-block: 0
                }

                ::-webkit-calendar-picker-indicator {
                    line-height: 1
                }

                :-moz-ui-invalid {
                    box-shadow: none
                }

                button,
                input:where([type=button], [type=reset], [type=submit]) {
                    appearance: button
                }

                ::file-selector-button {
                    appearance: button
                }

                ::-webkit-inner-spin-button {
                    height: auto
                }

                ::-webkit-outer-spin-button {
                    height: auto
                }

                [hidden]:where(:not([hidden=until-found])) {
                    display: none !important
                }
            }

            @layer components;

            @layer utilities {
                .absolute {
                    position: absolute
                }

                .fixed {
                    position: fixed
                }

                .relative {
                    position: relative
                }

                .static {
                    position: static
                }

                .inset-0 {
                    inset: calc(var(--spacing) * 0)
                }

                .start {
                    inset-inline-start: var(--spacing)
                }

                .top-0 {
                    top: calc(var(--spacing) * 0)
                }

                .right-0 {
                    right: calc(var(--spacing) * 0)
                }

                .container {
                    width: 100%
                }

                @media(min-width:40rem) {
                    .container {
                        max-width: 40rem
                    }
                }

                @media(min-width:48rem) {
                    .container {
                        max-width: 48rem
                    }
                }

                @media(min-width:64rem) {
                    .container {
                        max-width: 64rem
                    }
                }

                @media(min-width:80rem) {
                    .container {
                        max-width: 80rem
                    }
                }

                @media(min-width:96rem) {
                    .container {
                        max-width: 96rem
                    }
                }

                .mx-auto {
                    margin-inline: auto
                }

                .-mt-\[6\.6rem\] {
                    margin-top: -6.6rem
                }

                .-mt-px {
                    margin-top: -1px
                }

                .mt-2 {
                    margin-top: calc(var(--spacing) * 2)
                }

                .mt-4 {
                    margin-top: calc(var(--spacing) * 4)
                }

                .mt-6 {
                    margin-top: calc(var(--spacing) * 6)
                }

                .mt-8 {
                    margin-top: calc(var(--spacing) * 8)
                }

                .mr-2 {
                    margin-right: calc(var(--spacing) * 2)
                }

                .-mb-px {
                    margin-bottom: -1px
                }

                .mb-1 {
                    margin-bottom: calc(var(--spacing) * 1)
                }

                .mb-2 {
                    margin-bottom: calc(var(--spacing) * 2)
                }

                .mb-4 {
                    margin-bottom: calc(var(--spacing) * 4)
                }

                .mb-6 {
                    margin-bottom: calc(var(--spacing) * 6)
                }

                .-ml-8 {
                    margin-left: calc(var(--spacing) * -8)
                }

                .-ml-px {
                    margin-left: -1px
                }

                .ml-1 {
                    margin-left: calc(var(--spacing) * 1)
                }

                .ml-2 {
                    margin-left: calc(var(--spacing) * 2)
                }

                .ml-4 {
                    margin-left: calc(var(--spacing) * 4)
                }

                .ml-12 {
                    margin-left: calc(var(--spacing) * 12)
                }

                .contents {
                    display: contents
                }

                .flex {
                    display: flex
                }

                .grid {
                    display: grid
                }

                .hidden {
                    display: none
                }

                .inline-block {
                    display: inline-block
                }

                .inline-flex {
                    display: inline-flex
                }

                .table {
                    display: table
                }

                .aspect-\[335\/364\] {
                    aspect-ratio: 335/364
                }

                .h-1 {
                    height: calc(var(--spacing) * 1)
                }

                .h-1\.5 {
                    height: calc(var(--spacing) * 1.5)
                }

                .h-2 {
                    height: calc(var(--spacing) * 2)
                }

                .h-2\.5 {
                    height: calc(var(--spacing) * 2.5)
                }

                .h-3 {
                    height: calc(var(--spacing) * 3)
                }

                .h-3\.5 {
                    height: calc(var(--spacing) * 3.5)
                }

                .h-5 {
                    height: calc(var(--spacing) * 5)
                }

                .h-8 {
                    height: calc(var(--spacing) * 8)
                }

                .h-14 {
                    height: calc(var(--spacing) * 14)
                }

                .h-14\.5 {
                    height: calc(var(--spacing) * 14.5)
                }

                .h-16 {
                    height: calc(var(--spacing) * 16)
                }

                .min-h-screen {
                    min-height: 100vh
                }

                .w-1 {
                    width: calc(var(--spacing) * 1)
                }

                .w-1\.5 {
                    width: calc(var(--spacing) * 1.5)
                }

                .w-2 {
                    width: calc(var(--spacing) * 2)
                }

                .w-2\.5 {
                    width: calc(var(--spacing) * 2.5)
                }

                .w-3 {
                    width: calc(var(--spacing) * 3)
                }

                .w-3\.5 {
                    width: calc(var(--spacing) * 3.5)
                }

                .w-5 {
                    width: calc(var(--spacing) * 5)
                }

                .w-8 {
                    width: calc(var(--spacing) * 8)
                }

                .w-\[438px\] {
                    width: 438px
                }

                .w-auto {
                    width: auto
                }

                .w-full {
                    width: 100%
                }

                .max-w-6xl {
                    max-width: var(--container-6xl)
                }

                .max-w-\[335px\] {
                    max-width: 335px
                }

                .max-w-none {
                    max-width: none
                }

                .max-w-xl {
                    max-width: var(--container-xl)
                }

                .flex-1 {
                    flex: 1
                }

                .shrink-0 {
                    flex-shrink: 0
                }

                .translate-y-0 {
                    --tw-translate-y: calc(var(--spacing) * 0);
                    translate: var(--tw-translate-x) var(--tw-translate-y)
                }

                .transform {
                    transform: var(--tw-rotate-x, ) var(--tw-rotate-y, ) var(--tw-rotate-z, ) var(--tw-skew-x, ) var(--tw-skew-y, )
                }

                .cursor-default {
                    cursor: default
                }

                .cursor-not-allowed {
                    cursor: not-allowed
                }

                .grid-cols-1 {
                    grid-template-columns: repeat(1, minmax(0, 1fr))
                }

                .flex-col {
                    flex-direction: column
                }

                .flex-col-reverse {
                    flex-direction: column-reverse
                }

                .items-center {
                    align-items: center
                }

                .justify-between {
                    justify-content: space-between
                }

                .justify-center {
                    justify-content: center
                }

                .justify-end {
                    justify-content: flex-end
                }

                .justify-items-center {
                    justify-items: center
                }

                .gap-2 {
                    gap: calc(var(--spacing) * 2)
                }

                .gap-3 {
                    gap: calc(var(--spacing) * 3)
                }

                .gap-4 {
                    gap: calc(var(--spacing) * 4)
                }

                :where(.space-x-1>:not(:last-child)) {
                    --tw-space-x-reverse: 0;
                    margin-inline-start: calc(calc(var(--spacing) * 1) * var(--tw-space-x-reverse));
                    margin-inline-end: calc(calc(var(--spacing) * 1) * calc(1 - var(--tw-space-x-reverse)))
                }

                .overflow-hidden {
                    overflow: hidden
                }

                .rounded-full {
                    border-radius: 3.40282e38px
                }

                .rounded-md {
                    border-radius: var(--radius-md)
                }

                .rounded-sm {
                    border-radius: var(--radius-sm)
                }

                .rounded-t-lg {
                    border-top-left-radius: var(--radius-lg);
                    border-top-right-radius: var(--radius-lg)
                }

                .rounded-l-md {
                    border-top-left-radius: var(--radius-md);
                    border-bottom-left-radius: var(--radius-md)
                }

                .rounded-r-md {
                    border-top-right-radius: var(--radius-md);
                    border-bottom-right-radius: var(--radius-md)
                }

                .rounded-br-lg {
                    border-bottom-right-radius: var(--radius-lg)
                }

                .rounded-bl-lg {
                    border-bottom-left-radius: var(--radius-lg)
                }

                .border {
                    border-style: var(--tw-border-style);
                    border-width: 1px
                }

                .border-t {
                    border-top-style: var(--tw-border-style);
                    border-top-width: 1px
                }

                .border-r {
                    border-right-style: var(--tw-border-style);
                    border-right-width: 1px
                }

                .border-\[\#19140035\] {
                    border-color: #19140035
                }

                .border-\[\#e3e3e0\] {
                    border-color: #e3e3e0
                }

                .border-black {
                    border-color: var(--color-black)
                }

                .border-gray-200 {
                    border-color: var(--color-gray-200)
                }

                .border-gray-300 {
                    border-color: var(--color-gray-300)
                }

                .border-gray-400 {
                    border-color: var(--color-gray-400)
                }

                .border-transparent {
                    border-color: #0000
                }

                .bg-\[\#1b1b18\] {
                    background-color: #1b1b18
                }

                .bg-\[\#FDFDFC\] {
                    background-color: #fdfdfc
                }

                .bg-\[\#dbdbd7\] {
                    background-color: #dbdbd7
                }

                .bg-\[\#fff2f2\] {
                    background-color: #fff2f2
                }

                .bg-gray-100 {
                    background-color: var(--color-gray-100)
                }

                .bg-gray-200 {
                    background-color: var(--color-gray-200)
                }

                .bg-white {
                    background-color: var(--color-white)
                }

                .p-6 {
                    padding: calc(var(--spacing) * 6)
                }

                .px-2 {
                    padding-inline: calc(var(--spacing) * 2)
                }

                .px-4 {
                    padding-inline: calc(var(--spacing) * 4)
                }

                .px-5 {
                    padding-inline: calc(var(--spacing) * 5)
                }

                .px-6 {
                    padding-inline: calc(var(--spacing) * 6)
                }

                .py-1 {
                    padding-block: calc(var(--spacing) * 1)
                }

                .py-1\.5 {
                    padding-block: calc(var(--spacing) * 1.5)
                }

                .py-2 {
                    padding-block: calc(var(--spacing) * 2)
                }

                .py-4 {
                    padding-block: calc(var(--spacing) * 4)
                }

                .pt-8 {
                    padding-top: calc(var(--spacing) * 8)
                }

                .pb-6 {
                    padding-bottom: calc(var(--spacing) * 6)
                }

                .pb-12 {
                    padding-bottom: calc(var(--spacing) * 12)
                }

                .text-center {
                    text-align: center
                }

                .text-lg {
                    font-size: var(--text-lg);
                    line-height: var(--tw-leading, var(--text-lg--line-height))
                }

                .text-sm {
                    font-size: var(--text-sm);
                    line-height: var(--tw-leading, var(--text-sm--line-height))
                }

                .text-\[13px\] {
                    font-size: 13px
                }

                .leading-5 {
                    --tw-leading: calc(var(--spacing) * 5);
                    line-height: calc(var(--spacing) * 5)
                }

                .leading-7 {
                    --tw-leading: calc(var(--spacing) * 7);
                    line-height: calc(var(--spacing) * 7)
                }

                .leading-\[20px\] {
                    --tw-leading: 20px;
                    line-height: 20px
                }

                .leading-normal {
                    --tw-leading: var(--leading-normal);
                    line-height: var(--leading-normal)
                }

                .font-medium {
                    --tw-font-weight: var(--font-weight-medium);
                    font-weight: var(--font-weight-medium)
                }

                .font-semibold {
                    --tw-font-weight: var(--font-weight-semibold);
                    font-weight: var(--font-weight-semibold)
                }

                .tracking-wider {
                    --tw-tracking: var(--tracking-wider);
                    letter-spacing: var(--tracking-wider)
                }

                .text-\[\#1B1B18\],
                .text-\[\#1b1b18\] {
                    color: #1b1b18
                }

                .text-\[\#706f6c\] {
                    color: #706f6c
                }

                .text-\[\#F3BEC7\] {
                    color: #f3bec7
                }

                .text-\[\#F8B803\] {
                    color: #f8b803
                }

                .text-\[\#F53003\],
                .text-\[\#f53003\] {
                    color: #f53003
                }

                .text-gray-200 {
                    color: var(--color-gray-200)
                }

                .text-gray-300 {
                    color: var(--color-gray-300)
                }

                .text-gray-400 {
                    color: var(--color-gray-400)
                }

                .text-gray-500 {
                    color: var(--color-gray-500)
                }

                .text-gray-600 {
                    color: var(--color-gray-600)
                }

                .text-gray-700 {
                    color: var(--color-gray-700)
                }

                .text-gray-800 {
                    color: var(--color-gray-800)
                }

                .text-gray-900 {
                    color: var(--color-gray-900)
                }

                .text-white {
                    color: var(--color-white)
                }

                .uppercase {
                    text-transform: uppercase
                }

                .underline {
                    text-decoration-line: underline
                }

                .underline-offset-4 {
                    text-underline-offset: 4px
                }

                .antialiased {
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale
                }

                .opacity-100 {
                    opacity: 1
                }

                .mix-blend-color {
                    mix-blend-mode: color
                }

                .mix-blend-darken {
                    mix-blend-mode: darken
                }

                .mix-blend-hard-light {
                    mix-blend-mode: hard-light
                }

                .mix-blend-multiply {
                    mix-blend-mode: multiply
                }

                .shadow {
                    --tw-shadow: 0 1px 3px 0 var(--tw-shadow-color, #0000001a), 0 1px 2px -1px var(--tw-shadow-color, #0000001a);
                    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)
                }

                .shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\] {
                    --tw-shadow: 0px 0px 1px 0px var(--tw-shadow-color, #00000008), 0px 1px 2px 0px var(--tw-shadow-color, #0000000f);
                    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)
                }

                .shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\] {
                    --tw-shadow: inset 0px 0px 0px 1px var(--tw-shadow-color, #1a1a0029);
                    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)
                }

                .shadow-sm {
                    --tw-shadow: 0 1px 3px 0 var(--tw-shadow-color, #0000001a), 0 1px 2px -1px var(--tw-shadow-color, #0000001a);
                    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)
                }

                .ring-gray-300 {
                    --tw-ring-color: var(--color-gray-300)
                }

                .filter {
                    filter: var(--tw-blur, ) var(--tw-brightness, ) var(--tw-contrast, ) var(--tw-grayscale, ) var(--tw-hue-rotate, ) var(--tw-invert, ) var(--tw-saturate, ) var(--tw-sepia, ) var(--tw-drop-shadow, )
                }

                .transition {
                    transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, --tw-gradient-from, --tw-gradient-via, --tw-gradient-to, opacity, box-shadow, transform, translate, scale, rotate, filter, -webkit-backdrop-filter, backdrop-filter, display, content-visibility, overlay, pointer-events;
                    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
                    transition-duration: var(--tw-duration, var(--default-transition-duration))
                }

                .transition-all {
                    transition-property: all;
                    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
                    transition-duration: var(--tw-duration, var(--default-transition-duration))
                }

                .transition-opacity {
                    transition-property: opacity;
                    transition-timing-function: var(--tw-ease, var(--default-transition-timing-function));
                    transition-duration: var(--tw-duration, var(--default-transition-duration))
                }

                .delay-200 {
                    transition-delay: .2s
                }

                .delay-300 {
                    transition-delay: .3s
                }

                .delay-400 {
                    transition-delay: .4s
                }

                .duration-150 {
                    --tw-duration: .15s;
                    transition-duration: .15s
                }

                .duration-750 {
                    --tw-duration: .75s;
                    transition-duration: .75s
                }

                .ease-in-out {
                    --tw-ease: var(--ease-in-out);
                    transition-timing-function: var(--ease-in-out)
                }

                .\[--stroke-color\:\#1B1B18\] {
                    --stroke-color: #1b1b18
                }

                .not-has-\[nav\]\:hidden:not(:has(:is(nav))) {
                    display: none
                }

                .before\:absolute:before {
                    content: var(--tw-content);
                    position: absolute
                }

                .before\:top-0:before {
                    content: var(--tw-content);
                    top: calc(var(--spacing) * 0)
                }

                .before\:top-1\/2:before {
                    content: var(--tw-content);
                    top: 50%
                }

                .before\:bottom-0:before {
                    content: var(--tw-content);
                    bottom: calc(var(--spacing) * 0)
                }

                .before\:bottom-1\/2:before {
                    content: var(--tw-content);
                    bottom: 50%
                }

                .before\:left-\[0\.4rem\]:before {
                    content: var(--tw-content);
                    left: .4rem
                }

                .before\:border-l:before {
                    content: var(--tw-content);
                    border-left-style: var(--tw-border-style);
                    border-left-width: 1px
                }

                .before\:border-\[\#e3e3e0\]:before {
                    content: var(--tw-content);
                    border-color: #e3e3e0
                }

                @media(hover:hover) {
                    .hover\:border-\[\#1915014a\]:hover {
                        border-color: #1915014a
                    }

                    .hover\:border-\[\#19140035\]:hover {
                        border-color: #19140035
                    }

                    .hover\:border-black:hover {
                        border-color: var(--color-black)
                    }

                    .hover\:bg-black:hover {
                        background-color: var(--color-black)
                    }

                    .hover\:bg-gray-100:hover {
                        background-color: var(--color-gray-100)
                    }

                    .hover\:text-gray-400:hover {
                        color: var(--color-gray-400)
                    }

                    .hover\:text-gray-700:hover {
                        color: var(--color-gray-700)
                    }
                }

                .focus\:border-blue-300:focus {
                    border-color: var(--color-blue-300)
                }

                .focus\:ring:focus {
                    --tw-ring-shadow: var(--tw-ring-inset, ) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color, currentcolor);
                    box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)
                }

                .focus\:outline-none:focus {
                    --tw-outline-style: none;
                    outline-style: none
                }

                .active\:bg-gray-100:active {
                    background-color: var(--color-gray-100)
                }

                .active\:text-gray-500:active {
                    color: var(--color-gray-500)
                }

                .active\:text-gray-700:active {
                    color: var(--color-gray-700)
                }

                .active\:text-gray-800:active {
                    color: var(--color-gray-800)
                }

                @media(min-width:40rem) {
                    .sm\:flex {
                        display: flex
                    }

                    .sm\:hidden {
                        display: none
                    }

                    .sm\:flex-1 {
                        flex: 1
                    }

                    .sm\:items-center {
                        align-items: center
                    }

                    .sm\:justify-between {
                        justify-content: space-between
                    }

                    .sm\:justify-start {
                        justify-content: flex-start
                    }

                    .sm\:gap-2 {
                        gap: calc(var(--spacing) * 2)
                    }

                    .sm\:px-6 {
                        padding-inline: calc(var(--spacing) * 6)
                    }

                    .sm\:pt-0 {
                        padding-top: calc(var(--spacing) * 0)
                    }
                }

                @media(min-width:64rem) {
                    .lg\:mt-10 {
                        margin-top: calc(var(--spacing) * 10)
                    }

                    .lg\:mb-0 {
                        margin-bottom: calc(var(--spacing) * 0)
                    }

                    .lg\:mb-6 {
                        margin-bottom: calc(var(--spacing) * 6)
                    }

                    .lg\:-ml-px {
                        margin-left: -1px
                    }

                    .lg\:ml-0 {
                        margin-left: calc(var(--spacing) * 0)
                    }

                    .lg\:block {
                        display: block
                    }

                    .lg\:aspect-auto {
                        aspect-ratio: auto
                    }

                    .lg\:w-\[438px\] {
                        width: 438px
                    }

                    .lg\:max-w-4xl {
                        max-width: var(--container-4xl)
                    }

                    .lg\:grow {
                        flex-grow: 1
                    }

                    .lg\:flex-row {
                        flex-direction: row
                    }

                    .lg\:justify-center {
                        justify-content: center
                    }

                    .lg\:rounded-t-none {
                        border-top-left-radius: 0;
                        border-top-right-radius: 0
                    }

                    .lg\:rounded-tl-lg {
                        border-top-left-radius: var(--radius-lg)
                    }

                    .lg\:rounded-r-lg {
                        border-top-right-radius: var(--radius-lg);
                        border-bottom-right-radius: var(--radius-lg)
                    }

                    .lg\:rounded-br-none {
                        border-bottom-right-radius: 0
                    }

                    .lg\:p-8 {
                        padding: calc(var(--spacing) * 8)
                    }

                    .lg\:p-20 {
                        padding: calc(var(--spacing) * 20)
                    }

                    .lg\:px-8 {
                        padding-inline: calc(var(--spacing) * 8)
                    }

                    .lg\:pb-10 {
                        padding-bottom: calc(var(--spacing) * 10)
                    }
                }

                .rtl\:flex-row-reverse:where(:dir(rtl), [dir=rtl], [dir=rtl] *) {
                    flex-direction: row-reverse
                }

                @media(prefers-color-scheme:dark) {
                    .dark\:border-\[\#3E3E3A\] {
                        border-color: #3e3e3a
                    }

                    .dark\:border-\[\#eeeeec\] {
                        border-color: #eeeeec
                    }

                    .dark\:border-gray-600 {
                        border-color: var(--color-gray-600)
                    }

                    .dark\:bg-\[\#0a0a0a\] {
                        background-color: #0a0a0a
                    }

                    .dark\:bg-\[\#1D0002\] {
                        background-color: #1d0002
                    }

                    .dark\:bg-\[\#3E3E3A\] {
                        background-color: #3e3e3a
                    }

                    .dark\:bg-\[\#161615\] {
                        background-color: #161615
                    }

                    .dark\:bg-\[\#eeeeec\] {
                        background-color: #eeeeec
                    }

                    .dark\:bg-gray-700 {
                        background-color: var(--color-gray-700)
                    }

                    .dark\:bg-gray-800 {
                        background-color: var(--color-gray-800)
                    }

                    .dark\:bg-gray-900 {
                        background-color: var(--color-gray-900)
                    }

                    .dark\:text-\[\#1C1C1A\] {
                        color: #1c1c1a
                    }

                    .dark\:text-\[\#4B0600\] {
                        color: #4b0600
                    }

                    .dark\:text-\[\#391800\] {
                        color: #391800
                    }

                    .dark\:text-\[\#733000\] {
                        color: #733000
                    }

                    .dark\:text-\[\#A1A09A\] {
                        color: #a1a09a
                    }

                    .dark\:text-\[\#EDEDEC\] {
                        color: #ededec
                    }

                    .dark\:text-\[\#F61500\] {
                        color: #f61500
                    }

                    .dark\:text-\[\#FF4433\] {
                        color: #f43
                    }

                    .dark\:text-black {
                        color: var(--color-black)
                    }

                    .dark\:text-gray-200 {
                        color: var(--color-gray-200)
                    }

                    .dark\:text-gray-300 {
                        color: var(--color-gray-300)
                    }

                    .dark\:text-gray-400 {
                        color: var(--color-gray-400)
                    }

                    .dark\:text-gray-600 {
                        color: var(--color-gray-600)
                    }

                    .dark\:mix-blend-hard-light {
                        mix-blend-mode: hard-light
                    }

                    .dark\:mix-blend-normal {
                        mix-blend-mode: normal
                    }

                    .dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\] {
                        --tw-shadow: inset 0px 0px 0px 1px var(--tw-shadow-color, #fffaed2d);
                        box-shadow: var(--tw-inset-shadow), var(--tw-inset-ring-shadow), var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)
                    }

                    .dark\:\[--stroke-color\:\#FF750F\] {
                        --stroke-color: #ff750f
                    }

                    .dark\:before\:border-\[\#3E3E3A\]:before {
                        content: var(--tw-content);
                        border-color: #3e3e3a
                    }

                    @media(hover:hover) {
                        .dark\:hover\:border-\[\#3E3E3A\]:hover {
                            border-color: #3e3e3a
                        }

                        .dark\:hover\:border-\[\#62605b\]:hover {
                            border-color: #62605b
                        }

                        .dark\:hover\:border-white:hover {
                            border-color: var(--color-white)
                        }

                        .dark\:hover\:bg-gray-900:hover {
                            background-color: var(--color-gray-900)
                        }

                        .dark\:hover\:bg-white:hover {
                            background-color: var(--color-white)
                        }

                        .dark\:hover\:text-gray-200:hover {
                            color: var(--color-gray-200)
                        }

                        .dark\:hover\:text-gray-300:hover {
                            color: var(--color-gray-300)
                        }
                    }

                    .dark\:focus\:border-blue-700:focus {
                        border-color: var(--color-blue-700)
                    }

                    .dark\:focus\:border-blue-800:focus {
                        border-color: var(--color-blue-800)
                    }

                    .dark\:active\:bg-gray-700:active {
                        background-color: var(--color-gray-700)
                    }

                    .dark\:active\:text-gray-300:active {
                        color: var(--color-gray-300)
                    }
                }

                @starting-style {
                    .starting\:opacity-0 {
                        opacity: 0
                    }
                }

                @media(prefers-reduced-motion:no-preference) {
                    @starting-style {
                        .motion-safe\:starting\:-translate-x-\[26px\] {
                            --tw-translate-x: -26px;
                            translate: var(--tw-translate-x) var(--tw-translate-y)
                        }
                    }

                    @starting-style {
                        .motion-safe\:starting\:-translate-x-\[51px\] {
                            --tw-translate-x: -51px;
                            translate: var(--tw-translate-x) var(--tw-translate-y)
                        }
                    }

                    @starting-style {
                        .motion-safe\:starting\:-translate-x-\[78px\] {
                            --tw-translate-x: -78px;
                            translate: var(--tw-translate-x) var(--tw-translate-y)
                        }
                    }

                    @starting-style {
                        .motion-safe\:starting\:-translate-x-\[102px\] {
                            --tw-translate-x: -102px;
                            translate: var(--tw-translate-x) var(--tw-translate-y)
                        }
                    }

                    @starting-style {
                        .motion-safe\:starting\:translate-y-6 {
                            --tw-translate-y: calc(var(--spacing) * 6);
                            translate: var(--tw-translate-x) var(--tw-translate-y)
                        }
                    }
                }
            }

            @property --tw-translate-x {
                syntax: "*";
                inherits: false;
                initial-value: 0
            }

            @property --tw-translate-y {
                syntax: "*";
                inherits: false;
                initial-value: 0
            }

            @property --tw-translate-z {
                syntax: "*";
                inherits: false;
                initial-value: 0
            }

            @property --tw-rotate-x {
                syntax: "*";
                inherits: false
            }

            @property --tw-rotate-y {
                syntax: "*";
                inherits: false
            }

            @property --tw-rotate-z {
                syntax: "*";
                inherits: false
            }

            @property --tw-skew-x {
                syntax: "*";
                inherits: false
            }

            @property --tw-skew-y {
                syntax: "*";
                inherits: false
            }

            @property --tw-space-x-reverse {
                syntax: "*";
                inherits: false;
                initial-value: 0
            }

            @property --tw-border-style {
                syntax: "*";
                inherits: false;
                initial-value: solid
            }

            @property --tw-leading {
                syntax: "*";
                inherits: false
            }

            @property --tw-font-weight {
                syntax: "*";
                inherits: false
            }

            @property --tw-tracking {
                syntax: "*";
                inherits: false
            }

            @property --tw-shadow {
                syntax: "*";
                inherits: false;
                initial-value: 0 0 #0000
            }

            @property --tw-shadow-color {
                syntax: "*";
                inherits: false
            }

            @property --tw-shadow-alpha {
                syntax: "<percentage>";
                inherits: false;
                initial-value: 100%
            }

            @property --tw-inset-shadow {
                syntax: "*";
                inherits: false;
                initial-value: 0 0 #0000
            }

            @property --tw-inset-shadow-color {
                syntax: "*";
                inherits: false
            }

            @property --tw-inset-shadow-alpha {
                syntax: "<percentage>";
                inherits: false;
                initial-value: 100%
            }

            @property --tw-ring-color {
                syntax: "*";
                inherits: false
            }

            @property --tw-ring-shadow {
                syntax: "*";
                inherits: false;
                initial-value: 0 0 #0000
            }

            @property --tw-inset-ring-color {
                syntax: "*";
                inherits: false
            }

            @property --tw-inset-ring-shadow {
                syntax: "*";
                inherits: false;
                initial-value: 0 0 #0000
            }

            @property --tw-ring-inset {
                syntax: "*";
                inherits: false
            }

            @property --tw-ring-offset-width {
                syntax: "<length>";
                inherits: false;
                initial-value: 0
            }

            @property --tw-ring-offset-color {
                syntax: "*";
                inherits: false;
                initial-value: #fff
            }

            @property --tw-ring-offset-shadow {
                syntax: "*";
                inherits: false;
                initial-value: 0 0 #0000
            }

            @property --tw-blur {
                syntax: "*";
                inherits: false
            }

            @property --tw-brightness {
                syntax: "*";
                inherits: false
            }

            @property --tw-contrast {
                syntax: "*";
                inherits: false
            }

            @property --tw-grayscale {
                syntax: "*";
                inherits: false
            }

            @property --tw-hue-rotate {
                syntax: "*";
                inherits: false
            }

            @property --tw-invert {
                syntax: "*";
                inherits: false
            }

            @property --tw-opacity {
                syntax: "*";
                inherits: false
            }

            @property --tw-saturate {
                syntax: "*";
                inherits: false
            }

            @property --tw-sepia {
                syntax: "*";
                inherits: false
            }

            @property --tw-drop-shadow {
                syntax: "*";
                inherits: false
            }

            @property --tw-drop-shadow-color {
                syntax: "*";
                inherits: false
            }

            @property --tw-drop-shadow-alpha {
                syntax: "<percentage>";
                inherits: false;
                initial-value: 100%
            }

            @property --tw-drop-shadow-size {
                syntax: "*";
                inherits: false
            }

            @property --tw-duration {
                syntax: "*";
                inherits: false
            }

            @property --tw-ease {
                syntax: "*";
                inherits: false
            }

            @property --tw-content {
                syntax: "*";
                inherits: false;
                initial-value: ""
            }

            @keyframes spin {
                to {
                    transform: rotate(360deg)
                }
            }

            @keyframes ping {

                75%,
                to {
                    opacity: 0;
                    transform: scale(2)
                }
            }

            @keyframes pulse {
                50% {
                    opacity: .5
                }
            }

            @keyframes bounce {

                0%,
                to {
                    animation-timing-function: cubic-bezier(.8, 0, 1, 1);
                    transform: translateY(-25%)
                }

                50% {
                    animation-timing-function: cubic-bezier(0, 0, .2, 1);
                    transform: none
                }
            }
        </style>
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] m-0" style="overflow:hidden">
    <div class="snap-container"
        style="overflow-y:scroll;scroll-snap-type:y mandatory;height:100vh;scrollbar-width:none;-ms-overflow-style:none">
        <style>
            html.dark nav {
                background: rgba(10, 10, 10, .85) !important;
            }

            .snap-container::-webkit-scrollbar {
                display: none
            }
        </style>
        <nav class="fixed top-0 left-0 right-0 z-50 h-14 flex items-center justify-center px-5 border-b border-[#e3e3e0] dark:border-[#3E3E3A]"
            style="background:rgba(253,253,252,.85);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px)">
            <div class="flex items-center gap-9 w-full max-w-6xl px-0 lg:px-8">
                <a href="#hero-section"
                    class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    <span
                        class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold"
                        style="font-family:Georgia,serif;border-radius:3px">L</span>
                    <span data-translate-key="Lina">{{ __("Lina") }}</span>
                </a>
                <div class="hidden md:flex items-center gap-6 text-sm flex-1 justify-center">
                    <a href="#hero-section" data-translate-key="Hero"
                        class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Hero") }}</a>
                    <a href="#about" data-translate-key="About Me"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("About Me") }}</a>
                    <a href="#portfolio" data-translate-key="Portfolio"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Portfolio") }}</a>
                    <a href="#stories" data-translate-key="Stories"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Stories") }}</a>
                    <a href="/reels" data-translate-key="Reels"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Reels") }}</a>
                    <a href="#tips" data-translate-key="Tips & Insights"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Tips & Insights") }}</a>
                </div>
                <div class="flex items-center gap-3 text-sm">
                    <button onclick="toggleDark()"
                        class="w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all"
                        title="Toggle theme">
                        <svg class="dark:hidden block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg class="hidden dark:block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                    <a href="{{ route('lang.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
                        onclick="event.preventDefault(); switchLanguage(document.documentElement.lang === 'ar' ? 'en' : 'ar');"
                        class="lang-btn w-8 h-8 flex items-center justify-center rounded-full text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] transition-all text-xs font-semibold">{{ app()->getLocale() === 'ar' ? 'AR' : 'EN' }}</a>
                    <a href="/login" data-translate-key="Login"
                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Login") }}</a>
                    <a href="/register" data-translate-key="Register"
                        class="px-3.5 py-1.5 rounded-sm text-xs font-medium text-white hover:opacity-90 transition-opacity shadow-[0_0_0_1px_rgba(26,26,0,0.08)] bg-[#c42802] dark:bg-[#FF4433]">{{ __("Register") }}</a>
                </div>
            </div>
        </nav>

        @php $h = $hero ?? null; @endphp
        <!-- ===== HERO SECTION (New Design) ===== -->
        <section id="hero-section" class="min-h-screen flex items-center bg-[#FFFFFF] dark:bg-[#0a0a0a]"
            style="scroll-snap-align:start">
            <div
                class="max-w-6xl mx-auto px-6 lg:px-10 w-full flex flex-col lg:flex-row items-start justify-between gap-8 lg:gap-10 py-16 lg:py-20 relative">
                <!-- Left Column -->
                <div class="flex flex-col max-w-[280px] z-[2] lg:mt-10">
                    <p data-translate-key="Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today."
                        class="text-xs md:text-sm leading-relaxed text-[#333] dark:text-[#A1A09A] mb-8 max-w-[220px]">
                        {{ __("Innovative interior designs blending luxury with functionality. Explore our behind-the-scenes, daily design reels, and start your home transformation journey today.") }}
                    </p>
                    <h1 data-translate-html="Interior<br>Design"
                        class="font-['Playfair_Display',serif] text-5xl sm:text-6xl lg:text-7xl font-bold leading-[1.05] text-[#000] dark:text-[#EDEDEC] tracking-tight">
                        {!! __("Interior<br>Design") !!}
                    </h1>
                </div>
                <!-- Center Image -->
                <div class="relative w-[380px] max-w-full h-[320px] shrink-0 -mt-5 z-[1]">
                    <div class="w-full h-full rounded-sm overflow-hidden"
                        style="background:{{ $h->main_image ? 'none' : 'linear-gradient(135deg,#f5e6d3,#e8d5c0)' }}">
                        @if ($h && $h->main_image)
                            <img src="{{ asset('storage/' . $h->main_image) }}" alt="Hero"
                                class="w-full h-full object-cover">
                        @else
                            <svg class="w-full h-full text-[#1b1b18]/15 dark:text-white/10 p-8" viewBox="0 0 100 120"
                                fill="none">
                                <rect x="25" y="55" width="50" height="8" rx="2" fill="currentColor" />
                                <rect x="30" y="63" width="40" height="40" rx="2" fill="currentColor" opacity="0.6" />
                                <rect x="22" y="35" width="56" height="6" rx="2" fill="currentColor" />
                                <rect x="25" y="25" width="4" height="12" rx="1" fill="currentColor" />
                                <rect x="71" y="25" width="4" height="12" rx="1" fill="currentColor" />
                                <rect x="20" y="20" width="60" height="5" rx="2" fill="currentColor" opacity="0.4" />
                                <circle cx="36" cy="48" r="4" fill="currentColor" opacity="0.3" />
                                <rect x="56" y="44" width="8" height="10" rx="1" fill="currentColor" opacity="0.3" />
                            </svg>
                        @endif
                    </div>
                </div>
                <!-- Right Column -->
                <div class="flex flex-col items-start max-w-[320px] lg:mt-5">
                    <span data-translate-key="Our Recent Work"
                        class="text-[11px] font-semibold text-[#333] dark:text-[#A1A09A] mb-3 tracking-[0.5px]">{{ __("Our Recent Work") }}</span>
                    <h2 data-translate-key="We Will Make These Unique Tastes Of Yours A Design Reality!"
                        class="font-['Playfair_Display',serif] text-xl sm:text-2xl font-bold leading-[1.4] text-[#000] dark:text-[#EDEDEC] mb-5">
                        {{ __("We Will Make These Unique Tastes Of Yours A Design Reality!") }}</h2>
                    <a href="#portfolio" data-translate-key="View Project"
                        class="inline-block px-6 py-2.5 border border-[#333] dark:border-[#62605b] text-[10px] font-semibold text-[#333] dark:text-[#EDEDEC] no-underline uppercase tracking-[1.5px] transition-all duration-300 bg-transparent hover:bg-[#333] dark:hover:bg-[#EDEDEC] hover:text-white dark:hover:text-[#1b1b18] mb-10">
                        {{ __("View Project") }}
                    </a>
                    <div class="w-[320px] max-w-full h-[240px]">
                        <div class="w-full h-full rounded-sm overflow-hidden"
                            style="background:{{ $h->right_image ? 'none' : 'linear-gradient(135deg,#e8f0fe,#d4e4f7)' }}">
                            @if ($h && $h->right_image)
                                <img src="{{ asset('storage/' . $h->right_image) }}" alt="Work"
                                    class="w-full h-full object-cover">
                            @else
                                <svg class="w-full h-full text-[#1b1b18]/15 dark:text-white/10 p-8" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <path d="m21 15-5-5L5 21" />
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== ABOUT ME ===== -->
        <section id="about" class="min-h-screen flex items-center bg-[#FFFFFF] dark:bg-[#0a0a0a]"
            style="scroll-snap-align:start">
            <div class="max-w-4xl mx-auto px-6 lg:px-10 w-full py-16 lg:py-20">
                <h1 data-translate-html="About<br>Me"
                    class="font-['Playfair_Display',serif] text-5xl md:text-7xl lg:text-8xl font-bold text-[#111111] dark:text-[#EDEDEC] leading-[1] mb-12">
                    {!! __("About<br>Me") !!}
                </h1>

                <div class="space-y-6 text-[#555] dark:text-[#A1A09A] text-sm md:text-[15px] leading-[1.8] max-w-3xl">
                    <p data-translate-key="Al-Aqsa University — Interior Design Graduate"
                        class="text-base font-semibold text-[#111111] dark:text-[#EDEDEC]">
                        {{ __("Al-Aqsa University — Interior Design Graduate") }}</p>
                    <p
                        data-translate-key="I am an interior design engineer, a proud graduate of Al-Aqsa University in Gaza. My journey was far from ordinary. Studying and working in Gaza means navigating a reality shaped by blockade, instability, and limited resources. Every material we needed was scarce, every project carried uncertainty, and every deadline was shadowed by circumstances beyond our control.">
                        {{ __("I am an interior design engineer, a proud graduate of Al-Aqsa University in Gaza. My journey was far from ordinary. Studying and working in Gaza means navigating a reality shaped by blockade, instability, and limited resources. Every material we needed was scarce, every project carried uncertainty, and every deadline was shadowed by circumstances beyond our control.") }}
                    </p>
                    <p data-translate-key="Yet, we persisted."
                        class="text-base font-semibold text-[#111111] dark:text-[#EDEDEC]">
                        {{ __("Yet, we persisted.") }}</p>
                    <p
                        data-translate-key="Interior design is more than arranging furniture or choosing colors. It is the art of transforming spaces into experiences — understanding how light, texture, and layout affect human emotion and daily life. We learned to design under pressure, to innovate with what was available, and to create beauty from constraint. That is the true skill of a Gazan designer: making the impossible feel intentional.">
                        {{ __("Interior design is more than arranging furniture or choosing colors. It is the art of transforming spaces into experiences — understanding how light, texture, and layout affect human emotion and daily life. We learned to design under pressure, to innovate with what was available, and to create beauty from constraint. That is the true skill of a Gazan designer: making the impossible feel intentional.") }}
                    </p>
                    <p
                        data-translate-key="Despite the hardship, we succeeded. We graduated. We built portfolios. We proved that creativity thrives even in the most difficult conditions. Gaza did not break our ambition — it sharpened it.">
                        {{ __("Despite the hardship, we succeeded. We graduated. We built portfolios. We proved that creativity thrives even in the most difficult conditions. Gaza did not break our ambition — it sharpened it.") }}
                    </p>
                </div>

                <div
                    class="mt-10 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A] flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8">
                    <div>
                        <p data-translate-key="Title"
                            class="text-xs font-semibold text-[#A0A0A0] dark:text-[#A1A09A] uppercase tracking-[1px]">
                            {{ __("Title") }}</p>
                        <p data-translate-key="Interior Design Engineer | Al-Aqsa University Graduate"
                            class="text-sm text-[#111111] dark:text-[#EDEDEC] mt-0.5">
                            {{ __("Interior Design Engineer | Al-Aqsa University Graduate") }}</p>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-[#e3e3e0] dark:bg-[#3E3E3A]"></div>
                    <div>
                        <p data-translate-key="Specialty"
                            class="text-xs font-semibold text-[#A0A0A0] dark:text-[#A1A09A] uppercase tracking-[1px]">
                            {{ __("Specialty") }}</p>
                        <p data-translate-key="Interior Design under constraint & adaptive spatial design"
                            class="text-sm text-[#111111] dark:text-[#EDEDEC] mt-0.5">
                            {{ __("Interior Design under constraint & adaptive spatial design") }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== PORTFOLIO ===== -->
        <section id="portfolio"
            class="w-full max-w-6xl mx-auto px-6 lg:px-10 py-14 min-h-screen flex flex-col justify-center"
            style="scroll-snap-align:start">
            <div class="mb-10">
                <h2 data-translate-key="Portfolio"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Portfolio") }}</h2>
                <p data-translate-key="Makeover projects and interior designs by Lina"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Makeover projects and interior designs by Lina") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:24px;">
                <div
                    class="rounded-xl overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="aspect-[4/3] relative flex items-center justify-center"
                        style="background:linear-gradient(135deg,#fdf6f0,#f5e6d3)">
                        <svg class="w-16 h-16 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 data-translate-key="Modern Classic Living Room"
                            class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                            {{ __("Modern Classic Living Room") }}</h3>
                        <p data-translate-key="Full makeover of a 50m living space"
                            class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                            {{ __("Full makeover of a 50m living space") }}</p>
                    </div>
                </div>
                <div
                    class="rounded-xl overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="aspect-[4/3] relative flex items-center justify-center"
                        style="background:linear-gradient(135deg,#e8f0fe,#d4e4f7)">
                        <svg class="w-16 h-16 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 data-translate-key="Serene Bedroom"
                            class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Serene Bedroom") }}
                        </h3>
                        <p data-translate-key="Interior design with neutral calming tones"
                            class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                            {{ __("Interior design with neutral calming tones") }}</p>
                    </div>
                </div>
                <div
                    class="rounded-xl overflow-hidden transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="aspect-[4/3] relative flex items-center justify-center"
                        style="background:linear-gradient(135deg,#f0faf0,#d8f0d8)">
                        <svg class="w-16 h-16 text-[#1b1b18]/10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <path d="m21 15-5-5L5 21" />
                        </svg>
                    </div>
                    <div class="p-5">
                        <h3 data-translate-key="Modern Entryway"
                            class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Modern Entryway") }}
                        </h3>
                        <p data-translate-key="Smart storage cabinets and ambient lighting"
                            class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                            {{ __("Smart storage cabinets and ambient lighting") }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== STORIES ===== -->
        <section id="stories"
            class="w-full max-w-6xl mx-auto px-6 lg:px-10 py-14 min-h-screen flex flex-col justify-center"
            style="scroll-snap-align:start">
            <div class="mb-10">
                <h2 data-translate-key="Stories"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Stories") }}</h2>
                <p data-translate-key="Behind the scenes & daily design moments"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Behind the scenes & daily design moments") }}</p>
            </div>
            <div class="flex gap-4 overflow-x-auto pb-4" style="scrollbar-width:none;-ms-overflow-style:none">
                <style>
                    .story-card-row::-webkit-scrollbar {
                        display: none
                    }
                </style>
                <div class="story-card-row flex gap-4">
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:New Project,data-content:Behind the scenes of a modern living room design"
                        data-title="{{ __('New Project') }}"
                        data-content="{{ __('Behind the scenes of a modern living room design') }}"
                        data-bg="linear-gradient(135deg, #f53003, #ff8a66)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #f53003, #ff8a66)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path
                                    d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="New Project"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("New Project") }}
                            </h3>
                            <p data-translate-key="Behind the scenes of a modern living room design"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("Behind the scenes of a modern living room design") }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Daily Tip,data-content:Natural light is the interior designer's best friend. Use mirrors to reflect and distribute light across the space."
                        data-title="{{ __('Daily Tip') }}"
                        data-content="{{ __('Natural light is the interior designer\'s best friend. Use mirrors to reflect and distribute light across the space.') }}"
                        data-bg="linear-gradient(135deg, #161615, #3E3E3A)" data-type="text">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #161615, #3E3E3A)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Daily Tip"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __('Daily Tip') }}
                            </h3>
                            <p data-translate-key="Natural light is the designer's best friend"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __('Natural light is the designer\'s best friend') }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Behind Scenes,data-content:On-site shots before and after the transformation"
                        data-title="{{ __('Behind Scenes') }}"
                        data-content="{{ __('On-site shots before and after the transformation') }}"
                        data-bg="linear-gradient(135deg, #706f6c, #A1A09A)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #706f6c, #A1A09A)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path
                                    d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Behind Scenes"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Behind Scenes") }}
                            </h3>
                            <p data-translate-key="On-site shots before and after"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("On-site shots before and after") }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Makeover,data-content:Turning an ordinary bedroom into a design masterpiece"
                        data-title="{{ __('Makeover') }}"
                        data-content="{{ __('Turning an ordinary bedroom into a design masterpiece') }}"
                        data-bg="linear-gradient(135deg, #A1A09A, #e3e3e0)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #A1A09A, #e3e3e0)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="m21 15-5-5L5 21" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Makeover"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Makeover") }}</h3>
                            <p data-translate-key="Transforming an ordinary bedroom"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("Transforming an ordinary bedroom") }}</p>
                        </div>
                    </div>
                    <div class="story-card shrink-0 w-64 rounded-xl overflow-hidden cursor-pointer transition-transform duration-300 hover:-translate-y-1 border border-[#e3e3e0] dark:border-[#3E3E3A]"
                        onclick="openWelcomeStory(this)"
                        data-translate-attrs="data-title:Decor,data-content:Small entryway decor ideas that make a big impact"
                        data-title="{{ __('Decor') }}"
                        data-content="{{ __('Small entryway decor ideas that make a big impact') }}"
                        data-bg="linear-gradient(135deg, #706f6c, #A1A09A)" data-type="visual">
                        <div class="h-40 flex items-center justify-center"
                            style="background:linear-gradient(135deg, #706f6c, #A1A09A)">
                            <svg class="w-10 h-10 text-white/60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5z" />
                                <path d="M2 17l10 5 10-5" />
                                <path d="M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <div class="p-4">
                            <h3 data-translate-key="Decor"
                                class="font-medium text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ __("Decor") }}</h3>
                            <p data-translate-key="Entryway ideas that make an impact"
                                class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">
                                {{ __("Entryway ideas that make an impact") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== STORY MODAL ===== -->
        <div id="storyModal" class="fixed inset-0 z-[1000] flex items-center justify-center"
            style="opacity:0;pointer-events:none;transition:opacity .35s ease;background:rgba(0,0,0,.92)"
            onclick="closeWelcomeStory(event)">
            <div class="w-full max-w-lg mx-4 rounded-xl overflow-hidden relative" onclick="event.stopPropagation()"
                style="aspect-ratio:9/16;box-shadow:inset 0 0 0 1px rgba(255,255,255,.1)">
                <button
                    class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full border-none flex items-center justify-center text-white text-xl cursor-pointer"
                    style="background:rgba(255,255,255,.15);backdrop-filter:blur(8px)"
                    onclick="closeWelcomeStory()">&times;</button>
                <div id="storyModalContent"
                    class="w-full h-full flex flex-col items-center justify-center p-8 text-center"></div>
            </div>
        </div>

        <script>
            function openWelcomeStory(el) {
                const title = el.getAttribute('data-title');
                const content = el.getAttribute('data-content');
                const bg = el.getAttribute('data-bg');
                const type = el.getAttribute('data-type');
                const modal = document.getElementById('storyModal');
                const inner = document.getElementById('storyModalContent');
                if (type === 'text') {
                    inner.innerHTML = `
                <svg class="w-10 h-10 mx-auto mb-4 opacity-60" style="color:#f53003" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                <p class="text-2xl font-medium text-white leading-relaxed">${content}</p>
            `;
                } else {
                    inner.innerHTML = `
                <svg class="w-16 h-16 mx-auto mb-4 opacity-50 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
                <p class="text-lg text-white/80">${content}</p>
            `;
                }
                inner.style.background = bg;
                modal.style.opacity = '1';
                modal.style.pointerEvents = 'auto';
                document.body.style.overflow = 'hidden';
            }
            function closeWelcomeStory(e) {
                if (e && e.target !== e.currentTarget) return;
                const modal = document.getElementById('storyModal');
                modal.style.opacity = '0';
                modal.style.pointerEvents = 'none';
                document.body.style.overflow = '';
            }
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeWelcomeStory();
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        </script>

        <!-- ===== TIPS & INSIGHTS ===== -->
        <section id="tips"
            class="w-full max-w-6xl mx-auto px-6 lg:px-10 py-14 min-h-screen flex flex-col justify-center"
            style="scroll-snap-align:start">
            <div class="mb-10">
                <h2 data-translate-key="Tips & Insights"
                    class="text-2xl lg:text-3xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ __("Tips & Insights") }}</h2>
                <p data-translate-key="Short design ideas and inspiration"
                    class="text-[#706f6c] dark:text-[#A1A09A] text-sm mt-1.5">
                    {{ __("Short design ideas and inspiration") }}</p>
            </div>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:24px;">
                <div
                    class="rounded-xl p-6 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <span data-translate-key="Lighting"
                        class="inline-block px-2.5 py-0.5 rounded text-[10px] font-medium text-white mb-4"
                        style="background:#f53003">{{ __("Lighting") }}</span>
                    <h3 data-translate-key="Layered Lighting Changes Everything"
                        class="font-medium text-sm mb-1.5 text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ __("Layered Lighting Changes Everything") }}</h3>
                    <p data-translate-key="Don't rely on a single light source. Combine ambient, task, and accent lighting to create multiple moods in the same space."
                        class="text-[#706f6c] dark:text-[#A1A09A] text-xs leading-relaxed">
                        {{ __("Don't rely on a single light source. Combine ambient, task, and accent lighting to create multiple moods in the same space.") }}
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <span data-translate-key="Colors"
                        class="inline-block px-2.5 py-0.5 rounded text-[10px] font-medium text-white mb-4"
                        style="background:#f53003">{{ __("Colors") }}</span>
                    <h3 data-translate-key="The 60-30-10 Color Rule"
                        class="font-medium text-sm mb-1.5 text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ __("The 60-30-10 Color Rule") }}</h3>
                    <p data-translate-key="60% neutral for walls, 30% secondary for furniture, 10% accent for accessories. This ratio guarantees visual balance."
                        class="text-[#706f6c] dark:text-[#A1A09A] text-xs leading-relaxed">
                        {{ __("60% neutral for walls, 30% secondary for furniture, 10% accent for accessories. This ratio guarantees visual balance.") }}
                    </p>
                </div>
                <div
                    class="rounded-xl p-6 transition-transform duration-300 hover:-translate-y-1 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <span data-translate-key="Furniture"
                        class="inline-block px-2.5 py-0.5 rounded text-[10px] font-medium text-white mb-4"
                        style="background:#f53003">{{ __("Furniture") }}</span>
                    <h3 data-translate-key="Multi-Purpose Pieces for Small Spaces"
                        class="font-medium text-sm mb-1.5 text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ __("Multi-Purpose Pieces for Small Spaces") }}</h3>
                    <p data-translate-key="Choose furniture with hidden storage: storage ottomans, foldable tables, and beds with built-in drawers."
                        class="text-[#706f6c] dark:text-[#A1A09A] text-xs leading-relaxed">
                        {{ __("Choose furniture with hidden storage: storage ottomans, foldable tables, and beds with built-in drawers.") }}
                    </p>
                </div>
            </div>
        </section>

        <!-- ===== FOOTER ===== -->
        <footer class="w-full border-t border-[#e3e3e0] dark:border-[#3E3E3A]" style="scroll-snap-align:start">
            <div class="max-w-6xl mx-auto px-6 lg:px-10 py-12 lg:py-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">
                    <!-- Brand -->
                    <div>
                        <a href="/"
                            class="flex items-center gap-2 text-base font-semibold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                            <span
                                class="w-6 h-6 bg-[#f53003] dark:bg-[#FF4433] text-white flex items-center justify-center text-xs font-bold"
                                style="font-family:Georgia,serif;border-radius:3px">L</span>
                            <span data-translate-key="Lina">{{ __("Lina") }}</span>
                        </a>
                        <p data-translate-key="Interior design & decoration studio crafting elegant, functional spaces that tell your unique story."
                            class="text-[#706f6c] dark:text-[#A1A09A] text-sm leading-relaxed max-w-xs">
                            {{ __("Interior design & decoration studio crafting elegant, functional spaces that tell your unique story.") }}
                        </p>
                        <div class="flex items-center gap-3 mt-5">
                            <a href="#" aria-label="Instagram"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M7.8 2H16.2C19.4 2 22 4.6 22 7.8V16.2C22 19.4 19.4 22 16.2 22H7.8C4.6 22 2 19.4 2 16.2V7.8C2 4.6 4.6 2 7.8 2ZM7.6 4C5.6 4 4 5.6 4 7.6V16.4C4 18.4 5.6 20 7.6 20H16.4C18.4 20 20 18.4 20 16.4V7.6C20 5.6 18.4 4 16.4 4H7.6ZM17.3 5.5C17.9 5.5 18.3 5.9 18.3 6.5C18.3 7.1 17.9 7.5 17.3 7.5C16.7 7.5 16.3 7.1 16.3 6.5C16.3 5.9 16.7 5.5 17.3 5.5ZM12 7C15.3 7 18 9.7 18 13C18 16.3 15.3 19 12 19C8.7 19 6 16.3 6 13C6 9.7 8.7 7 12 7ZM12 9C9.8 9 8 10.8 8 13C8 15.2 9.8 17 12 17C14.2 17 16 15.2 16 13C16 10.8 14.2 9 12 9Z" />
                                </svg>
                            </a>
                            <a href="#" aria-label="Facebook"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22 12C22 6.5 17.5 2 12 2S2 6.5 2 12C2 17 5.5 21.1 10.1 21.9V14.9H7.7V12H10.1V9.8C10.1 7.3 11.7 5.9 14 5.9C15.1 5.9 16.2 6.1 16.2 6.1V8.6H15C13.8 8.6 13.4 9.4 13.4 10.2V12H16.1L15.6 14.9H13.5V22C18.5 21.1 22 17 22 12Z" />
                                </svg>
                            </a>
                            <a href="#" aria-label="Twitter"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M23.5 6.2c-.8.4-1.7.6-2.6.7.9-.6 1.7-1.4 2.1-2.5-.9.5-1.8.9-2.8 1.1-.8-.9-2-1.5-3.3-1.5-2.5 0-4.5 2-4.5 4.5 0 .4 0 .7.1 1.1C7.8 9.3 4.7 7.6 2.6 5.1c-.4.7-.6 1.4-.6 2.3 0 1.6.8 2.9 2 3.7-.7 0-1.4-.2-2-.6v.1c0 2.2 1.6 4 3.6 4.4-.4.1-.8.2-1.2.2-.3 0-.6 0-.9-.1.6 1.8 2.2 3.1 4.2 3.1-1.5 1.2-3.5 1.9-5.6 1.9-.4 0-.7 0-1-.1 2 1.3 4.4 2 6.9 2 8.3 0 12.8-6.9 12.8-12.8 0-.2 0-.4 0-.6.9-.6 1.7-1.4 2.3-2.3z" />
                                </svg>
                            </a>
                            <a href="#" aria-label="LinkedIn"
                                class="w-8 h-8 rounded-full border border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-center text-[#706f6c] dark:text-[#A1A09A] hover:text-[#f53003] dark:hover:text-[#FF4433] hover:border-[#f53003] dark:hover:border-[#FF4433] transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M19.6 2H4.4C3.1 2 2 3.1 2 4.4v15.2C2 20.9 3.1 22 4.4 22h15.2c1.3 0 2.4-1.1 2.4-2.4V4.4C22 3.1 20.9 2 19.6 2zM8.4 18.4H5.6V9.8h2.8v8.6zM7 8.6c-.9 0-1.6-.7-1.6-1.6S6.1 5.4 7 5.4s1.6.7 1.6 1.6S7.9 8.6 7 8.6zm11.4 9.8h-2.8v-4.2c0-1 0-2.3-1.4-2.3s-1.6 1.1-1.6 2.2v4.3H9.8V9.8h2.7v1.2h.1c.4-.7 1.3-1.4 2.6-1.4 2.8 0 3.3 1.8 3.3 4.2v4.6z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 data-translate-key="Quick Links"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">
                            {{ __("Quick Links") }}</h4>
                        <ul class="space-y-2.5">
                            <li><a href="#about" data-translate-key="About Me"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("About Me") }}</a>
                            </li>
                            <li><a href="#hero-section" data-translate-key="Hero"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Hero") }}</a>
                            </li>
                            <li><a href="#portfolio" data-translate-key="Portfolio"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Portfolio") }}</a>
                            </li>
                            <li><a href="#stories" data-translate-key="Stories"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Stories") }}</a>
                            </li>
                            <li><a href="/reels" data-translate-key="Reels"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Reels") }}</a>
                            </li>
                            <li><a href="#tips" data-translate-key="Tips & Insights"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Tips & Insights") }}</a>
                            </li>
                            <li><a href="/login" data-translate-key="Client Portal"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Client Portal") }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div>
                        <h4 data-translate-key="Services"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ __("Services") }}
                        </h4>
                        <ul class="space-y-2.5">
                            <li><span data-translate-key="Interior Design"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Interior Design") }}</span>
                            </li>
                            <li><span data-translate-key="Space Planning"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Space Planning") }}</span>
                            </li>
                            <li><span data-translate-key="Dashboard Makeover"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Dashboard Makeover") }}</span>
                            </li>
                            <li><span data-translate-key="Furniture Selection"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Furniture Selection") }}</span>
                            </li>
                            <li><span data-translate-key="Lighting Design"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Lighting Design") }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 data-translate-key="Contact"
                            class="text-sm font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">{{ __("Contact") }}
                        </h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <span data-translate-key="Amman, Jordan"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __("Amman, Jordan") }}</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                                <a href="mailto:hello@lina.design"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">hello@lina.design</a>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433] mt-0.5 shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                <a href="tel:+962791234567"
                                    class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">+962
                                    7 9123 4567</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div
                    class="mt-12 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A] flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p data-translate-key="© :year Lina. All rights reserved."
                        class="text-xs text-[#706f6c] dark:text-[#A1A09A]">
                        {{ __('© :year Lina. All rights reserved.', ['year' => date('Y')]) }}</p>
                    <div class="flex items-center gap-4 text-xs text-[#706f6c] dark:text-[#A1A09A]">
                        <a href="#" data-translate-key="Privacy Policy"
                            class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Privacy Policy") }}</a>
                        <span class="w-px h-3 bg-[#e3e3e0] dark:bg-[#3E3E3A]"></span>
                        <a href="#" data-translate-key="Terms of Service"
                            class="hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">{{ __("Terms of Service") }}</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Embed Arabic translations dictionary
        window.translations = {!! file_exists(lang_path('ar.json')) ? file_get_contents(lang_path('ar.json')) : '{}' !!};

        function switchLanguage(lang) {
            // Update document dir and lang attributes
            document.documentElement.lang = lang;
            if (lang === 'ar') {
                document.documentElement.dir = 'rtl';
                document.documentElement.classList.add('rtl');
            } else {
                document.documentElement.dir = 'ltr';
                document.documentElement.classList.remove('rtl');
            }

            // Translate standard text keys
            document.querySelectorAll('[data-translate-key]').forEach(el => {
                const key = el.getAttribute('data-translate-key');
                let translation = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
                if (translation.includes(':year')) {
                    translation = translation.replace(':year', new Date().getFullYear());
                }
                el.textContent = translation;
            });

            // Translate HTML keys (innerHTML)
            document.querySelectorAll('[data-translate-html]').forEach(el => {
                const key = el.getAttribute('data-translate-html');
                const translation = (lang === 'ar' && window.translations && window.translations[key]) ? window.translations[key] : key;
                el.innerHTML = translation;
            });

            // Translate attributes
            document.querySelectorAll('[data-translate-attrs]').forEach(el => {
                el.getAttribute('data-translate-attrs').split(',').forEach(attrPair => {
                    const [attrName, engKey] = attrPair.split(':');
                    const translation = (lang === 'ar' && window.translations && window.translations[engKey]) ? window.translations[engKey] : engKey;
                    el.setAttribute(attrName, translation);
                });
            });

            // Update language switcher buttons text
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.textContent = lang === 'ar' ? 'AR' : 'EN';
            });

            // Persist to localStorage and sync to session
            localStorage.setItem('lang', lang);
            fetch(`/lang/${lang}`).catch(() => { });
        }

        // Apply on DOMContentLoaded if localStorage has a different lang than server
        document.addEventListener('DOMContentLoaded', () => {
            const serverLang = document.documentElement.getAttribute('lang') || 'en';
            const savedLang = localStorage.getItem('lang');
            // If saved lang differs from server-rendered lang, apply client-side
            if (savedLang && savedLang !== serverLang) {
                switchLanguage(savedLang);
            }
        });
    </script>
</body>

</html>