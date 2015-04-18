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

        $this->registerFeatures();
    }

    public function registerCommands()
    {
        $this->app['commands.aindong.generatefeature'] = $this->app->share(function($app) {
            return new GenerateFeature($app['files']);
        });

        $this->commands('commands.aindong.generatefeature');
    }

    /**
     * Register application specific providers
     */
    private function registerFeatures()
    {
        $this->app->register('Aindong\Features\Patients\Providers\PatientsServiceProvider');
        $this->app->register('Aindong\Features\Medias\Providers\MediasServiceProvider');
        $this->app->register('Aindong\Features\PatientsVitalSigns\Providers\PatientsVitalSignsServiceProvider');
        $this->app->register('Aindong\Features\Queues\Providers\QueuesServiceProvider');
        $this->app->register('Aindong\Features\Allergies\Providers\AllergiesServiceProvider');
        $this->app->register('Aindong\Features\Medicines\Providers\MedicinesServiceProvider');
        $this->app->register('Aindong\Features\Diseases\Providers\DiseasesServiceProvider');
        $this->app->register('Aindong\Features\Appointments\Providers\AppointmentsServiceProvider');
        $this->app->register('Aindong\Features\Users\Providers\UsersServiceProvider');
    }
}