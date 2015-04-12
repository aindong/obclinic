<?php
namespace Aindong\Features\Medicines\Providers;

use Aindong\Features\Medicines\Models\Medicine;
use Aindong\Features\Medicines\Repositories\MedicineRepository;
use Illuminate\Support\ServiceProvider;

class MedicinesServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Medicines\Repositories\MedicineInterface', function ($app) {
            return new MedicineRepository(new Medicine);
        });
    }
}