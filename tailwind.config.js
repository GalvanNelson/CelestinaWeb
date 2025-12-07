import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Colores de tema
                primary: 'var(--color-primary)',
                'primary-dark': 'var(--color-primary-dark)',
                secondary: 'var(--color-secondary)',
                accent: 'var(--color-accent)',
                
                // Fondos de tema
                'bg-primary': 'var(--bg-primary)',
                'bg-secondary': 'var(--bg-secondary)',
                'bg-card': 'var(--bg-card)',
                
                // Textos de tema
                'text-primary': 'var(--text-primary)',
                'text-secondary': 'var(--text-secondary)',
                'text-inverse': 'var(--text-inverse)',
            },
            spacing: {
                'xs': 'var(--spacing-xs)',
                'sm': 'var(--spacing-sm)',
                'md': 'var(--spacing-md)',
                'lg': 'var(--spacing-lg)',
                'xl': 'var(--spacing-xl)',
            },
            borderRadius: {
                'base': 'var(--border-radius)',
            },
            boxShadow: {
                'base': 'var(--shadow)',
                'lg': 'var(--shadow-lg)',
            },
            fontSize: {
                'xs': 'var(--font-size-small)',
                'base': 'var(--font-size-base)',
                'lg': 'var(--font-size-large)',
                'xl': 'var(--font-size-xlarge)',
            },
        },
    },

    plugins: [forms, typography],
};
