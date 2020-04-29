const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/bootstrap.js', 'public/js')
  .js('resources/js/helpers.js', 'public/js')
  .js('resources/js/store/store.js', 'public/js')
  .js('resources/js/store/modules/authentication.js', 'public/js')
  .js('resources/js/views/App.vue', 'public/js')
  .js('resources/js/views/Home.vue', 'public/js')
  .js('resources/js/views/Login.vue', 'public/js')
  .js('resources/js/components/FavoriteButton.vue', 'public/js')
  .js('resources/js/components/Card.vue', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('tailwind.config.js') ],
  })
  

mix.options({
  hmrOptions: {
    host: 'gamemagnifier.test',  // site's host name
    port: 8080,
  }
});

// // fix css files 404 issue
mix.webpackConfig({
  // add any webpack dev server config here
  devServer: {
    proxy: {
      host: '0.0.0.0',  // host machine ip 
      port: 8080,
    },
    watchOptions: {
      aggregateTimeout: 200,
      poll: 5000
    },

  }
});

// mix.disableNotifications();