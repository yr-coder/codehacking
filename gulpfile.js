const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

//noinspection BadExpressionStatementJS
elixir(mix => {
    mix.sass('app.scss')
    .styles([
           'libs/blog-post.css',
           'libs/font-awesome.css',
           'libs/bootstrap.css',
           'libs/metisMenu.css',
           'libs/sb-admin-2.css'


        ], './public/css/libs.css')

    .scripts([

        'libs/jquery.js',
        'libs/bootstrap.js',
        'libs/metisMenu.js',
        'libs/sb-admin-2.js',
        'libs/scripts.js'

    ], './public/js/libs.js')

});
