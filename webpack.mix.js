let mix = require('laravel-mix');
let ImageminPlugin = require( 'imagemin-webpack-plugin' ).default;

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

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .browserSync('udomi-laravel.dev')
  //  .js('resources/assets/js/app.js', 'public/js');
  .scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/chocolat/dist/js/jquery.chocolat.js',
    'node_modules/owl.carousel/dist/owl.carousel.js',
    'node_modules/jquery-text-counter/textcounter.js',
    'resources/assets/js/jquery.fileuploader.js',
    'node_modules/foundation-sites/dist/js/foundation.js',
    'resources/assets/js/app.js'
  ], 'public/js/all.js')
