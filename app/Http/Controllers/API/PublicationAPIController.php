<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreatePublicationAPIRequest;
use App\Http\Requests\API\UpdatePublicationAPIRequest;
use App\Models\Publication;
use App\Repositories\PublicationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Class PublicationController
 * @package App\Http\Controllers\API
 */
class PublicationAPIController extends AppBaseController
{
    /** @var  PublicationRepository */
    private $publicationRepository;

    public function __construct(PublicationRepository $publicationRepo)
    {
        $this->publicationRepository = $publicationRepo;
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *      path="/publications",
     *      summary="Get a listing of the Publications.",
     *      tags={"Publication"},
     *      description="Get all Publications",
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
     *                  @SWG\Items(ref="#/definitions/Publication")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    /**
     * Search Publications with pagination
     *
     * This endpoint return an archive of the publications.
     * @authenticated
     *
     * @queryParam perPage Specify the entries to return in every page. If not specified, the default entries will be returned. Default: 10
     * @queryParam recent Specify this to show the most recent projects. If not specified, all entries will be returned with pagination. (Overrides 'perPage') Default: 10
     * @queryParam limit Specify the limit of entries to return. Must be used together with 'recent' If not specified, the default entries will be returned. Default: 10
     *
     * @response status=200 scenario="http://localhost:8000/api/publication?perPage=2" {
     * "success": true,
     * "data": {
     * "current_page": 1,
     * "data": [
     * {
     * "Publication_ID": 1,
     * "created_at": null,
     * "updated_at": null,
     * "UserID": 14,
     * "Researcher_ID": 13,
     * "PublicationTitle": "The Food Security Equation: What is the role of Gender and Social Amenities in this Paradigm? A\r\nFocus on rural households in Yala division, Siaya district, Kenya.",
     * "PublicationPath": null,
     * "DateOfPublication": "2014-12-08T00:00:00.000000Z",
     * "Collaborators": "Prof. Willis Oluoch-Kosura, Mr.Paswel Phiri Marenya",
     * "PublicationURL": "https://www.elsevier.com/en-xm",
     * "Access_Level": null
     * },
     * {
     * "Publication_ID": 2,
     * "created_at": null,
     * "updated_at": null,
     * "UserID": 15,
     * "Researcher_ID": 14,
     * "PublicationTitle": "FOOD SECURITY IN SEMI-ARID AREAS: AN ANALYSIS OF SOCIO-ECONOMIC AND INSTITUTIONAL FACTORS WITH REFERENCE TO MAKUENI DISTRICT, EASTERN KENYA.",
     * "PublicationPath": null,
     * "DateOfPublication": "2008-12-09T00:00:00.000000Z",
     * "Collaborators": "DR. DOROTHY N. MUTISYA, DR. FRED MUGIVANE, Prof. George Kirhoda,",
     * "PublicationURL": "https://www.elsevier.com/en-xm",
     * "Access_Level": null
     * }
     * ],
     * "first_page_url": "http://localhost:8000/api/publication?page=1",
     * "from": 1,
     * "last_page": 54,
     * "last_page_url": "http://localhost:8000/api/publication?page=54",
     * "links": [
     * {
     * "url": null,
     * "label": "&laquo; Previous",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=1",
     * "label": 1,
     * "active": true
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=2",
     * "label": 2,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=3",
     * "label": 3,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=4",
     * "label": 4,
     * "active": false
     * },
     * {
     * "url": null,
     * "label": "...",
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=53",
     * "label": 53,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=54",
     * "label": 54,
     * "active": false
     * },
     * {
     * "url": "http://localhost:8000/api/publication?page=2",
     * "label": "Next &raquo;",
     * "active": false
     * }
     * ],
     * "next_page_url": "http://localhost:8000/api/publication?page=2",
     * "path": "http://localhost:8000/api/publication",
     * "per_page": "2",
     * "prev_page_url": null,
     * "to": 2,
     * "total": 107
     * },
     * "message": "Publications retrieved successfully"
     * }
     *
     * @response status=200 scenario="http://localhost:8000/api/publication?recent&limit=2" {
     *"success": true,
     * "data": {
     * "0": {
     * "Publication_ID": 1,
     * "created_at": null,
     * "updated_at": null,
     * "UserID": 14,
     * "Researcher_ID": 13,
     * "PublicationTitle": "The Food Security Equation: What is the role of Gender and Social Amenities in this Paradigm? A\r\nFocus on rural households in Yala division, Siaya district, Kenya.",
     * "PublicationPath": null,
     * "DateOfPublication": "2014-12-08T00:00:00.000000Z",
     * "Collaborators": "Prof. Willis Oluoch-Kosura, Mr.Paswel Phiri Marenya",
     * "PublicationURL": "https://www.elsevier.com/en-xm",
     * "Access_Level": null
     * },
     * "39": {
     * "Publication_ID": 40,
     * "created_at": null,
     * "updated_at": null,
     * "UserID": 50,
     * "Researcher_ID": 49,
     * "PublicationTitle": "Corporate governance, accounting and finance: A review",
     * "PublicationPath": null,
     * "DateOfPublication": "2011-12-08T00:00:00.000000Z",
     * "Collaborators": "",
     * "PublicationURL": "https://www.elsevier.com/en-xm",
     * "Access_Level": null
     * }
     * },
     * "message": "Publications retrieved successfully"
     * }
     */
    public function index(Request $request)
    {
        $publications = collect([]);
//        if ($request->has('view')) {
//            if ($request->view === Publication::VIEW_SUMMARY) {
//                $summary = $this->publicationRepository->summary();
//                $publications = PublicationResource::collection($publications)->additional(
//                    [
//                        'meta' => [
//                            'summary' => $summary,
//                        ]
//                    ]);
//                return $publications->response();
//            }
//        }
        $perPage = $request->has('perPage') ? $request->perPage : 10;
        $publications = Publication::paginate($perPage);
        if ($request->has('search')) {
            $query = $request->search;
        }

        if ($request->has('recent')) {
            $publications = Publication::all()->sortBy('created_at')->take($request->has('limit') ? $request->limit : 10);
        }

        return $this->sendResponse($publications, 'Publications retrieved successfully');
    }

    /**
     * @param  CreatePublicationAPIRequest  $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/publications",
     *      summary="Store a newly created Publication in storage",
     *      tags={"Publication"},
     *      description="Store Publication",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Publication that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Publication")
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
     *                  ref="#/definitions/Publication"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePublicationAPIRequest $request)
    {
        $input = $request->all();

        $publication = $this->publicationRepository->create($input);

        return $this->sendResponse($publication->toArray(), 'Publication saved successfully');
    }

    /**
     * @param  int  $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/publications/{id}",
     *      summary="Display the specified Publication",
     *      tags={"Publication"},
     *      description="Get Publication",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Publication",
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
     *                  ref="#/definitions/Publication"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */

    /**
     * Show Publication Details
     *
     * This endpoint returns the details of the specified publication by id.
     * @authenticated
     *
     * @response scenario=success {
     *{
     * "success": true,
     * "data": {
     * "Publication_ID": 1,
     * "created_at": null,
     * "updated_at": null,
     * "UserID": 14,
     * "Researcher_ID": 13,
     * "PublicationTitle": "The Food Security Equation: What is the role of Gender and Social Amenities in this Paradigm? A\r\nFocus on rural households in Yala division, Siaya district, Kenya.",
     * "PublicationPath": null,
     * "DateOfPublication": "2014-12-08T00:00:00.000000Z",
     * "Collaborators": "Prof. Willis Oluoch-Kosura, Mr.Paswel Phiri Marenya",
     * "PublicationURL": "https://www.elsevier.com/en-xm",
     * "Access_Level": null
     * },
     * "message": "Publication retrieved successfully"
     * }
     * }
     *
     */
    public function show($id)
    {
        /** @var Publication $publication */
        $publication = $this->publicationRepository->find($id);

        if (empty($publication)) {
            return $this->sendError('Publication not found');
        }

        return $this->sendResponse($publication->toArray(), 'Publication retrieved successfully');
    }

    /**
     * @param  int  $id
     * @param  UpdatePublicationAPIRequest  $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/publications/{id}",
     *      summary="Update the specified Publication in storage",
     *      tags={"Publication"},
     *      description="Update Publication",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Publication",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Publication that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Publication")
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
     *                  ref="#/definitions/Publication"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePublicationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Publication $publication */
        $publication = $this->publicationRepository->find($id);

        if (empty($publication)) {
            return $this->sendError('Publication not found');
        }

        $publication = $this->publicationRepository->update($input, $id);

        return $this->sendResponse($publication->toArray(), 'Publication updated successfully');
    }

    /**
     * @param  int  $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/publications/{id}",
     *      summary="Remove the specified Publication from storage",
     *      tags={"Publication"},
     *      description="Delete Publication",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Publication",
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
        /** @var Publication $publication */
        $publication = $this->publicationRepository->find($id);

        if (empty($publication)) {
            return $this->sendError('Publication not found');
        }

        $publication->delete();

        return $this->sendSuccess('Publication deleted successfully');
    }

    public function requestAccess($id, Request $request)
    {
        $publication_id = $id;
        $user = $request->user();
        if ($user->id !== Publication::find($publication_id)->user()->id) {
            $access_request = new \App\Models\Request;
            $access_request->ResearchOwner_ID = Publication::find($publication_id)->researcher()->id;
            $access_request->RequestedAccess = 0;
            $access_request->Publications_ID = $publication_id;
            $access_request->User_ID = $user->id;
            $access_request->RequestMessage = $request->has('message') ? $request->message : '';
            $access_request->save();
            return $this->sendSuccess('Access Request was successful');
            //todo: send email to project owner
        } else {
            return $this->sendError('You cannot request access to your publication', 403);
        }
    }

    public function grantAccess($id, Request $request)
    {
        $request_id = $id;
        $user = $request->user();
        $access_request = \App\Models\Request::find($request_id);
        if ($user->id === Publication::find($access_request->Publications_ID)->user()->id) {
            $access_request->RequestedAccess = 1;
            $access_request->RequestReply = $request->has('message') ? $request->message : '';
            $access_request->save();
            return $this->sendSuccess('Access Request was successful');
            //todo: send email to access requester
        } else {
            return $this->sendError('You do not have such rights to this publication', 403);
        }
    }
}
