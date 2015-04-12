<?php

namespace Aindong\Features\Medicines\Controllers;

use Aindong\Features\Medicines\Repositories\MedicineInterface;

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
        return \View::make('maintenance.medicines.index');
    }
}