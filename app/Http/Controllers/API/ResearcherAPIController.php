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

    /**
     * @param  Request  $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/researchers",
     *      summary="Get a listing of the Researchers.",
     *      tags={"Researcher"},
     *      description="Get all Researchers",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Researcher")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $perPage = $request->has('perPage') ? $request->perPage : 10;
        $researchers = Researcher::paginate($perPage);

        return $this->sendResponse($researchers, 'Researchers retrieved successfully');
    }

    /**
     * @param  CreateResearcherAPIRequest  $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/researchers",
     *      summary="Store a newly created Researcher in storage",
     *      tags={"Researcher"},
     *      description="Store Researcher",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Researcher that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Researcher")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Researcher"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateResearcherAPIRequest $request)
    {
        $input = $request->all();

        $researcher = $this->researcherRepository->create($input);

        return $this->sendResponse($researcher->toArray(), 'Researcher saved successfully');
    }

    /**
     * @param  int  $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/researchers/{id}",
     *      summary="Display the specified Researcher",
     *      tags={"Researcher"},
     *      description="Get Researcher",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Researcher",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Researcher"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Researcher $researcher */
        $researcher = $this->researcherRepository->find($id);

        if (empty($researcher)) {
            return $this->sendError('Researcher not found');
        }

        return $this->sendResponse($researcher->toArray(), 'Researcher retrieved successfully');
    }

    /**
     * @param  int  $id
     * @param  UpdateResearcherAPIRequest  $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/researchers/{id}",
     *      summary="Update the specified Researcher in storage",
     *      tags={"Researcher"},
     *      description="Update Researcher",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Researcher",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Researcher that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Researcher")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Researcher"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
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

    /**
     * @param  int  $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/researchers/{id}",
     *      summary="Remove the specified Researcher from storage",
     *      tags={"Researcher"},
     *      description="Delete Researcher",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Researcher",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
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
