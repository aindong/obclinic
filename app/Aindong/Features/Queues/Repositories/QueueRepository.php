<?php
namespace Aindong\Features\Queues\Repositories;

use Aindong\Features\Queues\Models\Queue;
use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class QueueRepository extends EloquentRepository implements QueueInterface {
    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);

        $this->model = $model;
    }

    public function getToday()
    {
        return $this->model->today()->get();
    }
}