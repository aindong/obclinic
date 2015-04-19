<?php
namespace Aindong\Features\Appointments\Models;

class Appointment extends \Eloquent {
    protected $table = 'appointments';
    protected $guarded = ['id'];

    public $rules = [
        'patient_no'        => 'required',
        'appointment_date'  => 'required',
        'status'            => 'required'
    ];

    public function user()
    {
        return $this->belongsTo('User', 'username', 'username');
    }

    public function patient()
    {
        return $this->belongsTo('Aindong\Features\Patients\Models\Patient', 'patient_no', 'patient_no');
    }
}