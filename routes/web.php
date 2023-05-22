<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// pages list
Route::get('/collaborators', [UserController::class, 'showCollaborators']);

// page detail collaborators
Route::get('/collaborators/{user}', [UserController::class, 'show']);
/* -----------USER SECCTION----------- */
//Show Register/Create User Form
Route::get('/register', [UserController::class, 'create'])->name('login')->middleware('guest');
//Create New User
Route::post('/users', [UserController::class, 'store']);
//Logout user
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
//Login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//Show Edit User
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
//Update User
Route::post('/users', [UserController::class, 'update']);



//Show About Us Page
Route::get('/about', [UserController::class, 'aboutUs']);

// Show Projects page
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Show Project Detail page
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project.show');

// Show to Add Collaborator Page for a Project selected
Route::get('/projects/{project}/add', [ProjectController::class, 'createCollaborator'])->name('project.collaborator.create')->middleware('auth');

// Store Add Collaborator a Project selected
Route::post('/projects/{project}/add/{collaborator}', [ProjectController::class, 'storeCollaborator'])->name('projects.collaborators.store');

// Show Create Project Page Form
//Route::get('/projects/register', [ProjectController::class, 'create']);

//Create New Project
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');

// Show Create Project Page Form
Route::get('/project/create', [ProjectController::class, 'create']);
