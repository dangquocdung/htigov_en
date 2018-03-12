const {mix} = require('laravel-mix');

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

const publicPath = '../public/vendor/backup';

mix.autoload({});
mix.sourceMaps();
mix.disableNotifications();
mix.setPublicPath(publicPath);

mix
    .sass('./resources/assets/sass/backup.scss', 'css')
    .scripts(['./resources/assets/js/backup.js'], '../public/vendor/backup/js/backup.js');

mix
    .copy('./../public/vendor/backup/mix-manifest.json', './public/assets/mix-manifest.json')
    .copyDirectory('./../public/vendor/backup/css', './public/assets/css')
    .copyDirectory('./../public/vendor/backup/js', './public/assets/js');
