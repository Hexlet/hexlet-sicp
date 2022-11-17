import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/js/hljs.js',
            'resources/js/editor.js',
            'resources/js/font-awesome.js',
        ]),
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
        host: '127.0.0.1'
    },
});
