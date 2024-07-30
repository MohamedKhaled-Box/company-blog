<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function LikeProject(Request $request)
    {
        $projectId = $request->projectId;
        $isLike = $request->isLike === 'true';
        $update = false;


        $Project = Project::find($projectId);
        if (!$Project) {
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()->where('Project_id', $projectId)->first();
        if ($like) {
            $alreadyLike = $like->like;
            $update = true;
            if ($alreadyLike == $isLike) {
                $like->delete();
            }
        } else {
            $like = new Like();
        }

        $like->like = $isLike;
        $like->user_id = $user->id;
        $like->Project_id = $Project->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        $countLike = Like::where('Project_id', $Project->id)->where('like', '1')->count();
        $countDislike = Like::where('Project_id', $Project->id)->where('like', '0')->count();

        return response()->json(['countLike' => $countLike, 'countDislike' => $countDislike,]);
    }
}
