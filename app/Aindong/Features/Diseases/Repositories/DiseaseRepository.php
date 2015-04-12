<?php
namespace Aindong\Features\Diseases\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class DiseaseRepository extends EloquentRepository implements DiseaseInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}