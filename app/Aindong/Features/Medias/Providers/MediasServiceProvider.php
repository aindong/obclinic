<?php
namespace Aindong\Features\Medias\Providers;

use Aindong\Features\Medias\Models\Media;
use Aindong\Features\Medias\Repositories\MediaRepository;
use Illuminate\Support\ServiceProvider;

class MediasServiceProvider extends ServiceProvider {

    public function boot() {
        include_once  __DIR__.'/../routes.php';
    }

    public function register()
    {
        $this->app->bind('Aindong\Features\Medias\Repositories\MediaInterface', function ($app) {
            return new MediaRepository(new Media);
        });
    }
}