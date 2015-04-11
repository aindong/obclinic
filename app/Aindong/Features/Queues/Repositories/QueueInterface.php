<?php
namespace Aindong\Features\Queues\Repositories;

use Aindong\Repositories\EloquentInterface;

interface QueueInterface extends EloquentInterface {
    public function getToday();
}