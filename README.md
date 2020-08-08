## Kurulum
$ laravel new proje_adi --auth
$ npm install
$ composer require doctrine/dbal
$ composer require intervention/image
$ composer dump-autoload

config/app.php dosyası içinde
Package Service Providers... bölümünün altına
Intervention\Image\ImageServiceProvider::class, satırını ekliyoruz

Aliases içine...
'Image' => \Intervention\Image\Facades\Image::class, satırını ekliyoruz

$ composer require spatie/laravel-analytics
$ php artisan vendor:publish --provider="Spatie\Analytics\AnalyticsServiceProvider"
$ composer require spatie/laravel-permission
$ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
$ php artisan optimize:clear
$ composer require torann/geoip
$ php artisan vendor:publish --provider="Torann\GeoIP\GeoIPServiceProvider" --tag=config

config/app.php dosyası içinde
Package Service Providers... bölümünün altına
Torann\GeoIP\GeoIPServiceProvider::class, satırını ekliyoruz

Aliases içine...
'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class, satırını ekliyoruz

$ composer require barryvdh/laravel-debugbar --dev
$ php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
$ composer require --dev barryvdh/laravel-ide-helper

composer.json  dosyasına şu satırları ekliyoruz:
"extra": {
  "laravel": {
    "dont-discover": [
      "barryvdh/laravel-ide-helper",
    ]
  }
}

app/Providers/AppServiceProvider.php dosyası içinde sadece production ortamında çalışmaması için
register metodu içine şu satırları ekliyoruz

if ($this->app->environment() !== 'production') {
    $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
}
$ php artisan ide-helper:generate
composer.json dosyasına şu satırları ekliyoruz:
"scripts": {
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "@php artisan ide-helper:generate",
        "@php artisan ide-helper:meta"
    ]
},

$ php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config
$ php artisan ide-helper:meta

php -r "echo ini_get('memory_limit').PHP_EOL;" komutu ile memory_limit hatası alırsanız php.ini dosyası içinde
memory_limit = -1 olarak ayarlayabilirsiniz.

$ npm install browser-sync browser-sync-webpack-plugin inputmask js-cookie minimist rtlcss select2 sweetalert vue-router html2canvas -D 

package.json doyasına şu satırları ekliyoruz:
"optionalDependencies": {
        "fs-events": "*"
    }







git clone https://github.com/feritterzi/laravel.git .