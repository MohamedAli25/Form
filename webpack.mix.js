const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/form.js", "public/js/form.js")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .sass("resources/sass/form.scss", "public/css/form.css");
