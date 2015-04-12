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
                'updated'   => Carbon::createFromTimestamp(strtotime($allergy->updated_at))->format('M d, Y')
            ];
        }

        return \Response::json($result, 200);
    }
}