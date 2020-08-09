const mix = require('laravel-mix');
const FrontEndResourcesPath = 'resources/frontend/';
const FrontEndPublicPath = 'public/frontend/';
const AdminResourcesPath = 'resources/backend/themes/';
const AdminPublicPath = 'public/backend/themes/';
const LimitlessAssets = 'limitless/assets/';

mix.copy('resources/global_assets/css/icons/icomoon/fonts','public/css/fonts');
mix.copy('resources/global_assets/images/lang','public/images/lang');
mix.copy('resources/global_assets/images/placeholders','public/images/placeholders');
mix.copy('resources/frontend/js/plugins/forms/styling/uniform.min.js','public/js/plugins/forms/styling/uniform.min.js');
mix.copy('resources/frontend/js/login.js','public/js/login.js');
mix.copy('resources/frontend/js/gmapbasic.js','public/js/gmapbasic.js');
mix.combine([
       FrontEndResourcesPath+'js/app.js',
       FrontEndResourcesPath+'js/main/jquery.min.js',
       FrontEndResourcesPath+'js/main/bootstrap.bundle.min.js',
       FrontEndResourcesPath+'js/plugins/loaders/blockui.min.js',
       FrontEndResourcesPath+'js/plugins/ui/slinky.min.js',
    ],'public/js/app.js')
    .styles([
        'resources/global_assets/css/icons/icomoon/styles.min.css',
        'resources/global_assets/css/extras/animate.min.css',
        FrontEndResourcesPath+'css/bootstrap.min.css',
        FrontEndResourcesPath+'css/bootstrap_limitless.min.css',
        FrontEndResourcesPath+'css/layout.min.css',
        FrontEndResourcesPath+'css/components.min.css',
        FrontEndResourcesPath+'css/colors.min.css',
    ],'public/css/app.css')
    .sourceMaps();

mix.combine([
        AdminResourcesPath+LimitlessAssets+'js/app.js',
        AdminResourcesPath+LimitlessAssets+'/js/main/jquery.min.js',
        AdminResourcesPath+LimitlessAssets+'/js/main/bootstrap.bundle.min.js',
        AdminResourcesPath+LimitlessAssets+'/js/plugins/loaders/blockui.min.js',
        AdminResourcesPath+LimitlessAssets+'/js/plugins/ui/slinky.min.js',
    ],AdminPublicPath+LimitlessAssets+'/js/app.js')
    .styles([
        AdminResourcesPath+LimitlessAssets+'css/app.css',
        'resources/global_assets/css/icons/icomoon/styles.min.css',
        'resources/global_assets/css/extras/animate.min.css',
        AdminResourcesPath+LimitlessAssets+'css/bootstrap.min.css',
        AdminResourcesPath+LimitlessAssets+'css/bootstrap_limitless.min.css',
        AdminResourcesPath+LimitlessAssets+'css/layout.min.css',
        AdminResourcesPath+LimitlessAssets+'css/components.min.css',
        AdminResourcesPath+LimitlessAssets+'css/colors.min.css',
    ],AdminPublicPath+LimitlessAssets+'/css/app.css')
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
