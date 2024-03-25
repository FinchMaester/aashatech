<?php

namespace App\Http\Controllers;

use App\Models\BackImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BackImageController extends Controller
{
    protected $imageController;

    public function __construct(ImageController $imageController)
    {
        $this->imageController = $imageController;
    }

    public function index()
    {
        $backimages = BackImage::paginate(10);
        return view('admin.backimage.index', ['backimages' => $backimages, 'page_title' => 'Background Image']);
    }

    public function create()
    {
        return view('admin.backimage.create', ['page_title' => 'Add Background Image']);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            // Store the image using the storeImage function from ImageController
            $path = $this->imageController->storeImage($request, 'background_image');

            $backimage = new BackImage;
            $backimage->title = $request->title;
            $backimage->slug = SlugService::createSlug(BackImage::class, 'slug', $request->title);
            $backimage->image = $path; // Store the filename in the database

            if ($backimage->save()) {
                return redirect('admin/backimage/index')->with('success', 'Success !! Background Image Created');
            } else {
                return redirect()->back()->with('error', 'Error !! Background Image not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }

    public function edit($id)
    {
        $backimage = BackImage::find($id);
        return view('admin.backimage.update', ['backimage' => $backimage, 'page_title' => 'Update Background Image']);
    }

    public function update(Request $request, BackImage $backimage)
    {
        try {
            $this->validate($request, [
                'title' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            if ($request->hasFile('image')) {
                // Store the image using the storeImage function from ImageController
                $path = $this->imageController->storeImage($request, 'background_image');
                $backimage->image = $path;
            }

            $backimage->title = $request->title ?? '';
            $backimage->slug = SlugService::createSlug(BackImage::class, 'slug', $request->title);

            if ($backimage->save()) {
                return redirect('admin/backimage/index')->with('success', 'Success !! Background Image Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! Background Image not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }

    public function destroy($id)
    {
        $backimage = BackImage::find($id);
        if (!$backimage) {
            return redirect()->back()->with('error', 'Error !! Background Image not found');
        }

        // Delete the image file from storage
        if (Storage::disk('public')->exists($backimage->image)) {
            Storage::disk('public')->delete($backimage->image);
        }

        $backimage->delete();

        return redirect('admin/backimage/index')->with('success', 'Success !! Background Image Deleted');
    }
}
