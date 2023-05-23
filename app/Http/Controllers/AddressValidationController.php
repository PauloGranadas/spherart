<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AddressValidationController extends Controller
{
    public function validateAddress(Request $request)
    {
        // Replace with your API credentials
        $apiKey = "YOUR_API_KEY";

        // Retrieve the form inputs
        $country = $request->input('country');
        $location = $request->input('location');

        // Create a new Guzzle client
        $client = new Client();

        // Make the API request
        $url = "https://api.example.com/validate";
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'country' => $country,
                'location' => $location,
            ],
        ]);

        // Check if the request was successful (status code 200)
        if ($response->getStatusCode() == 200) {
            // Parse the JSON response
            $validationResult = json_decode($response->getBody(), true);

            // Check the validation result
            if ($validationResult['valid']) {
                // Address is valid
                return response()->json(['message' => 'Address is valid']);
            } else {
                // Address is invalid
                return response()->json(['message' => 'Address is invalid']);
            }
        } else {
            // Handle the error response
            return response()->json(['error' => 'Failed to validate address'], 500);
        }
    }
}
