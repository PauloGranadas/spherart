<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ArtistCategory;
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
        foreach ($checkboxValues as $category) {
            $artistCategory = new ArtistCategory();
            $artistCategory->category_id = $category;
            $artistCategory->user_id = $idUser;
            $artistCategory->save();
        }
        //Login
        // using the auth() helper
        auth()->login($user);


        return redirect('/')->with('message', 'User created successfully and logged in');
    }
    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have benn logged out');
    }
    //Login User
    public function login()
    {
        return view('users.login');
    }
    //Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
            // | = or
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}//end of class
