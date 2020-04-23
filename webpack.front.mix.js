let mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.webpackConfig(
    {
        watchOptions: {
            ignored: /node_modules/
        }
    })
    .setPublicPath(path.normalize('public/assets/front'))

    .js('resources/assets/front/js/main.js', 'public/assets/front/js')
    .sass('resources/assets/front/css/main.scss', 'public/assets/front/css')
    .copy('resources/assets/front/img', 'public/assets/front/img')

    .version()

    .options({
        // Our own set of PostCSS plugins.
        postCss: [
            require('tailwindcss')('./resources/assets/front/css/tailwind.js'),
            require('autoprefixer')({
                overrideBrowserslist: ['last 40 versions'],
			}),
        ],

        autoprefixer: true,

        // Webpack setting to ignore sass loader to follow url() paths
        processCssUrls: false,
    })

    .purgeCss({
        // only: ['assets/css/main.css'],
    });
