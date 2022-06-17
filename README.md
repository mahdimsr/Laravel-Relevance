
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# laravel package to define some social relevance

[![Latest Version on Packagist](https://img.shields.io/packagist/v/msr/laravel-relevance.svg?style=flat-square)](https://packagist.org/packages/msr/laravel-relevance)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/msr/laravel-relevance/run-tests?label=tests)](https://github.com/mahdimsr/Laravel-Relevance/actions/workflows/run-tests.yml?query=branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/msr/laravel-relevance.svg?style=flat-square)](https://packagist.org/packages/msr/laravel-relevance)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/Laravel-Relevance.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/Laravel-Relevance)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require msr/laravel-relevance
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-relevance-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-relevance-config"
```

This is the contents of the published config file:

```php
return [

    /**
     * database configuration
     */
    'database' => [
        'relevance_user_foreign_key_column_name' => 'user_id',
        'relevance_table_name' => 'relevance',
        'relevance_column_name' => 'relevance_name',
        'relevance_relation_column_name' => 'relation_name',
    ],
    
];
```

## Usage
add `Msr\LaravelRelevance\Traits\CanDoRelevance` trait to your model, which one can do some action... e.x= User

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Msr\LaravelRelevance\Traits\CanDoRelevance;

class User extends Authenticatable
{
    use CanDoRelevance;
```
then you can define relation between you models like below:
```php
$mainUser->addRelevence('your_relation_name',$yourModel);
```
or remove relation:
```php
$mainUser->removeRelevence('your_relation_name',$yourModel);
```
you can toggle relation:
```php
$mainUser->toggleRelevence('your_relation_name',$yourModel);
```
check relation exists:
```php
$mainUser->relevanceExist('your_relation_name',$yourModel);
```
get relation:
```php
$mainUser->getRelevance('your_relation_name',$yourModel);
```
count of a relation of model:
```php
$mainUser->relevanceCount('your_relation_name');
```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
