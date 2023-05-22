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
        //$users = User::all();
        $users = User::with('categories')->get();
        return view('users.collaborators', ['users' => $users]);
    }
    public function aboutUs()
    {
        return view('users.about');
    }

    function show(User $user)
    {
        return view('users.show', ['user' => $user, 'projects' => $user->projects]);
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

    // Show Registration New User
    public function create()
    {
        //return view('users.register');
        $categories = Category::all();
        return view('users.register')->with('categories', $categories);
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
            /* 'g-recaptcha-response' => 'required|recaptcha', */
        ]);



        //store avatar image file
        if ($request->hasFile('avatar')) {
            $formFields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        // hash the password using the bcrypt()
        $formFields['password'] = bcrypt($formFields['password']);

        $validateCategories = $request->validate([
            'categories' => 'required|array|min:1',
        ]);


        //create the user
        $user = User::create($formFields);
        $idUser = $user->id;

        //Store Checkboxes Categories        
        $checkboxValues = $request->input('categories');
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
    //Show Edit Form
    public function edit(User $user)
    {
        $categories = Category::all();
        return view('users.edit', ['user' => $user, 'categories' => $categories]);
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must use a valid email address',
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha'
        ];
    }
}//end of class
