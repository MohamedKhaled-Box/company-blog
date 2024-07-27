<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index');
    }

    public function getProjectsDatatable()
    {
        $data = Project::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($row) {
                return $row->title;
            })
            ->addColumn('description', function ($row) {
                return Str::finish(Str::limit($row->description, 65), '...'); // limit to 65 characters and add an ellipsis
            })
            ->addColumn('action', function ($row) {

                $dropdown = '<div class="inline-flex">
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="' . Route('projects.edit', $row->id) . '">
<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
</svg>
</a>';

                $dropdown .= '
                            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="' . Route('projects.show', $row->id) . '">
<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
<path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
<path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg>
</a>';

                $dropdown .= '

                                <form method="POST" action="' . route('projects.destroy', $row->id) . '">
                                    ' . method_field('DELETE') . csrf_field() . '
                                    <button type="submit" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="return confirm(\'Are you sure?\')">
<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
</svg>

                                    </button>
                                </form>
                            ';

                $dropdown .= '
                    </div>';

                return $dropdown;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $user = Auth::user();
        $project = new Project;
        $project->user_id = $user->id;
        $project->title = $request->title;
        $project->description = $request->description;

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $name = time() . '.' . $picture->getClientOriginalExtension();
            $destinationPath = public_path('/pictures');
            $picture->move($destinationPath, $name);
            $project->picture = $name;
        }

        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $project->title = $request->title;
        $project->description = $request->description;

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $name = time() . '.' . $picture->getClientOriginalExtension();
            $destinationPath = public_path('/pictures');
            $picture->move($destinationPath, $name);
            $project->picture = $name;
        }
        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }
}