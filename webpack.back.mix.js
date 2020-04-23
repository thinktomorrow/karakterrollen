const mix = require('laravel-mix');

mix.setPublicPath(path.normalize('public/assets/back'))
    .js('resources/assets/back/js/main.js', 'public/assets/back/js')

    .version()

    .js([
        'resources/assets/back/js/vendors/redactor/redactor.js',
        'resources/assets/back/js/vendors/redactor-plugins/alignment/alignment.js',
		'resources/assets/back/js/vendors/redactor-plugins/redactor-columns.js',
        'resources/assets/back/js/vendors/redactor-plugins/rich-links.js',
        'resources/assets/back/js/vendors/redactor/_plugins/definedlinks/definedlinks.js',
        'resources/assets/back/js/vendors/redactor-plugins/custom-classes.js',
        'resources/assets/back/js/vendors/redactor-plugins/image-component.js',
		'resources/assets/back/js/vendors/redactor-plugins/video/video.js',
        'resources/assets/back/js/vendors/redactor-plugins/clips/clips.js',
        'resources/assets/back/js/vendors/redactor/_langs/nl.js'
        ],
        'public/assets/back/js/vendor/redactor.js'
    )

    .copy('resources/assets/back/js/vendors/slim/slim.kickstart.min.js', 'public/assets/back/js/vendor/slim.js')
    .copy('resources/assets/back/js/vendors/slim/slim.min.css', 'public/assets/back/css/vendor/slim.min.css')
    
    .copy('resources/assets/back/js/vendors/redactor/redactor.css', 'public/assets/back/css/vendor/redactor.css')

    .options({
        // Webpack setting to ignore sass loader to follow url() paths
        processCssUrls: false,
    });
