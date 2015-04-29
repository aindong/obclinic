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
        $result = $this->patient->paginate();

        if (\Input::has('q')) {
            if (\Input::get('q') == 'all')
            // Create the result
            $result = $this->patient->all();
        }

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

    public function update($id)
    {
        $data = \Input::all();

        $item = $this->patient->update($id, $data);

        if ($item) {
            $result = ['status' => 'success', 'data' => $item];
        } else {
            $result = ['status' => 'failed', 'data' => $item];
        }

        return \Response::json($result);
    }

    public function destroy($id)
    {
        $status = $this->patient->delete($id);

        if ($status) {
            return \Response::json(['status' => 'success'], 200);
        }

        return \Response::json(['status' => 'failed'], 400);
    }
}