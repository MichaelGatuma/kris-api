<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateResearcherAPIRequest;
use App\Http\Requests\API\UpdateResearcherAPIRequest;
use App\Models\Researcher;
use App\Repositories\ResearcherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class ResearcherController
 * @package App\Http\Controllers\API
 */
class ResearcherAPIController extends AppBaseController
{
    /** @var  ResearcherRepository */
    private $researcherRepository;

    public function __construct(ResearcherRepository $researcherRepo)
    {
        $this->researcherRepository = $researcherRepo;
    }

    /**
     * @group Researcher Endpoints
     *
     * List all Researchers
     * @authenticated
     *
     * This endpoints returns all researchers
     *
     * @queryParam institution string Search by the given research institution
     * @queryParam researcharea string Search by the given research area
     * @queryParam department string Search by the given department
     * @queryParam name string Search researcher by their name
     *
     * @param  Request  $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $perPage = $request->has('perPage') ? $request->perPage : 10;
        $institution = $request->get('institution');
        $researcharea = $request->get('researcharea');
        $department = $request->get('department');
        $name = $request->get('name');

        $researchers = Researcher::with(['user', 'department', 'department.researchinstitution']);
        if ($department !== null) {
            $researchers = $researchers->whereHas('department', function ($q) use ($department) {
                $q->where('DptName', $department);
            });
        }
        if ($institution !== null) {
            $researchers = $researchers->whereHas('department.researchinstitution', function ($q) use ($institution) {
                $q->where('RIName', $institution);
            });
        }
        if ($researcharea !== null) {
            $researchers = $researchers->where('ResearchAreaOfInterest', $researcharea);
        }
        if ($name !== null) {
            $researchers = $researchers->whereHas('user', function ($q) use ($name) {
                $q->where('name', 'LIKE', '%'.$name.'%');
            });
        }
        return $this->sendResponse($researchers->paginate($perPage), 'Researchers retrieved successfully');
    }

    public function store(CreateResearcherAPIRequest $request)
    {
        $input = $request->all();

        $researcher = $this->researcherRepository->create($input);

        return $this->sendResponse($researcher->toArray(), 'Researcher saved successfully');
    }

    /**
     *
     * @group Researcher Endpoints
     *
     * View a single researcher
     * @authenticated
     *
     * Display a researcher by id and all related projects and publications
     *
     * @urlParam id integer required The specified researcher id. No-example
     *
     */
    public function show($id)
    {
        /** @var Researcher $researcher */
        $researcher = Researcher::with([
            'projects', 'publications'
        ])->find($id);

        if (empty($researcher)) {
            return $this->sendError('Researcher not found');
        }

        return $this->sendResponse($researcher, 'Researcher retrieved successfully');
    }

    /**
     * @group Researcher Endpoints
     *
     * View a researcher by User id
     * @authenticated
     *
     * Display a researcher profile and all related projects and publications by user id
     *
     * @urlParam id integer required The specified user id. No-example
     *
     */
    public function showByUser($id)
    {
        /** @var Researcher $researcher */
        $researcher = Researcher::with([
            'user', 'projects', 'publications'
        ])->whereHas('user', function ($q) use ($id) {
            $q->where('id', $id);
        });

        if (empty($researcher)) {
            return $this->sendError('User\'s Researcher Profile not found');
        }
        if ($researcher->count() < 1) {
            return $this->sendError('Researcher not found');
        }
        return $this->sendResponse($researcher->get(), 'User\'s Researcher Profile retrieved successfully');
    }

    /**
     * @group Researcher Endpoints
     *
     * View a researcher by authenticated user
     * @authenticated
     *
     * Display a researcher profile and all related projects and publications of the authenticated user
     */
    public function showByAuthUser()
    {
        /** @var Researcher $researcher */
        $researcher = Researcher::with([
            'user', 'projects', 'publications'
        ])->whereHas('user', function ($q) {
            $q->where('id', Auth::id());
        });

        if (empty($researcher)) {
            return $this->sendError('User\'s Researcher Profile not found');
        }
        if ($researcher->count() < 1) {
            return $this->sendError('Researcher not found');
        }
        return $this->sendResponse($researcher->get(), 'User\'s Researcher Profile retrieved successfully');

    }

    public function update($id, UpdateResearcherAPIRequest $request)
    {
        $input = $request->all();

        /** @var Researcher $researcher */
        $researcher = $this->researcherRepository->find($id);

        if (empty($researcher)) {
            return $this->sendError('Researcher not found');
        }

        $researcher = $this->researcherRepository->update($input, $id);

        return $this->sendResponse($researcher->toArray(), 'Researcher updated successfully');
    }

    public function destroy($id)
    {
        /** @var Researcher $researcher */
        $researcher = $this->researcherRepository->find($id);

        if (empty($researcher)) {
            return $this->sendError('Researcher not found');
        }

        $researcher->delete();

        return $this->sendSuccess('Researcher deleted successfully');
    }

    /**
     * @group Researcher Endpoints
     * Show Researcher's Active Projects
     *
     * This endpoint return the active projects of the authenticated user.
     * @authenticated
     *
     * @response status=200 {
     *
     * }
     *
     * @response status=400  {
     *
     * }
     */
    public function activeProjects(Request $request)
    {
        $user = $request->user();
        $active_projects = $user->researchprojects()->where('Status', '=', 'Ongoing');
        return response()->json(
            [
                "success" => true,
                "data" => $active_projects,
                "message" => "Researcher active projects retrieved successfully"
            ]
            , 200);
    }
}
