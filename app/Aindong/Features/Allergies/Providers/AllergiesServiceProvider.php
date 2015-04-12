<?php
namespace Aindong\Features\Allergies\Providers;

use Aindong\Features\Allergies\Models\Allergy;
use Aindong\Features\Allergies\Repositories\AllergyRepository;
use Illuminate\Support\ServiceProvider;

class AllergiesServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Allergies\Repositories\AllergyInterface', function ($app) {
            return new AllergyRepository(new Allergy);
        });
    }
}