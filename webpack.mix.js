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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/js/backend', 'public/backend/js')
    .copyDirectory('resources/css/backend', 'public/backend/css')
    .copyDirectory('resources/global', 'public/global')
    .copyDirectory('resources/webfonts/backend', 'public/backend/webfonts')
    .copyDirectory('resources/uploads', 'public/uploads')
    .copyDirectory('resources/js/frontend', 'public/frontend/js')
    .copyDirectory('resources/css/frontend', 'public/frontend/css')
    .copyDirectory('resources/images/frontend','public/frontend/images')
    .copyDirectory('resources/images/backend','public/backend/images')
    .copyDirectory('resources/fonts/backend','public/backend/fonts')
    .copyDirectory('resources/backend-login','public/backend/login')
    .copyDirectory('resources/sass/frontend','public/frontend/sass')
    .copyDirectory('resources/captcha/frontend','public/frontend/captcha');

