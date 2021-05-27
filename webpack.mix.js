let mix = require('laravel-mix');



mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/style.scss', 'public/css')
       .browserSync({
        proxy: 'localhost:8000',
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'public/assets/js/**/*.js',
            'public/assets/css/**/*.css'
        ]
    });
