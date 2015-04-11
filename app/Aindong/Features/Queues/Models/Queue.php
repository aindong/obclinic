<?php
namespace Aindong\Features\Queues\Models;

use Carbon\Carbon;

class Queue extends \Eloquent {

    protected $table = 'queues';
    protected $fillable = ['arrival', 'patient_no', 'vitalsign_id', 'reservation_type'];

    public function scopeToday()
    {
        return Carbon::createFromTimestamp(strtotime($this->arrival))->isToday();
    }

    public function patient()
    {
        return $this->belongsTo('Patient', 'patient_no');
    }

}