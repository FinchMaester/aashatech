<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Models\ImageConverter;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $gallery = PhotoGallery::paginate(50);
        return view('admin.photogallery.index', ['gallery' => $gallery, 'page_title' => 'Gallery']);
    }

    public function create()
    {
        return view('admin.photogallery.create', ['page_title' => 'Create Gallery']);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'img_desc' => 'required|string|max:255',
            'img' => 'required|array',
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif,avif,webp,avi|max:2048' // maximum file size of 2 MB
        ]);

        $images = $request->file('img');
        $path = 'uploads/gallery/';
        $convertedImages = ImageConverter::convertImages($images, $path);

        $gallery = new PhotoGallery;
        $gallery->title = $request->title;
        $gallery->img_desc = $request->img_desc;
        $gallery->img = $convertedImages;

        $gallery->save();

        return redirect()->route('Photogallery.index')->with(['successMessage' => 'Success!! Gallery Created']);
    }

    public function edit($id)
    {
        $gallery = PhotoGallery::find($id);
        return view('admin.photogallery.update', ['gallery' => $gallery, 'page_title' => 'Update Gallery']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'img_desc' => 'required|string|max:255',
            'img' => 'required|array',
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // maximum file size of 2 MB
        ]);

        $gallery = PhotoGallery::findOrFail($id);

        $images = $request->file('img');
        $path = 'uploads/gallery/';
        $convertedImages = ImageConverter::convertImages($images, $path);

        $gallery->title = $request->title;
        $gallery->img_desc = $request->img_desc;

        if ($convertedImages) {
            $gallery->img = $convertedImages;
        }

        $gallery->save();

        return redirect()->route('Photogallery.index')->with(['successMessage' => 'Success!! Gallery Updated']);
    }

    public function destroy($id)
    {
        $gallery = PhotoGallery::find($id);
        $gallery->delete();

        return redirect()->route('Photogallery.index')->with(['successMessage' => 'Success!! Gallery Deleted']);
    }
}
