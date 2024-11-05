<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $path = $file->store('images', "public");

        $res = Images::create([
            'name' => $name,
            'path' => $path,
        ]);

        return response()->json([
            'message' => 'Image uploaded successfully',
            'id' => $res->id,
            'name' => $name,
            'path' => $path,
        ]);
    }
}
