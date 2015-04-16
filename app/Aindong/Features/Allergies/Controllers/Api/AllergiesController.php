<?php

namespace Aindong\Features\Allergies\Controllers\Api;

use Aindong\Features\Allergies\Repositories\AllergyInterface;
use Carbon\Carbon;

class AllergiesController extends \BaseController {

    /**
     * @var AllergyInterface
     */
    protected $allergy;

    /**
     * @param AllergyInterface $allergy
     */
    public function __construct(AllergyInterface $allergy) {
        $this->allergy = $allergy;
    }

    public function index()
    {
        $allergies = $this->allergy->all();

        $result = ['data' => []];

        foreach ($allergies as $allergy) {
            $result['data'][] = [
                'id'        => $allergy->id,
                'type'      => $allergy->type,
                'name'      => $allergy->name,
                'created'   => Carbon::createFromTimestamp(strtotime($allergy->created_at))->format('M d, Y'),
                'updated'   => Carbon::createFromTimestamp(strtotime($allergy->updated_at))->format('M d, Y'),
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

        $allergy = $this->allergy->create($data);

        $status = 'failed';
        if ($allergy['status'] != 'failed') {
            $status = 'success';
        }

        $result = ['status' => $status, 'data' => $allergy];

        return \Response::json($result, 200);
    }

    public function update($id)
    {
        $data = \Input::all();

        $item = $this->allergy->update($id, $data);

        if ($item) {
            $result = ['status' => 'success', 'data' => $item];
        } else {
            $result = ['status' => 'failed', 'data' => $item];
        }

        return \Response::json($result);
    }

    public function destroy($id)
    {
        $status = $this->allergy->delete($id);

        if ($status) {
            return \Response::json(['status' => 'success'], 200);
        }

        return \Response::json(['status' => 'failed'], 400);
    }
}