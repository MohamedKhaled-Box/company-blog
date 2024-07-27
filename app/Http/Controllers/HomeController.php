<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
        return view('guest.show', compact('project'));
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
}