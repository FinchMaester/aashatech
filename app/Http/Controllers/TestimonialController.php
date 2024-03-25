<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\ImageHandling;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TestimonialController extends Controller
{
    protected $imageHandling;

    public function __construct(ImageHandling $imageHandling)
    {
        $this->imageHandling = $imageHandling;
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
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            // Store the compressed image and get the path
            $compressedImagePath = $this->imageHandling->compressAndConvertToWebP($request, 'testimonial');

            $testimonial = new Testimonial;
            $testimonial->title = $request->title;
            $testimonial->slug = SlugService::createSlug(Testimonial::class, 'slug', $request->title);
            $testimonial->image = $compressedImagePath;

            if ($testimonial->save()) {
                return redirect('admin/testimonials/index')->with('success', 'Success !! Testimonial Created');
            } else {
                return redirect()->back()->with('error', 'Error !! Testimonial not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
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
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            if ($request->hasFile('image')) {
                // Store the compressed image and get the path
                $compressedImagePath = $this->imageHandling->compressAndConvertToWebP($request, 'testimonial');
                $testimonial->image = $compressedImagePath;
            }

            $testimonial->title = $request->title;
            $testimonial->slug = SlugService::createSlug(Testimonial::class, 'slug', $request->title);

            if ($testimonial->save()) {
                return redirect('admin/testimonials/index')->with('success', 'Success !! Testimonial Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! Testimonial not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
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
