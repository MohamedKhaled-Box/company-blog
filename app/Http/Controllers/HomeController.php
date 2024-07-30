<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function project()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(4);
        return view('guest.projects', compact('projects'));
    }
    public function projectsShow($id)
    {
        $project = Project::find($id);
        $countLike = Like::where('project_id', $project->id)->where('like', '1')->count();
        $countDislike = Like::where('project_id', $project->id)->where('like', '0')->count();

        $user = Auth::user();
        if (Auth::check()) {
            $userLike = $user->likes()->where('project_id', $project->id)->first();
        } else {
            $userLike = 0;
        }
        $comments = $project->comments->sortByDesc('created_at');
        return view('guest.show', compact('project', 'countLike', 'countDislike', 'userLike', 'comments'));
    }
    public function home()
    {
        return view('guest.home');
    }
    public function about()
    {
        return view('guest.about');
    }
    public function contactus()
    {
        return view('guest.contactus');
    }
    public function edit()
    {
        return view('guest.profile');
    }
}
