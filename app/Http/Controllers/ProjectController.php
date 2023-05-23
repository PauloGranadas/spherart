<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectCategory;
use App\Models\ProjectMember;
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

        if ($filter === 'all') {
            $projects = Project::with('user')->get();
        } elseif ($filter === 'user') {
            // filter by the user id in where condition
            $projects = Project::with('user')->where('creator_id', $creator_id)->get();
        } else {
            $projects = Project::with('user')->get();
        }

        return view('projects.projects', ['projects' => $projects]);
    }


    function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }



    public function create()
    {
        $categories = Category::all();
        return view('projects.register')->with('categories', $categories);
    }

    public function store(Request $request)
    {

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
        if ($request->hasFile('cover')) {
            $project->cover = $imagePath;
        }
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

        // also the creator of the project is add like a member of that project like administrator
        $projectMember = new ProjectMember;
        $projectMember->user_id = Auth::id();
        $projectMember->project_id = $idProject;
        $projectMember->member_type = 'admin';
        $projectMember->status = 'accept';
        $projectMember->save();

        return redirect('/projects')->with('message', 'Project created successfully and logged in');
    }

    function createCollaborator(Project $project, Request $request)
    {
        // take all collaborator alredy associed to the project in one array
        $collaboratorsOfProject = $project->members->pluck('user_id')->toArray();
        //$collaborators = User::whereNotIN('id', $collaboratorsOfProject)->get();
        $searchTerm = $request->input('search');
        $collaborators = User::whereNotIN('id', $collaboratorsOfProject)
                                            ->when($searchTerm, function ($query) use ($searchTerm) {
                                                return $query->search($searchTerm);
                                            })
                                            ->latest()
                                            ->get();
        
                                        /*->latest()
                                        ->filter(request(['search']))->get();*/
        

        return view('projects.add', ['project' => $project, 'collaborators' => $collaborators]);
    }

    function storeCollaborator(Request $request, Project $project, User $collaborator)
    {

        //$collaborator->project_id = $project->id;

        // insert in the table 
        /*$project->members->attach($collaborator, [
            'member_type'=>'collaborator',
            'status'=>'pending'
        ]);*/

        //create project
        $projectMember = new ProjectMember;
        $projectMember->user_id = $collaborator->id;
        $projectMember->project_id = $project->id;
        $projectMember->member_type = 'collaborator';
        $projectMember->status = 'pending';
        $projectMember->save();

        return redirect()->route('project.show', $project)->with('message', 'Collaboration request demand sends successfully!');
    }

    //delete collaborator when click on the delete button inside the page of a project

    public function delete(ProjectMember $collaborator)
    {
        $collaborator->delete();

        return redirect()->route("project.show", $collaborator->project_id)->with('message', "Collaborator deleted successfully");
        // return response()->json(['message'=>'Collaborator deleted successfully']);
    }

    //delete project when clicked on the delete button inside the page of a collaborator

    public function deleteProject(Project $project)
    {
        $project->delete();

        return redirect()->route("projects.index", $project)->with('message', "Project deleted successfully");
    }

    //Show Edit Form

    public function edit(Project $project)
    {
        $categories = Category::all();
        $projectCategories = $project->categories->pluck('id')->toArray();
        return view('projects.edit', ['project' => $project, 'categories' => $categories, 'projectCategories' => $projectCategories]);
    }

    public function update(Request $request, Project $project)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'description' => 'required|min:50',
        ]);

        if ($request->hasFile('cover')) {
            $imagePath = $request->file('cover')->store('projects', 'public');
        }

        $validateCategories = $request->validate([
            'categories' => 'required|array|min:1',
        ]);

        $project->name = $request->name;
        $project->description = $request->description;

        if ($request->hasFile('cover')) {
            $project->cover = $imagePath;
        }

        $project->save();

        //$project->categories()->detach();
        $project->categories()->sync($request->input('categories'));

        //$categories = $request->input('categories');

       

        return redirect()->route('projects.index')->with('message', 'Project updated successfully');
    }
}
