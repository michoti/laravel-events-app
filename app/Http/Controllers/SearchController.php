<?php

namespace App\Http\Controllers;

use App\Repositories\Concretes\EventRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class SearchController extends Controller
{
    protected $eventRepo;

    /**
     * SearchController constructor.
     * @param EventRepo $eventRepo
     */
    public function __construct(EventRepo $eventRepo)
    {
        $this->eventRepo = $eventRepo;
    }

    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        if ($request->has('q') && is_string($request->query('q'))) {
            $request->flashOnly('q');
            try{
                $events = $this->eventRepo->searchEvent($request->q, 6);
            } catch(\Exception $e) {
                Log::error($e->getMessage());
                return back()->with('error', 'Error connecting to Algolia Server');
            }
            
        } else {
            $events = [];
        }
        return Inertia::render('Events/Events', ['events' => $events]);
    }
}
