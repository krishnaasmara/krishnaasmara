const mix = require("laravel-mix");
require("@tinypixelco/laravel-mix-wp-blocks");
require("laravel-mix-svg-vue");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix.setPublicPath("./public")
.browserSync("mangcoding.test")
.options({
    watchOptions: {
        ignored: /node_modules/,
        ignoreInitial: true,
    },
    online: true,
});

mix.postCss("resources/styles/app.css", "styles").options({
    processCssUrls: false,
    postCss: [
        require("postcss-import"),
        require("tailwindcss/nesting"),
        require("tailwindcss"),
        require("autoprefixer"),
    ],
});

mix.js("resources/scripts/app.js", "scripts")
    .js("resources/scripts/customizer.js", "scripts")
    .vue()
    .svgVue()
    .blocks("resources/scripts/editor.js", "scripts")
    .autoload({
        jquery: ["$", "window.jQuery"],
    })
    .extract();

mix.copyDirectory("resources/images", "public/images")

mix.sourceMaps().version();
