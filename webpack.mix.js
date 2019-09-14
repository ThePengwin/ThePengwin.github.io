let mix = require("laravel-mix");
let build = require("./tasks/build.js");
let icons = require("./tasks/icons.js");

require('laravel-mix-purgecss');

mix.disableSuccessNotifications();
mix.setPublicPath("source/assets/build");
mix.webpackConfig({
    plugins: [
        icons.generate,
        build.jigsaw,
        build.browserSync(),
        build.watch([
            "source/**/*.md",
            "source/**/*.php",
            "source/**/*.scss",
            "!source/**/_tmp/*"
        ])
    ]
});

mix
    .js("source/_assets/js/main.js", "js")
    .sass("source/_assets/sass/main.scss", "css")
    .styles(
        "source/assets/build/css/iconfont.css",
        "source/assets/build/css/iconfont.css"
    )
    .options({
        processCssUrls: false
    })
    .purgeCss({
        extensions: ['html', 'md', 'js', 'php', 'vue'],
        folders: ['source'],
        whitelistPatterns: [/language/, /hljs/],
    })
    .version();
