<?php

namespace Aindong\Features\Patientsvitalsigns\Controllers;

use Aindong\Features\Patientsvitalsigns\Repositories\PatientsvitalsignInterface;

class PatientsvitalsignsController extends \BaseController {

    /**
     * @var PatientsvitalsignInterface
     */
    protected $patientsvitalsign;

    /**
     * @param PatientsvitalsignInterface $patientsvitalsign
     */
    public function __construct(PatientsvitalsignInterface $patientsvitalsign) {
        $this->patientsvitalsign = $patientsvitalsign;
    }

    public function index()
    {

    }
}