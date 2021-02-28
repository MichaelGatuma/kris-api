<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUpcomingEventAPIRequest;
use App\Http\Requests\API\UpdateUpcomingEventAPIRequest;
use App\Models\UpcomingEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UpcomingEventResource;

/**
 * Class UpcomingEventController
 * @package App\Http\Controllers\API
 */

class UpcomingEventAPIController extends AppBaseController
{
    /**
     * @group Upcoming Events Endpoints
     *
     * Display a listing of the UpcomingEvent.
     * @unauthenticated
     *
     * @queryParam skip integer Skip the first specified number of entries
     * @queryParam limit integer Limit the response to the specified number of entries
     *
     * @param Request $request
     * @return Response
     *
     *
     */
    public function index(Request $request)
    {
        $query = UpcomingEvent::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $upcomingEvents = $query->get();

        return $this->sendResponse(UpcomingEventResource::collection($upcomingEvents), 'Upcoming Events retrieved successfully');
    }

    /**
     * Store a newly created UpcomingEvent in storage.
     * POST /upcomingEvents
     *
     * @param CreateUpcomingEventAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUpcomingEventAPIRequest $request)
    {
        $input = $request->all();

        /** @var UpcomingEvent $upcomingEvent */
        $upcomingEvent = UpcomingEvent::create($input);

        return $this->sendResponse(new UpcomingEventResource($upcomingEvent), 'Upcoming Event saved successfully');
    }

    /**
     * @group Researcher Endpoints
     *
     * Display the specified Upcoming Event.
     * @unauthenticated
     *
     * @urlParam id integer required The id of the specified Upcoming Event
     *
     * GET|HEAD /upcomingEvents/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UpcomingEvent $upcomingEvent */
        $upcomingEvent = UpcomingEvent::find($id);

        if (empty($upcomingEvent)) {
            return $this->sendError('Upcoming Event not found');
        }

        return $this->sendResponse(new UpcomingEventResource($upcomingEvent), 'Upcoming Event retrieved successfully');
    }

    /**
     * Update the specified UpcomingEvent in storage.
     * PUT/PATCH /upcomingEvents/{id}
     *
     * @param int $id
     * @param UpdateUpcomingEventAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUpcomingEventAPIRequest $request)
    {
        /** @var UpcomingEvent $upcomingEvent */
        $upcomingEvent = UpcomingEvent::find($id);

        if (empty($upcomingEvent)) {
            return $this->sendError('Upcoming Event not found');
        }

        $upcomingEvent->fill($request->all());
        $upcomingEvent->save();

        return $this->sendResponse(new UpcomingEventResource($upcomingEvent), 'UpcomingEvent updated successfully');
    }

    /**
     * Remove the specified UpcomingEvent from storage.
     * DELETE /upcomingEvents/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UpcomingEvent $upcomingEvent */
        $upcomingEvent = UpcomingEvent::find($id);

        if (empty($upcomingEvent)) {
            return $this->sendError('Upcoming Event not found');
        }

        $upcomingEvent->delete();

        return $this->sendSuccess('Upcoming Event deleted successfully');
    }
}
