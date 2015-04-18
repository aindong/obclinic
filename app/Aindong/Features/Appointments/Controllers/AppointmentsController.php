<?php

namespace Aindong\Features\Appointments\Controllers;

use Aindong\Features\Appointments\Repositories\AppointmentInterface;

class AppointmentsController extends \BaseController {

    /**
     * @var AppointmentInterface
     */
    protected $appointment;

    /**
     * @param AppointmentInterface $appointment
     */
    public function __construct(AppointmentInterface $appointment) {
        $this->appointment = $appointment;
    }

    public function index()
    {

    }
}