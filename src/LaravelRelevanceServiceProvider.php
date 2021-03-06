<?php

namespace Msr\LaravelRelevance;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRelevanceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-relevance')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_relevance_table');
    }
}
