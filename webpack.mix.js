const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

if (mix.inProduction()) {
    mix.version();
}
mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/hljs.js', 'public/js/hljs.js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/img', 'public/img');
