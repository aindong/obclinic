<?php
namespace Aindong\Features\Queues\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class QueueRepository extends EloquentRepository {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}