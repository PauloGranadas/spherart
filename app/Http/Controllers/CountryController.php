<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v2/all');
        $countries = json_decode($response->getBody(), true);

        return response()->json($countries);
    }
    public function getCountries()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v2/all');
        $countries = json_decode($response->getBody(), true);

        return $countries;
    }
}
