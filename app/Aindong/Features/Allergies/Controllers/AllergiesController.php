<?php

namespace Aindong\Features\Allergies\Controllers;

use Aindong\Features\Allergies\Repositories\AllergyInterface;

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
        return \View::make('maintenance.allergies.index');
    }
}