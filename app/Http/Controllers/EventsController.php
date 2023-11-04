<?php

namespace App\Http\Controllers;

use App\Helper\returnIdFromRequestSegment;
use App\Repositories\Concretes\EventRepo;
use App\Repositories\Concretes\TicketRepo;
use Illuminate\Http\Request;

use App\Services\RedisService;
use Inertia\Inertia;

class EventsController extends Controller
{
    use returnIdFromRequestSegment;
    protected $eventRepo;
    protected $ticketRepo;
    public function __construct(EventRepo $eventRepo, TicketRepo $ticketRepo)
    {
        // $this->middleware('auth')->only('show');
        $this->eventRepo = $eventRepo;
        $this->ticketRepo = $ticketRepo;
    }

    
    public function index()
    {
        $noofevents = $this->eventRepo->getAllEvents();
		$events = $this->eventRepo->getPaginatedActiveEventsWithTickets(8);

        return Inertia::render('Events/Events',[
            'noofevents' => $noofevents,
            'events' => $events,
        ]);
        // return $events;
    }

    /**
     * @param Request $request
     * @param RedisService $redisService
     * @param $id
     */
    public function show(Request $request, RedisService $redisService, $id)
    {
        $redisService->storeEventPageViews($request, $id);

        $id = $this->returnIdFromRequestSegment();
        $noOfTickets = $this->ticketRepo->totalTicketsForEvent($id);
        // $noComments = EventCommentRepoInterface::totalNumberOfComments($id, 1);
		$eventDetails = $this->eventRepo->getEvent($id);

        return Inertia::render('Events/SingleEvent', [
            'noOfTickets' => $noOfTickets,
            'eventDetails' => $eventDetails,
        ]);
        // return $eventDetails;
    }
}
