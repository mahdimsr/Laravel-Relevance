<?php

namespace Msr\LaravelRelevance\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Msr\LaravelRelevance\LaravelRelevanceServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Msr\\LaravelRelevance\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelRelevanceServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-relevance_table.php.stub';
        $migration->up();
        */
    }
}
