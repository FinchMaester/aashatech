<?php

namespace App\Http\Controllers;

use App\Models\CoverImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\ImageHandling; // Import the ImageHandling model

class CoverImageController extends Controller
{
    protected $imageController;

    public function __construct(ImageController $imageController)
    {
        $this->imageController = $imageController;
    }

    public function index()
{
    $coverimages = CoverImage::all(); // Fetch cover images data from the database
    return view('admin.coverimage.index', ['coverimages' => $coverimages, 'page_title' => 'Cover Images']);
}


    public function create()
    {
        return view('admin.coverimage.create', ['page_title' => 'Add Cover Image']);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536', // Adjusted max size to 1.5MB
            ]);

            // Store the compressed image path
            $compressedImagePath = $this->imageController->storeImage($request, 'cover_image');

            $cover_image = new CoverImage;
            $cover_image->title = $request->title;
            $cover_image->slug = SlugService::createSlug(CoverImage::class, 'slug', $request->title);
            $cover_image->image = $compressedImagePath;

            if ($cover_image->save()) {
                return redirect('admin/coverimage/index')->with('success', 'Success !! Coverimage Created');
            } else {
                return redirect()->back()->with('error', 'Error !! Coverimage not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }
    

    public function edit($id)
    {
        $coverimage = CoverImage::find($id);
        return view('admin.coverimage.update', ['coverimage' => $coverimage, 'page_title' => 'Update Cover Image']);
    }

    public function update(Request $request, CoverImage $coverImage)
    {
        try {
            $this->validate($request, [
                'title' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536', // Adjusted max size to 1.5MB
            ]);

            $coverimage = CoverImage::find($request->id);

            if ($request->hasFile('image')) {
                // Store the compressed image path
                $compressedImagePath = $this->imageController->storeImage($request, 'cover_image');

                $coverimage->image = $compressedImagePath;
            }

            $coverimage->title = $request->title ?? '';
            $coverimage->slug = SlugService::createSlug(CoverImage::class, 'slug', $request->title);

            if ($coverimage->save()) {
                return redirect('admin/coverimage/index')->with('success', 'Success !! Coverimage Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! Coverimage not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }

    public function destroy($id)
    {
        $coverimage = CoverImage::find($id);
        // Optionally, delete the corresponding image file here
        // Storage::delete('uploads/cover_image/' . $coverimage->image);
        $coverimage->delete();

        return redirect('admin/coverimage/index')->with(['successMessage' => 'Success !! Cover Image Deleted']);
    }
}
