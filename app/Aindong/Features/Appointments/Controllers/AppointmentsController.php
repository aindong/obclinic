<?php
namespace Aindong\Features\Appointments\Controllers;

use Aindong\Features\Appointments\Repositories\AppointmentInterface;
use Aindong\Features\Patients\Repositories\PatientInterface;

class AppointmentsController extends \BaseController {

    /**
     * @var AppointmentInterface
     */
    protected $appointment;

    /**
     * @var PatientInterface
     */
    protected $patient;

    /**
     * @param AppointmentInterface $appointment
     */
    public function __construct(AppointmentInterface $appointment, PatientInterface $patient) {
        $this->appointment = $appointment;
        $this->patient = $patient;
    }

    public function index()
    {
        $patients = $this->patient->all(['patient_no', 'firstname', 'middlename', 'lastname']);

        return \View::make('appointments.index')
            ->with('patients', $patients);
    }
}