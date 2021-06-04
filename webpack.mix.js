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

mix
    .version()
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/hljs.js', 'public/js/hljs.js')
    .react()
    .sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/img', 'public/img')
    .copyDirectory('resources/assets/img/exercises', 'public/img/exercises')
    .then(() => {
        const convertToFileHash = require("laravel-mix-make-file-hash");
        convertToFileHash({
        publicPath: "public",
        manifestFilePath: "public/mix-manifest.json"
        });
    });
