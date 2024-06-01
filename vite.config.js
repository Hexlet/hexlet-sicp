import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/_activity_chart.scss',
                'resources/sass/_custom.scss',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/custom.js',
                'resources/js/editor.js',
                'resources/js/hljs.js',
            ],
            refresh: true,
        }),
        react(),
    ],
});
