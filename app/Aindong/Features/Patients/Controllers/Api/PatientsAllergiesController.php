<?php
namespace Aindong\Features\Patients\Controllers\Api;

use Aindong\Features\Allergies\Repositories\AllergyInterface;
use Aindong\Features\Patients\Repositories\PatientInterface;

class PatientsAllergiesController extends \BaseController {

    /**
     * @var AllergyInterface
     */
    public $allergy;

    /**
     * @var PatientInterface
     */
    public $patient;

    /**
     * Constructor
     *
     * @param AllergyInterface $allergy
     * @param PatientInterface $patient
     */
    public function __construct(AllergyInterface $allergy, PatientInterface $patient)
    {
        $this->allergy = $allergy;
        $this->patient = $patient;
    }

    public function index()
    {
        
    }
}