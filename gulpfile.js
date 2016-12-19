const elixir = require('laravel-elixir');

elixir(function (mix) {
    /*
    //###################################
    // PORTAL
    //###################################
    mix.less([
        'pages.less',
        'portal.less',
    ],'resources/assets/css/portal.css');

    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        'portal.css'
    ], 'public/assets/css/portal.css');

    // arquivos de js
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.js',
        'portal.js'
    ], 'public/assets/js/portal.js');

    */

    // ###################################
    // ADMIN
    //###################################
    mix.less([
        'theme.less',
        'app-responsive.less',
        'app.less'
    ],'resources/assets/css/app.css');

    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        'app.css'
    ], 'public/assets/css/app.css');

    // arquivos de js
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.js',
        '../../../node_modules/jquery-mask-plugin/src/jquery.mask.js',
        'common-scripts.js',
        'app.js',
        'apiList.js',
    ], 'public/assets/js/app.js');

    mix.copy('node_modules/font-awesome/fonts','public/assets/fonts');


});
