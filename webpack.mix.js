const mix = require('laravel-mix');
const AdminResourcesPath = 'resources/views/themes/admin/';
const AdminPublicPath = 'public/themes/admin/';
const LimitlessAssets = 'limitless/assets/';

mix.copy('resources/global_assets/css/icons/icomoon/fonts','public/css/fonts');
mix.copy('resources/global_assets/images/lang','public/images/lang');
mix.copy('resources/global_assets/images/placeholders','public/images/placeholders');
mix.js('resources/js/app.js', 'public/js')
    .combine([
        'resources/js/main/jquery.min.js',
        'resources/js/main/bootstrap.bundle.min.js',
        'resources/js/plugins/loaders/blockui.min.js',
        'resources/js/plugins/ui/slinky.min.js',
    ],'public/js/limitless.js')
    .styles([
        'resources/global_assets/css/icons/icomoon/styles.min.css',
        'resources/global_assets/css/extras/animate.min.css',
        'resources/css/bootstrap.min.css',
        'resources/css/bootstrap_limitless.min.css',
        'resources/css/layout.min.css',
        'resources/css/components.min.css',
        'resources/css/colors.min.css',
    ],'public/css/limitless.css')
    .sourceMaps();

mix.js('resources/js/app.js', AdminPublicPath+'limitless/js')
    .combine([
        AdminResourcesPath+LimitlessAssets+'js/limitless.js'
    ],AdminPublicPath+'limitless/js/limitless.js')
    .styles([
        AdminResourcesPath+LimitlessAssets+'css/limitless.css'
    ],AdminPublicPath+'limitless/css/limitless.css')
    .sourceMaps();

mix.version();

if (!mix.config.production) {
    mix.browserSync({
      // Vagrant box's hostname
      proxy: 'https://kayyum.test',
      // list of compiled files in public or templates
      files: [
        'public/assets/**/*',
        'public/index.php',
      ],
      // The Vagrant box's private ip
      host: 'kayyum.test',
      port: 3000,
      open: true,
      https: {
        // allow Browsersync to access key: sudo chmod o+x /etc/ssl/private
        key: '/home/vagrant/www/kayyum/kayyum.test.key',
        cert: '/home/vagrant/www/kayyum/kayyum.test.cert',
      },
      watchOptions: {
        usePolling: true,
        interval: 500,
      },
    });
  }