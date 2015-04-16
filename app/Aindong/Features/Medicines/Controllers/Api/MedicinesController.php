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
                'updated'   => Carbon::createFromTimestamp(strtotime($medicine->updated_at))->format('M d, Y'),
                'actions'   => '<div class="btn-group">
                                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        Actions <i class="fa fa-caret-down text-default-light"></i>
                                    </button><div class="dropdown-backdrop"></div>

                                    <ul class="dropdown-menu animation-expand" role="menu">
                                        <li><a href="#">Update</a></li>
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

        $medicine = $this->medicine->create($data);

        $status = 'failed';
        if ($medicine['status'] != 'failed') {
            $status = 'success';
        }

        $result = ['status' => $status, 'data' => $medicine];

        return \Response::json($result, 200);
    }

    public function update($id)
    {
        $data = \Input::all();

        $item = $this->medicine->update($id, $data);

        if ($item) {
            $result = ['status' => 'success', 'data' => $item];
        } else {
            $result = ['status' => 'failed', 'data' => $item];
        }

        return \Response::json($result);
    }

    public function destroy($id)
    {
        $status = $this->medicine->delete($id);

        if ($status) {
            return \Response::json(['status' => 'success'], 200);
        }

        return \Response::json(['status' => 'failed'], 400);
    }
}