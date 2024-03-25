<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ImageHandling;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index',['services' => $services, 'page_title' =>'Services']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create', [ 'page_title' =>'Add Services']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'icon' => 'required|image|mimes:png,gif,svg|max:300',
            'content' => 'required|string',
        ]);

        try {
            // Compress and convert to WebP format
            $compressedImage = ImageHandling::compressAndConvertToWebP($request,'service');
            $compressedIcon = ImageHandling::compressAndConvertToWebP($request, 'service');

            $service = new Service;
            $service->title = $request->title;
            $service->slug = SlugService::createSlug(Service::class, 'slug', $request->title);
            $service->description = $request->description;
            $service->image = $compressedImage;
            $service->icon = $compressedIcon;
            $service->content = $request->content;

            if ($service->save()) {
                return redirect('admin/services/index')->with('successMessage', 'Success!! Service created');
            } else {
                return redirect()->back()->with('errorMessage', 'Error!! Service not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Error!! Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('admin.services.update', ['service' => $service, 'page_title' =>'Update Services']);
    
    }
    public function update(Request $request, Service $service)
{
    $validate = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
        'icon' => 'required|image|mimes:png,gif,svg|max:300',
        'content' => 'required',
    ]);

    // Find the service
    $service = Service::find($request->id);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = time() . '-' . Str::slug($request->title) . '.webp'; // Save as WebP
        $compressedImage = Image::make($request->file('image'))->encode('webp', 75); // Convert to WebP
        $compressedImage->save(public_path('uploads/service/' . $imagePath)); // Save the image
        Storage::delete('uploads/service/' . $service->image); // Delete the old image
        $service->image = $imagePath; // Update the image path
    }

    // Handle icon upload
    if ($request->hasFile('icon')) {
        $iconPath = time() . '-' . Str::slug($request->title) . '.' . $request->icon->extension();
        $request->icon->move(public_path('uploads/service'), $iconPath);
        Storage::delete('uploads/service/' . $service->icon);
        $service->icon = $iconPath;
    }

    // Update other fields
    $service->title = $request->title;
    $service->description = $request->description;
    $service->content = $request->content;

    // Save the changes to the database
    if ($service->save()) {
        return redirect('admin/services/index')->with('successMessage', 'Success!! Service updated');
    } else {
        return redirect()->back()->with('errorMessage', 'Error!! Service not updated');
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if ($service->delete()) {
         
            Storage::delete('uploads/service/'.$service->image);
            return redirect('admin.service.index')->with(['successMessage' => 'Success !! Service Deleted']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Service not Deleted']);
        }
    }
}
