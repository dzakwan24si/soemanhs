import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
        './resources/js/**/*.ts',
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    900: '#064E50',
                    700: '#0A6667',
                    600: '#0E7C7B',
                    100: '#D5EEEC',
                },
                gold: {
                    500: '#D4A843',
                    100: '#F6EBCB',
                },
                accent: {
                    500: '#F28C28',
                },
                cream: {
                    50: '#F7F5EF',
                },
                ink: {
                    900: '#1F2A2A',
                    500: '#5B6767',
                }
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Oswald', ...defaultTheme.fontFamily.sans],
                arabic: ['Amiri', 'serif'],
            },
            boxShadow: {
                soft: '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
            },
            keyframes: {
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-50%)' },
                }
            },
            animation: {
                marquee: 'marquee 25s linear infinite',
            }
        },
    },

    plugins: [forms],
};
