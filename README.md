# laravel package to define some social relevance

[![run-tests](https://github.com/mahdimsr/Laravel-Relevance/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/mahdimsr/Laravel-Relevance/actions/workflows/run-tests.yml)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

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
$mainUser->addRelevence('your_relation_name', $yourModel);
```
or remove relation:
```php
$mainUser->removeRelevence('your_relation_name', $yourModel);
```
you can toggle relation:
```php
$mainUser->toggleRelevence('your_relation_name', $yourModel);
```
check relation exists:
```php
$mainUser->relevanceExist('your_relation_name', $yourModel);
```
get relation:
```php
$mainUser->getRelevance('your_relation_name', $yourModel);
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
