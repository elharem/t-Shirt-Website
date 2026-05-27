import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './app/**/*.php',
],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['"Bebas Neue"', 'Impact', 'sans-serif'],
            },
            colors: {
                ink: {
                    DEFAULT: '#0a0a0a',
                    soft: '#1a1a1a',
                },
                cream: '#f5f1eb',
                accent: '#ff4500',
            },
        },
    },
    plugins: [forms],
};
