<?php

namespace BohemicaStudio\PplMyApi;

use BohemicaStudio\PplMyApi\Commands\PplMyApiCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PplMyApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ppl-myapi')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_ppl_myapi_table')
            ->hasCommand(PplMyApiCommand::class);
    }
}
