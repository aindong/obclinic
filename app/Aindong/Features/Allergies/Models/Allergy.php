<?php
namespace Aindong\Features\Allergies\Models;

class Allergy extends \Eloquent {
    protected $table = 'allergies';
    protected $guarded = ['id'];

    public $rules = [
        'type' => 'required',
        'name' => 'required'
    ];
}