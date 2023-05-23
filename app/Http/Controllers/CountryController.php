<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CountryController extends Controller
{

    public function index()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = collect(json_decode($response->getBody(), true))
            ->mapWithKeys(function ($country) {
                return [$country['cca2'] => $country['name']['common']];
            });

        return view('country.index', compact('countries'));
    }
}
