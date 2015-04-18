<?php
namespace Aindong\Features\Appointments\Providers;

use Aindong\Features\Appointments\Models\Appointment;
use Aindong\Features\Appointments\Repositories\AppointmentRepository;
use Illuminate\Support\ServiceProvider;

class AppointmentsServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Appointments\Repositories\AppointmentInterface', function ($app) {
            return new AppointmentRepository(new Appointment);
        });
    }
}