let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/custom.js', 'public/js')
   .js('node_modules/metismenu/dist/metisMenu.js', 'public/js')
   .js('node_modules/jquery/dist/jquery.min.js', 'public/js')
  // .js('esources/assets/js/libs/jquery.js', 'public/js')
   .copy('node_modules/metismenu/dist/metisMenu.css', 'public/css')
  
/*
          compiles all the file in the script into the specified dest
   .scripts([   
      // 'resources/assets/js/libs/bootstrap.js',
       'resources/assets/js/libs/jquery.js',
       'resources/assets/js/libs/metisMenu.js',
       'resources/assets/js/libs/sb-admin-2.js',
       'resources/assets/js/libs/scripts.js'], 'public/js/libs.js')
*/
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/custom.scss', 'public/css')
   

	/* 
   .styles([
      
       'resources/assets/css/libs/blog-post.css',
       //'resources/assets/sass/libs/bootstrap.css',
       'resources/assets/sass/libs/font-awesome.css', 
       'resources/assets/sass/libs/metisMenu.css',
       'resources/assets/sass/libs/sb-admin-2.css',
       'resources/assets/sass/libs/styles.css'], 'public/css/libs.css' )
*/
    
   .browserSync('laraproh.net');

     if (mix.inProduction()){
		 mix.version();
		 }