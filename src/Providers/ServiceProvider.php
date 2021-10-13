<?php

namespace Gegosoft\Rxccoin\Providers;

use Gegosoft\Rxccoin\Client as RxccoinClient;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('rxccoind.php')], 'config');
        $this->mergeConfigFrom($path, 'rxccoind');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();

        $this->registerClient();
    }

    /**
     * Register aliases.
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'rxccoind' => 'Gegosoft\Rxccoin\Client',
        ];

        foreach ($aliases as $key => $aliases) {
            foreach ((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }

    /**
     * Register client.
     *
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton('rxccoind', function ($app) {
            return new RxccoinClient([
                'scheme' => $app['config']->get('rxccoind.scheme', 'http'),
                'host'   => $app['config']->get('rxccoind.host', 'localhost'),
                'port'   => $app['config']->get('rxccoind.port', 8332),
                'user'   => $app['config']->get('rxccoind.user'),
                'pass'   => $app['config']->get('rxccoind.password'),
                'ca'     => $app['config']->get('rxccoind.ca'),
            ]);
        });
    }
}
