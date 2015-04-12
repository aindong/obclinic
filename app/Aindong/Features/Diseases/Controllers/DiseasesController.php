<?php

namespace Aindong\Features\Diseases\Controllers;

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
        return \View::make('maintenance.diseases.index');
    }
}