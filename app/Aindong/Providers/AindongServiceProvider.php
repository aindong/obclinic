<?php
namespace Aindong\Providers;

use Aindong\Commands\GenerateFeature;
use Illuminate\Support\ServiceProvider;

class AindongServiceProvider extends ServiceProvider {
    public function boot()
    {

    }

    public function register()
    {
        $this->registerCommands();
    }

    public function registerCommands()
    {
        $this->app['commands.aindong.generatefeature'] = $this->app->share(function($app) {
            return new GenerateFeature($app['files']);
        });

        $this->commands('commands.aindong.generatefeature');
    }
}