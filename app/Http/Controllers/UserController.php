<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ArtistCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


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
       
        $userCategories = $user->categories->pluck('id')->toArray();  
        $categories = Category::all();
        
        return view('users.edit', ['user' => $user, 'categories' => $categories, 'userCategories'=>$userCategories]);
    }
    // update User information
    public function update(Request $request, User $user)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],

            'nikname' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            // Other validation rules...
            'bio' => 'required|min:50',
            'country' => ['required', 'min:3'],
            'locality' => 'required',
        ]);



        // Update user attributes
        $user->firstname = $validatedData['firstname'];
        $user->lastname = $validatedData['lastname'];

        if ($request->input('email') !== $user->email) {
            $user->email = $validatedData['email'];
        }
        if ($request->input('nikname') !== $user->nikname) {
            // Nikname has changed, perform additional checks or actions if needed
            $user->nikname = $validatedData['nikname'];
        }
        $user->bio = $validatedData['bio'];
        $user->locality = $validatedData['locality'];
        $user->country = $validatedData['country'];
        // Update other user attributes...

        // Check if a new password is provided
        if ($request->filled('password')) {
            // Hash the new password
            $user->password = Hash::make($request->input('password'));
        }

        // Save the updated user in the database
        $user->save();

        // Redirect or perform any other necessary actions
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
