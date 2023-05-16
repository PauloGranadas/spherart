<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function showCollaborators()
    {
        $users = User::all();
        return view('users.collaborators', ['users' => $users]);
    }

    function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    //Store New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'nickname' => ['required', Rule::unique('users', 'nickname')],
            'country' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6',
            'bio' => 'bio|min:50',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully');
    }
}
