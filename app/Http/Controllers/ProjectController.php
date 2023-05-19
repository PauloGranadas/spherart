<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function index()
    {
        $projects = Project::with('user')->get();
        return view('projects.projects', ['projects' => $projects]);
    }
}
