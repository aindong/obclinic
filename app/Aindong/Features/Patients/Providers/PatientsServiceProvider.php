<?php
namespace Aindong\Features\Patients\Providers;

use Aindong\Features\Patients\Models\Patient;
use Aindong\Features\Patients\Repositories\PatientRepository;
use Illuminate\Support\ServiceProvider;

class PatientsServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Patients\Repositories\PatientInterface', function ($app) {
            return new PatientRepository(new Patient);
        });
    }
}