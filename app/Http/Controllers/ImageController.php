<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function compressAndConvertToWebP(Request $request)
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

        // Store the compressed image
        Storage::disk('public')->put($filename, $compressedImage->stream());

        // Return the path to the compressed image
        return response()->json(['path' => $filename]);
    }

    public function storeImage(Request $request, $source)
{
    // Determine the folder based on the source
    switch ($source) {
        case 'cover_image':
            $folder = 'uploads/cover_image';
            break;
        case 'background_image':
            $folder = 'uploads/background_image';
            break;
        case 'post':
            $folder = 'uploads/post_images';
            break;
        case 'service':
            $folder = 'uploads/service';
            break;
        case 'team':
            $folder = 'uploads/team';
            break;
        case 'legal_documents':
            $folder = 'uploads/legal_documents';
            break;
        case 'client':
            $folder = 'uploads/client';
            break;
        case 'gallery_image':
            $folder = 'uploads/gallery_image';
            break;
        case 'testimonials':
            $folder = 'uploads/testimonials';
            break;
        default:
            $folder = 'uploads'; // Default folder if source is not recognized
            break;
    }

    // Validate the uploaded file
    $request->validate([
        'image' => 'required|image|max:2048', // Assuming max file size is 2MB
    ]);

    // Get the uploaded image
    $image = $request->file('image');

    // Resize and compress the image
    $compressedImage = Image::make($image)->encode('webp', 15);

    // Generate a unique filename
    $filename = uniqid() . '.' . 'webp';

    // Determine the full path to the directory
    $fullPath = public_path($folder);

    // Create the directory if it doesn't exist
    if (!file_exists($fullPath)) {
        mkdir($fullPath, 0777, true);
    }

    // Store the compressed image in the respective folder
    $compressedImage->save($fullPath . '/' . $filename);

    // Return the path to the compressed image
    return response()->json(['path' => $folder . '/' . $filename]);
}
}

