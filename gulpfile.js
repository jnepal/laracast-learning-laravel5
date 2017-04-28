var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');

mix.styles([
    'libs/bootstrap.min.css',
    'libs/select2.min.css'
]);

mix.scripts([
    'libs/bootstrap.min.js',
    'libs/jquery.js',
    'libs/select2.min.js'
]);
});
