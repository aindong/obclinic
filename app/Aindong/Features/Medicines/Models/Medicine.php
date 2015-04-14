<?php
namespace Aindong\Features\Medicines\Models;

class Medicine extends \Eloquent {
    protected $table = 'medicines';
    protected $guarded = ['id'];

    protected $rules = ['name' => 'required'];
}