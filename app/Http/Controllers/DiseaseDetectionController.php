<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiseaseDetectionController extends Controller
{
    public function detectCropDisease(Request $request)
    {
        // Validate and get the uploaded image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // You can adjust the validation rules as needed
        ]);

        $image = $request->file('image');  // Get the uploaded image

        // Prepare the request to Flask API
        $response = Http::attach('image', file_get_contents($image), $image->getClientOriginalName())
            ->post('http://localhost:5000/api/detect-crop');

        // Check if the request was successful
        if ($response->successful()) {
            // Get the result from Flask API
            $data = $response->json();
            return response()->json($data);  // Return the result to the client
        } else {
            return response()->json(['error' => 'Failed to detect crop disease.'], 500);
        }
    }
}

