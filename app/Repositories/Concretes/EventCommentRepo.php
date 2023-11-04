<?php

namespace App\Repositories\Concretes;

use App\Models\Event;
use App\Models\EventComment;
use Illuminate\Http\Request;
use App\Repositories\Contracts\EventCommentRepoInterface;


class EventCommentRepo implements EventCommentRepoInterface
{
    public function totalNumberOfComments(int $id, int $status)
    {
        return EventComment::where([
            ['event_id', '=', $id],
            ['status', '=', $status]
        ])->count();
    }

    public function addCommentForEvent(Request $request)
    {
        dd(Event::find(decrypt($request->event_id))->eventscomment());
        Event::find(decrypt($request->event_id))->eventscomment()
            ->create($request->except('event_id'));
    }

    public function getLatestComment()
    {
        return EventComment::latest()->first();
    }

    public function getCommentsForEvent(int $id)
    {
        return EventComment::where('event_id', '=', $id)->get();
    }

    public function getTotalComments()
    {
        return EventComment::count();
    }

    public function activateComment(int $commentId)
    {
        return EventComment::where('id', '=', $commentId)
            ->update([
                'status' => 1
            ]);
    }

    public function deActivateComment(int $commentId)
    {
        return EventComment::where('id', '=', $commentId)
            ->update([
                'status' => 0
            ]);
    }

    public function deleteComment($commentId)
    {
        return EventComment::destroy($commentId);
    }
}