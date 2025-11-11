<?php

namespace Shuxx\FilamentNavigation;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * Filament Navigation Plugin Service Provider
 *
 * This service provider uses the spatie/laravel-package-tools package
 * to simplify Laravel package configuration.
 *
 * It handles:
 * - Configuration file registration
 * - Configuration file publication to the application
 *
 * The service provider is automatically discovered by Laravel thanks to
 * the "extra.laravel.providers" section in composer.json
 *
 * @package Shuxx\FilamentNavigation
 * @author Shuxx
 * @link https://github.com/shuxx/filament-navigation
 */
class FilamentNavigationServiceProvider extends PackageServiceProvider
{
    /**
     * Package name
     *
     * Used to identify the package in Laravel and to
     * automatically generate publication tags.
     *
     * @var string
     */
    public static string $name = 'filament-navigation';

    /**
     * Configure the Laravel package
     *
     * This method defines:
     * - The package name
     * - The configuration file to publish
     *
     * The configuration file will be:
     * - Automatically merged with the application config (mergeConfigFrom)
     * - Publishable via: php artisan vendor:publish --tag="filament-navigation-config"
     *
     * @param Package $package The package instance to configure
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile('filament-navigation');
    }
}
