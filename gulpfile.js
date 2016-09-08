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
    mix.sass('app.scss')
        .scripts([
            '*.js',
            '**/**/*.js',
            '**/**/**/*.js',
           // 'directives/*.js',
            '**/*.js',

        ])
        .scripts([
            //'../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            //'../../../node_modules/ngcomponentrouter/angular_1_router.js',
            '../../../node_modules/ng-toast/dist/ngToast.min.js'
        ],
        'public/js/vendor/core.js');
});
