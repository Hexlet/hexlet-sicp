import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    host: '0.0.0.0',
    hmr: {
      host: 'localhost',
    },
  },
  esbuild: {
    jsx: 'automatic',
    jsxImportSource: 'react',
  },
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler',
        silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'if-function'],
      },
    },
  },
  plugins: [
    laravel({
      input: [
        'resources/js/app.jsx',
        'resources/js/bootstrap.js',
        'resources/js/custom.js',
        'resources/js/hljs.js',
        'resources/js/editor.js',
        'resources/sass/app.scss',
      ],
      refresh: true,
    }),
  ],
});
