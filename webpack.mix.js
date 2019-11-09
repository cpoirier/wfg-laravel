const mix = require('laravel-mix');

mix.autoload({ 'jquery': ['window.$', 'window.jQuery'] });

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
