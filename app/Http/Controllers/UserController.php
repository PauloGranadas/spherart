<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Display colaborators
    function showCollaborators()
    {
        $users = User::all();
        return view('users.collaborators', ['users' => $users]);
    }

    function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }
    // Registration New User
    public function create()
    {
        return view('users.register');
    }
    //Store New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'nikname' => ['required', Rule::unique('users', 'nikname')],
            'country' => ['required', 'min:3'],
            'locality' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6',
            'bio' => 'required|min:50',
        ]);
        //store avatar image file
        if ($request->hasFile('avatar')) {
            $formFields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        // hash the password using the bcrypt()
        $formFields['password'] = bcrypt($formFields['password']);
        //create the user
        $user = User::create($formFields);
        //Login
        // using the auth() helper
        auth()->login($user);


        return redirect('/')->with('message', 'User created successfully and logged in');
    }
}//end of class
