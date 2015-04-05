<?php
namespace Aindong\Features\Patients\Models;

class Patient extends \Eloquent {
    protected $table = 'patients';

    public $rules = [];

    protected $guarded = [];

    public function picture()
    {
        return $this->morphTo('Media', 'imageable');
    }
}