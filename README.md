
## Laravel Platform

[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=Nejcc_laravel-platform&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=Nejcc_laravel-platform)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Nejcc_laravel-platform&metric=alert_status)](https://sonarcloud.io/dashboard?id=Nejcc_laravel-platform)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=Nejcc_laravel-platform&metric=bugs)](https://sonarcloud.io/dashboard?id=Nejcc_laravel-platform)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=Nejcc_laravel-platform&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=Nejcc_laravel-platform)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=Nejcc_laravel-platform&metric=security_rating)](https://sonarcloud.io/dashboard?id=Nejcc_laravel-platform)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=Nejcc_laravel-platform&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=Nejcc_laravel-platform)

## Install

### For development
```$xslt
composer install
npm install
npm run dev ?? npm run prod
php artisan migrate --seed
```

### For testing
```
composer install
npm install
npm run watch
php artisan migrate:fresh --seed
php artisan serve
```

## Auth

- Admin
```
- U: admin@admin.com
- P: secret
```

- User
```
- U: user@local.local  
- P: secret
```

## localization export
```
php artisan translatable:export en,si,de,it,es
```

## Contribution
 
 if you want to contribute please use the DEVELOP branch and when you do PR push on DEVELOP.

## Packages 

- https://github.com/laravel/ui (slave) (only bootstrap part and vue)
- https://laravel.com/docs/8.x/fortify (master)
- https://spatie.be/docs/laravel-permission/v4/basic-usage/basic-usage 
- https://docs.laravel-excel.com/3.1/getting-started/installation.html
- https://laravel-livewire.com/docs/2.x/quickstart
- https://github.com/artesaos/seotools


## Contributing

Thank you for considering contributing to the Laravel platform!

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
