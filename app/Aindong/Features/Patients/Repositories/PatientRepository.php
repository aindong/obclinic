<?php
namespace Aindong\Features\Patients\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class PatientRepository extends EloquentRepository implements PatientInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}