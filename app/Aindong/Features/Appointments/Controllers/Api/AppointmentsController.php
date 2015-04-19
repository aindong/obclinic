<?php
namespace Aindong\Features\Appointments\Controllers\Api;

use Aindong\Features\Appointments\Repositories\AppointmentInterface;
use Carbon\Carbon;

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
        $appointments = $this->appointment->all();

        $result = ['data' => []];

        foreach ($appointments as $appointment) {
            $result['data'][] = [
                'id'               => $appointment->id,
                'patient_no'       => $appointment->patient_no,
                'name'             => $appointment->patient->firstname . ' ' . $appointment->patient->lastname,
                'appointment_date' => Carbon::createFromTimestamp(strtotime($appointment->appointment_date))->format('M d, Y'),
                'status'           => $appointment->status,
                'created_by'       => $appointment->user->firstname . ' ' . $appointment->user->lastname,
                'created'          => Carbon::createFromTimestamp(strtotime($appointment->created_at))->format('M d, Y'),
                'updated'          => Carbon::createFromTimestamp(strtotime($appointment->updated_at))->format('M d, Y'),
                'actions'   => '<div class="btn-group">
                                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        Actions <i class="fa fa-caret-down text-default-light"></i>
                                    </button><div class="dropdown-backdrop"></div>

                                    <ul class="dropdown-menu animation-expand" role="menu">
                                        <li><a href="#">Postponed</a></li>
                                        <li><a href="#">Cancelled</a></li>
                                        <li><a href="#">Completed</a></li>

                                        <li class="divider"></li>
                                        <li><a href="#"><i class="fa fa-fw fa-times text-danger"></i> Remove item</a></li>
                                    </ul>
                                </div>'
            ];
        }

        return \Response::json($result, 200);
    }

    public function store()
    {
        $data = \Input::all();
        $data['username'] = 'alan66';
        $appointment = $this->appointment->create($data);

        $status = 'failed';
        if ($appointment['status'] != 'failed') {
            $status = 'success';
        }

        $result = ['status' => $status, 'data' => $appointment];

        return \Response::json($result, 200);
    }

    public function update($id)
    {
        $data = \Input::all();

        $item = $this->appointment->update($id, $data);

        if ($item) {
            $result = ['status' => 'success', 'data' => $item];
        } else {
            $result = ['status' => 'failed', 'data' => $item];
        }

        return \Response::json($result);
    }

    public function destroy($id)
    {
        $status = $this->appointment->delete($id);

        if ($status) {
            return \Response::json(['status' => 'success'], 200);
        }

        return \Response::json(['status' => 'failed'], 400);
    }
}