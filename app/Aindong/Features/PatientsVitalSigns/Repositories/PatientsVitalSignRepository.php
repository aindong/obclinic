<?php
namespace Aindong\Features\Patientsvitalsigns\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class PatientsvitalsignRepository extends EloquentRepository implements PatientsvitalsignInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}