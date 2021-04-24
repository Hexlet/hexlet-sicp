const mix = require('laravel-mix');

mix
  .version()
  .js('resources/js/app.js', 'public/js/app.js')
  .js('resources/js/hljs.js', 'public/js/hljs.js')
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
