<?php

namespace Aindong\Features\Patients\Controllers;

use Aindong\Features\Patients\Repositories\PatientInterface;

class PatientsController extends \BaseController {

    /**
     * @var PatientInterface
     */
    protected $patient;

    /**
     * @param PatientInterface $patient
     */
    public function __construct(PatientInterface $patient) {
        $this->patient = $patient;
    }

    public function index()
    {
        return \View::make('patients.index');
    }
}