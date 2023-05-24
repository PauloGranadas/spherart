<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;



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
Route::post('/useradd', [UserController::class, 'store']);
//Logout user
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
//Login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//Show Edit User
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
//Update User
Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');

//contact us
Route::get('/contact', [ContactController::class, 'contactUs'])->name('contactUs');
//contact form
Route::post('/contactForm', [ContactController::class, 'sendContactForm'])->name('sendContactForm');

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

//to delete collaborator from the project
Route::delete('/projects/Collaborators/delete/{collaborator}', [ProjectController::class, 'delete'])->name('collaborator.delete');

//to delete project from the projects of the user's page
Route::delete('/projects/delete/{project}', [ProjectController::class, 'deleteProject'])->name('project.delete');

// Show Create Project Page Form
//Route::get('/projects/register', [ProjectController::class, 'create']);

//Create New Project
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');

// Show Create Project Page Form
Route::get('/project/create', [ProjectController::class, 'create']);

//Show Edit Project
/* Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit')->middleware('auth'); */
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
//Update Project
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

//to delete collaborator from the project
Route::delete('/projects/Collaborators/delete/{collaborator}', [ProjectController::class, 'delete'])->name('collaborator.delete');

//to delete project from the projects of the user's page
Route::delete('/projects/delete/{project}', [ProjectController::class, 'deleteProject'])->name('project.delete');

// search collaborator for the project
//Route::get('/', [ProjectController::class, 'createCollaborator'])->name('collaborators.search');




