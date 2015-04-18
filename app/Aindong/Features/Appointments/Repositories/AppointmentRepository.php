<?php
namespace Aindong\Features\Appointments\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class AppointmentRepository extends EloquentRepository implements AppointmentInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}