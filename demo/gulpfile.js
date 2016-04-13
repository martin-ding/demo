var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    //mix.sass('app.scss');
    ////mix.coffee();
    mix.styles(
        [
            "vender/normalize.css",
            "app.css"
        ],null,"public/css"
    );

    //mix.script(
    //    [
    //        'vender/jquery.js',
    //        'vender/main.js'
    //    ],'public/output.js','public/js'
    //);

    //mix.phpUnit().phpSpec();

    mix.version('public/css/all.css');

    //在view 里面的{{ elixir('css/all.css') }}
});
