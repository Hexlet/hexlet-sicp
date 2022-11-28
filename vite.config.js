import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  base: '',
  plugins: [
    laravel([
        'resources/js/app.js',
        'resources/js/hljs.js',
        'resources/js/editor.js',
        'resources/js/font-awesome.js',
    ]),
    react({
      // Use React plugin in all *.jsx and *.tsx files
      include: '**/*.{jsx,tsx}',
    }),
  ],
  resolve: {
      alias: [
          {
              // this is required for the SCSS modules
              find: /^~(.*)$/,
              replacement: '$1',
          },
      ],
  },
  server: {
      port: 3000,
  },
  build: {
    sourcemap: true,
  },
});
