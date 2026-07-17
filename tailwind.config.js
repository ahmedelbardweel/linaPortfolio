import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Instrument Sans', 'Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', 'Georgia', 'serif'],
            },
            colors: {
                lina: {
                    primary: '#c42802',
                    'primary-hover': '#f53003',
                    'primary-dark': '#FF4433',
                    text: '#1b1b18',
                    'text-dark': '#EDEDEC',
                    muted: '#706f6c',
                    'muted-dark': '#A1A09A',
                    border: '#e3e3e0',
                    'border-dark': '#3E3E3A',
                    card: '#ffffff',
                    'card-dark': '#161615',
                    page: '#FDFDFC',
                    'page-dark': '#0a0a0a',
                    hover: '#f0f0ef',
                    'hover-dark': '#2a2a28',
                },
            },
        },
    },

    // Only inject CSS custom-properties into * for utilities actually used — reduces 12KB of unused vars
    experimental: {
        optimizeUniversalDefaults: true,
    },

    plugins: [forms],
};
