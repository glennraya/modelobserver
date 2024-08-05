<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = Storage::put('uploads', $request->file('file'));

            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
