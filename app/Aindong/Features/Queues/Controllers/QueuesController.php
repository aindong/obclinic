<?php

namespace Aindong\Features\Queues\Controllers;

use Aindong\Features\Queues\Repositories\QueueInterface;

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

    public function index()
    {

    }
}