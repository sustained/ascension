const mix = require("laravel-mix");

const tailwindcss = require("tailwindcss");

require("laravel-mix-alias");

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

mix.alias({
  "@": "/resources/js",
  "~": "/resources/sass"
});

mix
  .js("resources/js/app.js", "public/js")
  .sass("resources/sass/app.scss", "public/css")
  .options({
    extractVueStyles: true,
    processCssUrls: false,
    postCss: [tailwindcss("./tailwind.js")]
  });
