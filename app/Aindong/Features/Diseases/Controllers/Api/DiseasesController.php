<?php

namespace Aindong\Features\Diseases\Controllers\Api;

use Aindong\Features\Diseases\Repositories\DiseaseInterface;

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

    }
}