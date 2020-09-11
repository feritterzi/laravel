const mix = require('laravel-mix');
const GlobalResourcesPath = 'resources/global_assets/';
const FrontEndResourcesPath = 'resources/frontend/';
const FrontEndPublicPath = 'public/js/';
const AdminResourcesPath = 'resources/backend/themes/';
const AdminPublicPath = 'public/backend/themes/';
const LimitlessAssets = 'limitless/assets/';

mix.copy(GlobalResourcesPath+'css/icons/icomoon/fonts','public/css/fonts');
mix.copy(GlobalResourcesPath+'css/icons/icomoon/fonts',AdminPublicPath+LimitlessAssets+'css/fonts');
mix.copy(GlobalResourcesPath+'images/lang','public/images/lang');
mix.copy(GlobalResourcesPath+'images/placeholders','public/images/placeholders');
mix.copy(GlobalResourcesPath+'js/plugins/forms/styling/uniform.min.js',FrontEndPublicPath+'plugins/forms/styling/uniform.min.js');
mix.copy(GlobalResourcesPath+'js/plugins/forms/inputs/maxlength.min.js',FrontEndPublicPath+'plugins/forms/inputs/maxlength.min.js');
mix.copy(GlobalResourcesPath+'js/plugins/notifications/noty.min.js',FrontEndPublicPath+'plugins/notifications/noty.min.js');
mix.copy(FrontEndResourcesPath+'js/login.js',FrontEndPublicPath+'login.js');
mix.copy(FrontEndResourcesPath+'js/gmapbasic.js',FrontEndPublicPath+'gmapbasic.js');
mix.copy(GlobalResourcesPath+'js/plugins/ui/slinky.min.js.map',FrontEndPublicPath+'slinky.min.js.map');
mix.combine([
       FrontEndResourcesPath+'js/app.js',
       GlobalResourcesPath+'js/main/jquery.min.js',
       GlobalResourcesPath+'js/main/bootstrap.bundle.min.js',
       GlobalResourcesPath+'js/plugins/loaders/blockui.min.js',
       GlobalResourcesPath+'js/plugins/ui/slinky.min.js',
    ],FrontEndPublicPath+'app.js')
    .styles([
        GlobalResourcesPath+'css/icons/icomoon/styles.min.css',
        GlobalResourcesPath+'css/extras/animate.min.css',
        GlobalResourcesPath+'css/bootstrap.min.css',
        GlobalResourcesPath+'css/bootstrap_limitless.min.css',
        GlobalResourcesPath+'css/layout.min.css',
        GlobalResourcesPath+'css/components.min.css',
        GlobalResourcesPath+'css/colors.min.css',
    ],'public/css/app.css')
    .sourceMaps();

mix.combine([
        AdminResourcesPath+LimitlessAssets+'js/app.js',
        GlobalResourcesPath+'js/main/jquery.min.js',
        GlobalResourcesPath+'js/main/bootstrap.bundle.min.js',
        GlobalResourcesPath+'js/plugins/loaders/blockui.min.js',
        GlobalResourcesPath+'js/plugins/ui/slinky.min.js',
        GlobalResourcesPath+'js/plugins/tables/datatables/datatables.min.js',
        GlobalResourcesPath+'js/plugins/forms/selects/select2.min.js'
    ],AdminPublicPath+LimitlessAssets+'/js/app.js')
    .styles([
        AdminResourcesPath+LimitlessAssets+'css/app.css',
        GlobalResourcesPath+'css/icons/icomoon/styles.min.css',
        GlobalResourcesPath+'css/extras/animate.min.css',
        GlobalResourcesPath+'css/bootstrap.min.css',
        GlobalResourcesPath+'css/bootstrap_limitless.min.css',
        GlobalResourcesPath+'css/layout.min.css',
        GlobalResourcesPath+'css/components.min.css',
        GlobalResourcesPath+'css/colors.min.css',
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
