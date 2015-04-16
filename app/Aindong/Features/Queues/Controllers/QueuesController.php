<?php

namespace Aindong\Features\Queues\Controllers;

use Aindong\Features\Queues\Repositories\QueueInterface;
use Aindong\Features\Patients\Repositories\PatientInterface;

class QueuesController extends \BaseController {

    /**
     * @var QueueInterface
     */
    protected $queue;

    /**
     * @var PatientInterface
     */
    protected $patient;

    /**
     * @param QueueInterface $queue
     */
    public function __construct(QueueInterface $queue, PatientInterface $patient) {
        $this->queue = $queue;
        $this->patient = $patient;
    }

    public function index()
    {
        $patients = $this->patient->all(['patient_no', 'firstname', 'middlename', 'lastname']);

        return \View::make('home.index')
            ->with('patients', $patients);
    }
}