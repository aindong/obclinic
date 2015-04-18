<?php
namespace Aindong\Features\Users\Providers;

use User;
use Aindong\Features\Users\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Users\Repositories\UserInterface', function ($app) {
            return new UserRepository(new User);
        });
    }
}