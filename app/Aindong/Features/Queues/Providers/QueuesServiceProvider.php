<?php
namespace Aindong\Features\Queues\Providers;

use Aindong\Features\Queues\Models\Queue;
use Aindong\Features\Queues\Repositories\QueueRepository;
use Illuminate\Support\ServiceProvider;

class QueuesServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Queues\Repositories\QueueInterface', function ($app) {
            return new QueueRepository(new Queue);
        });
    }
}