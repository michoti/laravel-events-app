<?php

namespace App\Http\Controllers;

use App\Repositories\Concretes\EventCommentRepo;
use Illuminate\Http\Request;

class EventscommentController extends Controller
{
     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, EventCommentRepo $eventComment)
    {
        try {
            $eventComment->addCommentForEvent($request);
        } catch (\Exception $e) {
            // if($request->expectsJson()) {
            //     return response(['error' => $e]);
            // };
            return back()->with('error', 'Something went wrong');
        }

        if($request->expectsJson()) {
            return response(['status' => 'okay'], 201);
        };

        return back()->with('success', 'Comment submitted, would be active after being reviewed, thank you.');
    }
}
