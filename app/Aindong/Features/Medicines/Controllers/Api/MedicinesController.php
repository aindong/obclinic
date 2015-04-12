<?php

namespace Aindong\Features\Medicines\Controllers\Api;

use Aindong\Features\Medicines\Repositories\MedicineInterface;
use Carbon\Carbon;

class MedicinesController extends \BaseController {

    /**
     * @var MedicineInterface
     */
    protected $medicine;

    /**
     * @param MedicineInterface $medicine
     */
    public function __construct(MedicineInterface $medicine) {
        $this->medicine = $medicine;
    }

    public function index()
    {
        $medicines = $this->medicine->all();

        $result = ['data' => []];

        foreach ($medicines as $medicine) {
            $result['data'][] = [
                'id'    => $medicine->id,
                'name'      => $medicine->name,
                'created'   => Carbon::createFromTimestamp(strtotime($medicine->created_at))->format('M d, Y'),
                'updated'   => Carbon::createFromTimestamp(strtotime($medicine->updated_at))->format('M d, Y')
            ];
        }

        return \Response::json($result, 200);
    }
}