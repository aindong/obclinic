<?php
namespace Aindong\Features\Queues\Models;

use Carbon\Carbon;

class Queue extends \Eloquent {

    protected $table = 'queues';
    protected $fillable = ['arrival', 'patient_no', 'vitalsign_id', 'reservation_type'];

    public $rules = [];

    public function scopeToday()
    {
        return Carbon::createFromTimestamp(strtotime($this->arrival))->isToday();
    }

    public function patient()
    {
        return $this->belongsTo('Aindong\Features\Patients\Models\Patient', 'patient_no', 'patient_no');

    }

}