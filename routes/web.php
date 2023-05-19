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

//Show About Us Page
Route::get('/about', [UserController::class, 'aboutUs']);

// Show Projects page
Route::get('/projects', [ProjectController::class, 'index']);

// Show Project Detail page
Route::get('/projects/{project}', [ProjectController::class, 'show']);

// Show Create Project Page Form
Route::get('/projects/register', [ProjectController::class, 'create'])->name('projects.create');

//Create New Project
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');
