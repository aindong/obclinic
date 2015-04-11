<?php
namespace Aindong\Features\Patientsvitalsigns\Providers;

use Aindong\Features\Patientsvitalsigns\Models\Patientsvitalsign;
use Aindong\Features\Patientsvitalsigns\Repositories\PatientsvitalsignRepository;
use Illuminate\Support\ServiceProvider;

class PatientsvitalsignsServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Patientsvitalsigns\Repositories\PatientsvitalsignInterface', function ($app) {
            return new PatientsvitalsignRepository(new Patientsvitalsign);
        });
    }
}