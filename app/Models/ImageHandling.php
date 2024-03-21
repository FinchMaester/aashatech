<?php

namespace App\Models;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageHandling
{
    public static function compressAndConvertToWebP(Request $request, $subfolder)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|max:2048', // Assuming max file size is 2MB
        ]);

        // Get the uploaded image
        $image = $request->file('image');

        // Resize and compress the image
        $compressedImage = Image::make($image)->encode('webp', 80);

        // Generate a unique filename
        $filename = uniqid() . '.' . 'webp';

        // Determine the storage path based on the subfolder
        $storagePath = 'uploads/' . $subfolder . '/';

        // Store the compressed image
        Storage::disk('public')->put($storagePath . $filename, $compressedImage->stream());

        // Return the path to the compressed image
        return $storagePath . $filename;
    }
}
