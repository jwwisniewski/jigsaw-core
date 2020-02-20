<?php

namespace jwwisniewski\Jigsaw\Core;

use Illuminate\Support\ServiceProvider;

class JigsawCoreServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/jigsaw.php' => config_path('jigsaw.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../views', 'jigsaw-core');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Jigsaw::class, static function () {
            return new Jigsaw();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    }

}
