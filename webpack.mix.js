const {mix} = require('laravel-mix');
require('laravel-elixir-vueify');
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
elixer(function (mix) {
    mix.js('resources/assets/js/app.js', 'public/js').extract(['vue'])
            .sass('resources/assets/sass/app.scss', 'public/css');
    mix.browserify('app.js');
});