<?php
namespace Aindong\Features\Allergies\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class AllergyRepository extends EloquentRepository implements AllergyInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}