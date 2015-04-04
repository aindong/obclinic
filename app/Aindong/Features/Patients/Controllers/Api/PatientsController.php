<?php

namespace Aindong\Features\Patients\Controllers\Api;

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
        // Create the result
        $result = ['status' => 'success',
            'data' => $this->patient->paginate()];

        return \Response::json($result, 200);
    }

    public function store()
    {
        $data = \Input::all();

        // Create the result
        $result = ['status' => 'success',
            'data' => $this->patient->create($data)];

        return \Response::json($result, 200);
    }
}