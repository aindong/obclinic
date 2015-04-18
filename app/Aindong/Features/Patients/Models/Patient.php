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

    public function queue()
    {
        return $this->hasMany('Queue', 'patient_no');
    }

    public function appointment()
    {
        return $this->hasMany('Appointment', 'patient_no');
    }
}