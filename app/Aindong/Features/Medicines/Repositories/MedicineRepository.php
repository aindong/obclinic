<?php
namespace Aindong\Features\Medicines\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class MedicineRepository extends EloquentRepository implements MedicineInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}