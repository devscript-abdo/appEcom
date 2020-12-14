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

mix.js('resources/js/app.js', 'public/js/app.js');
   // .sass('resources/sass/app.scss', 'public/css');

/*mix.styles([
    'public/assets/plugins/bootstrap/css/bootstrap.min.css',
    'public/assets/css/main.css',
    'public/assets/css/theme.css'
], 'public/css/app.css')

    .scripts([
        'public/assets/bundles/lib.vendor.bundle.js',
        'public/assets/js/core.js'
    ], 'public/js/app.js');*/
