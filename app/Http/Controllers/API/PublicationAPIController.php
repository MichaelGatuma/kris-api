<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreatePublicationAPIRequest;
use App\Http\Requests\API\UpdatePublicationAPIRequest;
use App\Http\Resources\PublicationCollection;
use App\Http\Resources\PublicationResource;
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
    public function index(Request $request)
    {
        $publications = collect([]);
        if ($request->has('view')) {
            if ($request->view === Publication::VIEW_SUMMARY) {
                $summary = $this->publicationRepository->summary();
                $publications = PublicationResource::collection($publications)->additional(
                    [
                        'meta' => [
                            'summary' => $summary,
                        ]
                    ]);
                return $publications->response();
            }
        }

        $publications = new PublicationCollection($this->publicationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        ));
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
}
