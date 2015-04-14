<?php

namespace Aindong\Features\Diseases\Controllers\Api;

use Aindong\Features\Diseases\Repositories\DiseaseInterface;
use Carbon\Carbon;

class DiseasesController extends \BaseController {

    /**
     * @var DiseaseInterface
     */
    protected $disease;

    /**
     * @param DiseaseInterface $disease
     */
    public function __construct(DiseaseInterface $disease) {
        $this->disease = $disease;
    }

    public function index()
    {
        $diseases = $this->disease->all();

        $result = ['data' => []];

        foreach ($diseases as $disease) {
            $result['data'][] = [
                'id'    => $disease->id,
                'name'      => $disease->name,
                'created'   => Carbon::createFromTimestamp(strtotime($disease->created_at))->format('M d, Y'),
                'updated'   => Carbon::createFromTimestamp(strtotime($disease->updated_at))->format('M d, Y')
            ];
        }

        return \Response::json($result, 200);
    }

    public function store()
    {
        $data = \Input::all();

        $disease = $this->disease->create($data);

        $status = 'failed';
        if ($disease['status'] != 'failed') {
            $status = 'success';
        }

        $result = ['status' => $status, 'data' => $disease];

        return \Response::json($result, 200);
    }
}