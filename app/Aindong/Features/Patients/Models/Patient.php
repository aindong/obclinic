<?php
namespace Aindong\Features\Patients\Models;

class Patient extends \Eloquent {
    protected $table = 'patients';

    public $rules = [];

    protected $guarded = [];
}