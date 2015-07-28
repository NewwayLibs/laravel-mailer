<?php namespace Newway\LaravelMailer\Providers;

use File;
use Illuminate\Support\ServiceProvider;
use Config;
use View;

/**
 * Class LaravelMailerServiceProvider
 * @package Newway\LaravelMailer\Providers
 */
class LaravelMailerServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->prepareResources();

        $this->registerProviders();
    }

    /**
     * Prepare the package resources.
     *
     * @return void
     */
    protected function prepareResources()
    {
        $configPath = __DIR__.'/../../../config/laravel-mailer-providers';
        $configs = File::allFiles($configPath);

        foreach ($configs as $config) {
            $provider = explode('.', $config->getFileName());
            $provider = $provider[0];

            $this->mergeConfigFrom($config->getPathname(), $provider);

            $this->publishes(
                [
                    $config->getPathname() => config_path('/laravel-mailer-providers/'.$provider.'.php'),
                ],
                'config'
            );
        }

        $configPath = __DIR__.'/../../../config/config.php';
        $this->mergeConfigFrom($configPath, 'laravel-mailer');
        $this->publishes(
            [
                $configPath => config_path('laravel-mailer.php'),
            ],
            'config'
        );

        $viewPath = __DIR__.'/../../../views';
        $this->loadViewsFrom($viewPath, 'laravel-mailer');
        $this->publishes(
            [
                $viewPath => base_path('resources/views/vendor/laravel-mailer'),
            ],
            'views'
        );

        $migrationPath = __DIR__.'/../../../migrations';
        $this->publishes(
            [
                $migrationPath => base_path('database/migrations'),
            ],
            'migrations'
        );
    }

    /**
     * register service providers for used providers
     */
    protected function registerProviders()
    {
        $service_providers = $this->app['config']->get('laravel-mailer.service_providers');

        foreach ($service_providers as $service_provider) {
            $this->app->register($service_provider);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array ();
    }

}