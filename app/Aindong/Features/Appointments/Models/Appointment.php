<?php
namespace Aindong\Features\Appointments\Models;

class Appointment extends \Eloquent {
    protected $table = 'appointments';
    protected $guarded = ['id'];

    public $rules = [
        'patient_no'        => 'required',
        'appointment_data'  => 'required',
        'status'            => 'required'
    ];

    public function user()
    {
        return $this->belongsTo('User', 'username');
    }

    public function patient()
    {
        return $this->belongsTo('Patient', 'patient_no');
    }
}