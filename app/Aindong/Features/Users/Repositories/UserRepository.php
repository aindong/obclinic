<?php
namespace Aindong\Features\Users\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends EloquentRepository implements UserInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}