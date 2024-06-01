import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import {viteStaticCopy} from 'vite-plugin-static-copy'

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
      viteStaticCopy({
        targets: [
          {src: 'resources/assets/images/*', dest: 'images'},
          {src: 'resources/assets/images/exercises/*', dest: 'images/exercises'},
        ],
      })
    ],
  build: {
    outDir: 'public/build',
    emptyOutDir: false,
    rollupOptions: {
      output: {
        chunkFileNames: 'js/[name].js',
        entryFileNames: 'js/[name].js',
        assetFileNames: ({name}) => {
          if (name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          if (name.endsWith('.png') || name.endsWith('.jpg') || name.endsWith('.gif')) {
            return 'images/[name][extname]';
          }
          return '[name][extname]';
        },
      }
    }
  }
});
