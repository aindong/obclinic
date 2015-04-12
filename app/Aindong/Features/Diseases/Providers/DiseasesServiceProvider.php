<?php
namespace Aindong\Features\Diseases\Providers;

use Aindong\Features\Diseases\Models\Disease;
use Aindong\Features\Diseases\Repositories\DiseaseRepository;
use Illuminate\Support\ServiceProvider;

class DiseasesServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Diseases\Repositories\DiseaseInterface', function ($app) {
            return new DiseaseRepository(new Disease);
        });
    }
}