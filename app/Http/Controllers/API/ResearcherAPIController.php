<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateResearcherAPIRequest;
use App\Http\Requests\API\UpdateResearcherAPIRequest;
use App\Models\Researcher;
use App\Repositories\ResearcherRepository;
use Illuminate\Http\Request;
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


    public function index(Request $request)
    {
        $perPage = $request->has('perPage') ? $request->perPage : 10;
        $researchers = Researcher::paginate($perPage);

        return $this->sendResponse($researchers, 'Researchers retrieved successfully');
    }

    public function store(CreateResearcherAPIRequest $request)
    {
        $input = $request->all();

        $researcher = $this->researcherRepository->create($input);

        return $this->sendResponse($researcher->toArray(), 'Researcher saved successfully');
    }

    public function show($id)
    {
        /** @var Researcher $researcher */
        $researcher = $this->researcherRepository->find($id);

        if (empty($researcher)) {
            return $this->sendError('Researcher not found');
        }

        return $this->sendResponse($researcher->toArray(), 'Researcher retrieved successfully');
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
