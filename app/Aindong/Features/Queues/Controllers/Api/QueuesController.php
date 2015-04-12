<?php

namespace Aindong\Features\Queues\Controllers\Api;

use Aindong\Features\Queues\Repositories\QueueInterface;
use Carbon\Carbon;

class QueuesController extends \BaseController {

    /**
     * @var QueueInterface
     */
    protected $queue;

    /**
     * @param QueueInterface $queue
     */
    public function __construct(QueueInterface $queue) {
        $this->queue = $queue;
    }

    /**
     * Index
     * Get all queues
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Get all the queues for today
        $queues = $this->queue->getToday();

        // Create the result array
        $result = ['data' => []];

        foreach ($queues as $queue) {
            $result['data'][] = [
                'queue_no'      => $queue->id,
                'arrival'       => Carbon::createFromTimestamp(strtotime($queue->arrival))->format('M d, Y'),
                'patient_id'    => $queue->patient_no,
                'patient_name'  => $queue->patient->firstname . ' ' . $queue->patient->lastname,
                'vitalsign'     => 'todo',
                'type'          => $queue->reservation_type
            ];
        }

        // Return as json
        return \Response::json($result, 200);
    }
}