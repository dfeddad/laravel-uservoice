<?php namespace Dfeddad\UserVoice;

use Illuminate\Support\ServiceProvider;
use UserVoice\Client;

class UserVoiceServiceProvider extends ServiceProvider {

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
        $this->package('dfeddad/laravel-uservoice', 'dfeddad/laravel-uservoice');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('uservoice', function ($app) {
            /** @var \Illuminate\Config\Repository $config */
            $config = $app['config'];

            return new Client(
                $config->get('dfeddad/laravel-uservoice::subdomain'),
                $config->get('dfeddad/laravel-uservoice::apiKey'),
                $config->get('dfeddad/laravel-uservoice::apiSecret')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('uservoice');
    }

}
