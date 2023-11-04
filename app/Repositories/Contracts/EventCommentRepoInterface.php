<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface EventCommentRepoInterface
{
    public function totalNumberOfComments(int $id, int $status);
    
    public function addCommentForEvent(Request $request);

    public function getLatestComment();

    public function getCommentsForEvent(int $id);

    public function getTotalComments();

    public function activateComment(int $commentId);

    public function deActivateComment(int $commentId);

    public function deleteComment(int $commentId);
}