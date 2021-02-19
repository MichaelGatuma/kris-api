<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;

class InflationController extends AppBaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * @group Dropdown Inflating Endpoints
     *
     * Research Areas
     * @authenticated
     *
     * A list of Research areas returned with their id.
     */
    public function researchAreas()
    {
        $researchAreas = \App\Models\Researcharea::all()->pluck('ResearchAreaName');
        return $this->sendResponse($researchAreas, 'Research Areas retrieved successfully');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * @group Dropdown Inflating Endpoints
     *
     * Institutions
     * @authenticated
     *
     * A list of Research Institutions returned with their id.
     */
    public function institutions()
    {
        $institutions = \App\Models\Researchinstitution::all()->pluck('RIName');
        return $this->sendResponse($institutions, 'Institutions retrieved successfully');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * @group Dropdown Inflating Endpoints
     *
     * Departments
     * @authenticated
     *
     * A list of departments returned with their id.
     */
    public function departments()
    {
        $departments = \App\Models\Department::all()->pluck('DptName');
        return $this->sendResponse($departments, 'Departments retrieved successfully');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * @group Dropdown Inflating Endpoints
     *
     * Funders
     * @authenticated
     *
     * A list of Funders returned with their id.
     */
    public function funders()
    {
        $funders = \App\Models\Funder::all()->pluck('FunderName');
        return $this->sendResponse($funders, 'Funders retrieved successfully');
    }
}
