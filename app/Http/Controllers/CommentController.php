<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveComment(Request $request)
    {

        $projectId = $request->projectId;
        $userComment = $request->comment;
        $project = Project::find($projectId);
        $comment = new Comment();
        $user = Auth::user();
        $comment->body = $userComment;
        $comment->user_id = $user->id;
        $comment->project_id = $projectId;
        $comment->save();

        $userName = auth()->user()->name;
        $userImage = auth()->user()->profile_photo_url;
        $commentDate = Carbon::now()->diffForHumans();
        $commentId = $comment->id;

        return response()->json(['userName' => $userName, 'commentDate' => $commentDate, 'userImage' => $userImage, 'commentId' => $commentId]);
    }

    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->first();

        $comment->delete();

        return back()->with('success', 'تم حذف التعليق بنجاح');
    }

    public function edit($id)
    {
        $comment = Comment::where('id', $id)->first();
        return view('edit-comment', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = Comment::where('id', $id)->first();
        $projectId = $comment->project_id;

        $comment->body = $request->comment;

        $comment->save();


        return redirect('pro/' . $projectId);
    }
}