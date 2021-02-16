<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateProjectAPIRequest;
use App\Http\Requests\API\UpdateProjectAPIRequest;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

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
     * Search Projects with pagination
     *
     * This endpoint return an archive of the projects.
     * @authenticated
     *
     * @queryParam perPage Specify the entries to return in every page. If not specified, the default entries will be returned. Default: 10
     * @queryParam recent Specify this to show the most recent projects. If not specified, all entries will be returned with pagination. (Overrides 'perPage') Default: 10
     * @queryParam limit Specify the limit of entries to return. Must be used together with 'recent' If not specified, the default entries will be returned. Default: 10
     *
     * @response scenario=success {
     * "success": true,
     * "data": {
     * "current_page": 1,
     * "data": [
     * {
     * "created_at": null,
     * "updated_at": null,
     * "ProjectTitle": "A multi-level text clustering algorithm for retrieval of academic research data",
     * "Project_ID": 1,
     * "ProjectAbstract": "Lack of or limited access to research data is one of the major challenges facing the academic researchers in Kenyan institutions of higher learning, as well as its research institutes. This \r\nleads to duplication of research, less opportunities for networking, and also contributes to scientific \r\nfraud. Efforts need to be made in order to make academic research data available and accessible\r\n. ",
     * "Researcher_ID": 1,
     * "User_ID": 2,
     * "ProjectResearchAreas": "Information Retrieval",
     * "ResearchersInvolved": "Damaris Waema, George Okeyo, Petronilla Muriithi",
     * "Funded": true,
     * "Funder_ID": 1,
     * "Status": "Ongoing",
     * "LinkToPublication": "http://www.jkuat.ac.ke",
     * "Access_Level": "public",
     * "projectStart": "2020-11-21",
     * "projectEnd": "2020-11-21",
     * "abstractDocumentPath": null,
     * "otherProjectDocsPath": null,
     * "RelevantProjectDocuments": null
     * },
     * ],
     * "first_page_url": "http://localhost:8000/api/project?page=1",
     * "from": 1,
     * "last_page": 50,
     * "last_page_url": "http://localhost:8000/api/project?page=50",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/project?page=1",
     * "label": 1,
     * "active": true
     * },
     * {
     * "url": "http://localhost:8000/api/project?page=2",
     * "label": 2,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/project?page=3",
     * "label": 3,
     * "active": false
     * },
     * {
     * "url": null,
     * "label": "...",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/project?page=49",
     * "label": 49,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/project?page=50",
     * "label": 50,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/project?page=2",
     * "label": "Next &raquo;",
     * "active": false
     * }
     * ],
     * "next_page_url": "http://localhost:8000/api/project?page=2",
     * "path": "http://localhost:8000/api/project",
     * "per_page": "2",
     * "prev_page_url": null,
     * "to": 2,
     * "total": 100
     * },
     * "message": "Projects retrieved successfully"
     * }
     */
    public function index(Request $request)
    {
        $perPage = $request->has('perPage') ? $request->perPage : 10;
        $projects=Project::with(['researcher','researcher.user','researcher.department','researcher.department.researchinstitution'])->paginate($perPage);
        if ($request->has('search')) {
            $query = $request->search;
        }

        if ($request->has('recent')) {
            $projects = Project::with(['researcher','researcher.user','researcher.department','researcher.department.researchinstitution'])->orderBy('created_at','desc')->take($request->has('limit') ? $request->limit : 10)->get();
        }

        return $this->sendResponse($projects, 'Projects retrieved successfully');
    }

    public function store(CreateProjectAPIRequest $request)
    {
        $input = $request->all();

        $project = $this->projectRepository->create($input);

        return $this->sendResponse($project->toArray(), 'Project saved successfully');
    }

    /**
     * Show Project Details
     *
     * This endpoint returns the details of the specified project by id.
     * @authenticated
     *
     * @response scenario=success {
     *{
     * "success": true,
     * "data": {
     * "created_at": null,
     * "updated_at": null,
     * "ProjectTitle": "A multi-level text clustering algorithm for retrieval of academic research data",
     * "Project_ID": 1,
     * "ProjectAbstract": "Lack of or limited access to research data is one of the major challenges facing the academic researchers in Kenyan institutions of higher learning, as well as its research institutes. This \r\nleads to duplication of research, less opportunities for networking, and also contributes to scientific \r\nfraud. Efforts need to be made in order to make academic research data available and accessible\r\n. ",
     * "Researcher_ID": 1,
     * "User_ID": 2,
     * "ProjectResearchAreas": "Information Retrieval",
     * "ResearchersInvolved": "Damaris Waema, George Okeyo, Petronilla Muriithi",
     * "Funded": true,
     * "Funder_ID": 1,
     * "Status": "Ongoing",
     * "LinkToPublication": "http://www.jkuat.ac.ke",
     * "Access_Level": "public",
     * "projectStart": "2020-11-21",
     * "projectEnd": "2020-11-21",
     * "abstractDocumentPath": null,
     * "otherProjectDocsPath": null,
     * "RelevantProjectDocuments": null
     * },
     * "message": "Project retrieved successfully"
     * }
     * }
     *
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

    /**
     * Request Private Research Project
     *
     * This endpoint lets a user request access to a private project.
     * @authenticated
     *
     * @urlParam id integer required The id of the project
     *
     * @response status=200 {
     *
     * }
     *
     * @response status=400  {
     *
     * }
     * @param $id
     * @param  Request  $request
     * @return
     */
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

    /**
     * Grant access to a private project
     *
     * This endpoint lets a user(owner) grant access to a private project.
     * @authenticated
     *
     * @urlParam id integer required The id of the project
     *
     * @response status=200 {
     *
     * }
     *
     * @response status=400  {
     *
     * }
     * @param $id
     * @param  Request  $request
     * @return
     */
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
