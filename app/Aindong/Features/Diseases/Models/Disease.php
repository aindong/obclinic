<?php
namespace Aindong\Features\Diseases\Models;

class Disease extends \Eloquent {
    protected $table = 'diseases';
    protected $guarded = ['id'];

    public $rules = [
        'name' => 'required'
    ];
}