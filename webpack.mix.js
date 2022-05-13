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
    .vue()
    .scripts(['resources/assets/bower_components/jquery/dist/jquery.min.js',
    'resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/dist/js/adminlte.min.js'],'public/js/main.js')
    .styles(['resources/assets/dist/css/AdminLTE.min.css',
    'resources/assets/dist/css/skins/skin-blue.min.css',
    'resources/assets/bower_components/bootstrap/dist/css/bootstrap.min.css',
        ],
        'public/css/app.css');
  
