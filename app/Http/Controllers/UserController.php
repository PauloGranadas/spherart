<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Rule;

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
    //Store new User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'nickname' => ['required', Rule::unique('users', 'nickname')],
            'country' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'bio' => 'required',
        ]);
    }
}
