import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/js/app.js',
              'resources/js/custom.js',
              'resources/js/hljs.js',
              'resources/js/editor.js',
              'resources/sass/app.scss',
              'resources/sass/_activity_chart.scss',
              'resources/sass/_custom.scss',
            ],
            refresh: true,
        }),
        react(),

    ],
  build: {
    outDir: 'public/build',
    emptyOutDir: false,
  }
});
