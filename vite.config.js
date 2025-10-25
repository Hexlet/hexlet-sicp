import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  server: {
    host: '0.0.0.0',
    hmr: {
      host: 'localhost',
    },
  },
  plugins: [
    react(),
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
  ],
  optimizeDeps: {
    exclude: ['refractor']
  },
  build: {
    rollupOptions: {
      external: [
        'refractor/lib/all',
        'refractor/lib/core'
      ]
    },
    outDir: 'public/build',
    emptyOutDir: false,
  },
});
