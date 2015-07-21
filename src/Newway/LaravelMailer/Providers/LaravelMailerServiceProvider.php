<?php namespace Newway\LaravelMailer\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use View;

class LaravelMailerServiceProvider extends ServiceProvider {

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
		$this->package('newway/laravel-mailer');
        $this->app['config']->package('newway/laravel-mailer', __DIR__ . '/../../../config');
        $this->app->register('Bogardo\Mailgun\MailgunServiceProvider');

        foreach($this->app['config']->get('laravel-mailer::providers.mailgun') as $property => $value) {
            $this->app['config']->set('mailgun::' . $property, $value);
        };

        View::addNamespace('laravel-mailer', __DIR__.'/../../../views');
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
		return array();
	}

}
