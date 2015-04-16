<?php
namespace Aindong\Features\Medicines\Models;

class Medicine extends \Eloquent {
    protected $table = 'medicines';
    protected $guarded = ['id'];

    public $rules = ['name' => 'required'];
}