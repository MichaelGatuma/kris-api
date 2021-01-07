<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateProjectAPIRequest;
use App\Http\Requests\API\UpdateProjectAPIRequest;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Class ProjectController
 * @package App\Http\Controllers\API
 */
class ProjectAPIController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     *
     * @SWG\Get(
     *      path="/projects",
     *      summary="Get a listing of the Projects.",
     *      tags={"Project"},
     *      description="Get all Projects",
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
     *                  @SWG\Items(ref="#/definitions/Project")
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
        $publications = Project::paginate($perPage);
        if ($request->has('search')) {
            $query = $request->search;
        }

        if ($request->has('recent')) {
            $publications = Project::all()->sortBy('created_at')->take($request->has('limit') ? $request->limit : 10);
        }

        return $this->sendResponse($publications, 'Projects retrieved successfully');
    }

    /**
     * @param  CreateProjectAPIRequest  $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/projects",
     *      summary="Store a newly created Project in storage",
     *      tags={"Project"},
     *      description="Store Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Project that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Project")
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
     *                  ref="#/definitions/Project"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProjectAPIRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        return $this->sendResponse($project->toArray(), 'Project saved successfully');
    }

    /**
     * @param  int  $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/projects/{id}",
     *      summary="Display the specified Project",
     *      tags={"Project"},
     *      description="Get Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
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
     *                  ref="#/definitions/Project"
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
        /** @var Project $project */
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        return $this->sendResponse($project->toArray(), 'Project retrieved successfully');
    }

    /**
     * @param  int  $id
     * @param  UpdateProjectAPIRequest  $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/projects/{id}",
     *      summary="Update the specified Project in storage",
     *      tags={"Project"},
     *      description="Update Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Project that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Project")
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
     *                  ref="#/definitions/Project"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProjectAPIRequest $request)
    {
        $input = $request->all();

        /** @var Project $project */
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        $project = $this->projectRepository->update($input, $id);

        return $this->sendResponse($project->toArray(), 'Project updated successfully');
    }

    /**
     * @param  int  $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/projects/{id}",
     *      summary="Remove the specified Project from storage",
     *      tags={"Project"},
     *      description="Delete Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
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
        /** @var Project $project */
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        $project->delete();

        return $this->sendSuccess('Project deleted successfully');
    }

    public function requestAccess($id, Request $request)
    {
        $project_id = $id;
        $user = $request->user();
        if ($user->id !== Project::find($project_id)->user()->id) {
            $access_request = new \App\Models\Request;
            $access_request->ResearchOwner_ID = Project::find($project_id)->researcher()->id;
            $access_request->RequestedAccess = 0;
            $access_request->ResearchProject_ID = $project_id;
            $access_request->User_ID = $user->id;
            $access_request->RequestMessage = $request->has('message') ? $request->message : '';
            $access_request->save();
            return $this->sendSuccess('Access Request was successful');
            //todo: send email to project owner
        } else {
            return $this->sendError('You cannot request access to your project', 403);
        }
    }

    public function grantAccess($id, Request $request)
    {
        $request_id = $id;
        $user = $request->user();
        $access_request = \App\Models\Request::find($request_id);
        if ($user->id === Project::find($access_request->ResearchProject_ID)->user()->id) {
            $access_request->RequestedAccess = 1;
            $access_request->RequestReply = $request->has('message') ? $request->message : '';
            $access_request->save();
            return $this->sendSuccess('Access Request was successful');
            //todo: send email to access requester
        } else {
            return $this->sendError('You do not have such rights to this project', 403);
        }
    }
}
