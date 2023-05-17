<?php

namespace App\Http\Controllers;

use App\Models\ArtistCategory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //Display colaborators
    function showCollaborators()
    {
        $users = User::all();
        return view('users.collaborators', ['users' => $users]);
    }
    public function aboutUs()
    {
        return view('users.about');
    }

    function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }
    // Show Registration New User
    public function create()
    {
        //return view('users.register');
        $checkboxCategories = Category::all();
        return view('users.register')->with('checkboxCategories', $checkboxCategories);
    }
    //Create New User
    public function store(Request $request)
    {
        //dd($request);
        $formFields = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'nikname' => ['required', Rule::unique('users', 'nikname')],
            'country' => ['required', 'min:3'],
            'locality' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
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
        $idUser = $user->id;

        //Store Checkboxes Categories
        $checkboxValues = $request->input('checkboxes');
        $checkboxString = implode(',', $checkboxValues);

        $artistCategory = new ArtistCategory();
        $artistCategory->category_id = $checkboxString;
        $artistCategory->user_id = $idUser;
        $artistCategory->save();

        //Login
        // using the auth() helper
        auth()->login($user);


        return redirect('/')->with('message', 'User created successfully and logged in');
    }
}//end of class
