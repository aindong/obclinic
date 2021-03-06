<?php
namespace Aindong\Repositories;

use Aindong\Repositories\EloquentInterface;
use Illuminate\Database\Eloquent\Model;
use Validator;

class EloquentRepository implements EloquentInterface {

    protected $model;
    public $errors = [];

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function paginate($no = 10, $columns = ['*'])
    {
        return $this->model->paginate($no, $columns);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($field, $value, $operator = '=')
    {
        return $this->model->where($field, $operator, $value);
    }

    public function create(array $data)
    {
        $valid = Validator::make($data, $this->model->rules);

        if ($valid->fails()) {
            $this->getErrors($valid->errors());
            return ['status' => 'failed',  'errors' => $this->errors];
        }

        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $valid = Validator::make($data, $this->model->rules);

        if ($valid->fails()) {
            $this->getErrors($valid->errors());
            return null;
        }

        $model = $this->model->find($id);
        return $model->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getErrors($errors)
    {
        foreach ($errors->all() as $error) {
            $this->errors[] = $error;
        }
    }
}