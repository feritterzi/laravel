## Kurulum
```bash
$ laravel new proje_adi --auth
$ npm install
$ composer require doctrine/dbal
$ composer require intervention/image
$ composer dump-autoload
```

config/app.php dosyası içinde
Package Service Providers... bölümünün altına

```bash
Intervention\Image\ImageServiceProvider::class, 
```
satırını ekliyoruz

Aliases içine...
```bash
'Image' => \Intervention\Image\Facades\Image::class, satırını ekliyoruz
```

```bash
$ composer require spatie/laravel-analytics
$ php artisan vendor:publish --provider="Spatie\Analytics\AnalyticsServiceProvider"
$ composer require spatie/laravel-permission
$ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
$ php artisan optimize:clear
$ composer require torann/geoip
$ php artisan vendor:publish --provider="Torann\GeoIP\GeoIPServiceProvider" --tag=config
```

config/app.php dosyası içinde
Package Service Providers... bölümünün altına

```bash
Torann\GeoIP\GeoIPServiceProvider::class, 
```
satırını ekliyoruz

Aliases içine...
```bash
'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class, 
```
satırını ekliyoruz

```bash
$ composer require barryvdh/laravel-debugbar --dev
$ php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
$ composer require --dev barryvdh/laravel-ide-helper
```

composer.json  dosyasına şu satırları ekliyoruz:
```bash
"extra": {
  "laravel": {
    "dont-discover": [
      "barryvdh/laravel-ide-helper",
    ]
  }
}
```

app/Providers/AppServiceProvider.php dosyası içinde sadece production ortamında çalışmaması için
register metodu içine şu satırları ekliyoruz

```bash
if ($this->app->environment() !== 'production') {
    $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
}
```

```bash
$ php artisan ide-helper:generate
```

composer.json dosyasına şu satırları ekliyoruz:

```bash
"scripts": {
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "@php artisan ide-helper:generate",
        "@php artisan ide-helper:meta"
    ]
},
```

```bash
$ php artisan vendor:publish --provider="Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider" --tag=config
$ php artisan ide-helper:meta
```
Note: `php -r "echo ini_get('memory_limit').PHP_EOL;" komutu ile memory_limit hatası alırsanız php.ini dosyası içinde`

```bash
memory_limit = -1 
```
olarak ayarlayabilirsiniz.

```bash
$ npm install browser-sync browser-sync-webpack-plugin inputmask js-cookie minimist rtlcss select2 sweetalert vue-router html2canvas -D 
```

package.json doyasına şu satırları ekliyoruz:

```bash
"optionalDependencies": {
        "fs-events": "*"
    }

```

```bash
git clone https://github.com/feritterzi/laravel.git .
``` 