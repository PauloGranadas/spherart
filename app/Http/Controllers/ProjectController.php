<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    function index()
    {
        $projects = Project::with('user')->get();
        return view('projects.projects', ['projects' => $projects]);
    }

    function show(Project $project){        
        return view('projects.show', ['project'=>$project]);
    }

    public function create()
    {           
        return view('projects.register');
    }

    public function store(Request $request){

        $formFields = $request->validate([
            'name' => ['required', 'min:5'],            
            'description' => 'required|min:50',
        ]);

        //store cover image file
        if ($request->hasFile('cover')) {
            $imagePath = $request->file('cover')->store('projects', 'public');
        }      

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->cover = $imagePath;
        $project->creator_id = Auth::id();
        $project->status = 'upcoming';
        $project->save();       

        return redirect('/projects')->with('message', 'Project created successfully and logged in');       

    }
}
