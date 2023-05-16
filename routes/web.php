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
//Show Collaborators List
Route::get('/collaborators', [UserController::class, 'showCollaborators']);

//Store User Data
Route::post('/users', [UserController::class, 'store']);

//Show Register Form
Route::get('/register', [UserController::class, 'userRegistration']);
