<?php
namespace Aindong\Features\Medias\Repositories;

use Aindong\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;

class MediaRepository extends EloquentRepository implements MediaInterface {
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}