<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    function index(Request $request)
    {
        // if the user is authenticated the value par default is user, if is not is all
        $defautValue = 'all'; 
        if (Auth::check()) 
            $defautValue = 'user'; 
        

        // take the value of the input selection filter. 
        //But in case of not request assume for default 
        $filter = $request->input('filter', $defautValue);
        $creator_id = Auth::id();

        if ($filter==='all') {
            $projects = Project::with('user')->get();
        }elseif ($filter==='user') {
            // filter by the user id in where condition
            $projects = Project::with('user')->where('creator_id', $creator_id)->get();
        }else{
            $projects = Project::with('user')->get();
        }

        return view('projects.projects', ['projects' => $projects]);
    }


    function show(Project $project){        
        return view('projects.show', ['project'=>$project]);
    }

    public function create()
    {   
        $categories = Category::all();     
        return view('projects.register')->with('categories',$categories);
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
        
        
        $validateCategories = $request->validate([
            'categories' => 'required|array|min:1',
        ]);

        //create project
        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->cover = $imagePath;
        $project->creator_id = Auth::id();
        $project->status = 'upcoming';
        $project->save();  
        
        // take the id from the last project inserted
        $idProject = $project->id;

        //Store Checkboxes Categories        
        $categories = $request->input('categories');
        // take each one of id category and insert each one in db with id of last project created
        foreach ($categories as $category) {
            $projectCategory = new ProjectCategory();
            $projectCategory->category_id = $category;
            $projectCategory->project_id = $idProject;
            $projectCategory->save();
        }            

        return redirect('/projects')->with('message', 'Project created successfully and logged in');       

    }
}
