<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/register', [UserController::class, 'create']);
//Create New User
Route::post('/users', [UserController::class, 'store']);
//Logout user
Route::post('/logout', [UserController::class, 'logout'])/* ->middleware('auth') */;
//Show Login Form
Route::get('/login', [UserController::class, 'login'])/* ->name('login')->middleware('guest') */;
//Login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Show About Us Page
Route::get('/about', [UserController::class, 'aboutUs']);
