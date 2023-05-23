<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contactUs()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        //Mail::to('reyhan.baykara@gmail.com')->send(new ContactFormMail($data));
    return redirect('/');
        //return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you soon!');
    }
}
