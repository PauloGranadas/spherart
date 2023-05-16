<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function showCollaborators()
    {
        $users = User::all();
        return view('users.collaborators', ['users' => $users]);
    }

    public function userRegistration()
    {
        return view('users.register');
    }
}
