<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\ImageHandling;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TestimonialController extends Controller
{
    protected $imageController;

    public function __construct(ImageController $imageController)
    {
        $this->imageController = $imageController;
    }

    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonials.index', ['testimonials' => $testimonials, 'page_title' => 'Testimonials']);
    }

    public function create()
    {
        return view('admin.testimonials.create', ['page_title' => 'Add Testimonial']);
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'title' => 'required|string',
                'image' => 'required|image|max:2048', // Assuming max file size is 2MB
            ]);

            // Store the image using the storeImage method from ImageController
            $path = $this->imageController->storeImage($request, 'testimonials');

            $testimonial = new Testimonial;
            $testimonial->title = $request->title;
            $testimonial->slug = SlugService::createSlug(Testimonial::class, 'slug', $request->title);
            $testimonial->image = $path; // Store the filename in the database

            // Check if content is provided
            if ($request->has('content')) {
                $testimonial->content = $request->content;
            }

            if ($testimonial->save()) {
                return redirect('admin/testimonials/index')->with('success', 'Success !! Testimonial Created');
            } else {
                return redirect()->back()->with('error', 'Error !! Testimonial not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.update', ['testimonial' => $testimonial, 'page_title' => 'Update Testimonial']);
    }

    public function update(Request $request, Testimonial $testimonial)
{
    try {
        // Validate the request
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|max:2048', // Assuming max file size is 2MB
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Store the new image using the storeImage method from ImageController
            $path = $this->imageController->storeImage($request, 'testimonials');
            // Update the image field with the new filename
            $testimonial->image = $path;

            // Delete the previous image if it exists
            if ($testimonial->getOriginal('image')) {
                Storage::disk('public')->delete($testimonial->getOriginal('image'));
            }
        }

        // Update other fields
        $testimonial->title = $request->title;
        $testimonial->slug = SlugService::createSlug(Testimonial::class, 'slug', $request->title);

        // Check if content is provided
        if ($request->has('content')) {
            $testimonial->content = $request->content;
        } else {
            $testimonial->content = null; // Reset content if not provided
        }

        if ($testimonial->save()) {
            return redirect('admin/testimonials/index')->with('success', 'Success !! Testimonial Updated');
        } else {
            return redirect()->back()->with('error', 'Error !! Testimonial not updated');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error !! Something went wrong: ' . $e->getMessage());
    }
}



    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->delete();
            return redirect('admin/testimonials/index')->with(['successMessage' => 'Success !! Testimonial Deleted']);
        }
        return redirect()->back()->with('error', 'Error !! Testimonial not found');
    }
}
