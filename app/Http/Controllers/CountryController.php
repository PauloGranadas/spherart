<?php

namespace App\Http\Controllers;

use Webpatser\Countries\Countries;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Countries::all();

        return view('country.index', ['countries' => $countries]);
    }
}
