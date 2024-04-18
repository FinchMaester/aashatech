<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    protected $imageController; // Declare a property to hold the ImageController instance

    public function __construct(ImageController $imageController)
    {
        $this->imageController = $imageController;
    }

    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', ['services' => $services, 'page_title' => 'Services']);
    }

    public function create()
    {
        return view('admin.services.create', ['page_title' => 'Add Services']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'icon' => 'required|image|mimes:png,gif,svg|max:1536',
            'content' => 'required|string',
        ]);

        // Store the image and icon using the storeImage method from ImageController
        $imagePath = $this->imageController->storeImage($request, 'service');
        $iconPath = $this->imageController->storeImage($request, 'service', 'icon');

        $service = new Service;
        $service->title = $request->title;
        $service->slug = SlugService::createSlug(Service::class, 'slug', $request->title);
        $service->description = $request->description;
        $service->image = $imagePath;
        $service->icon = $iconPath;
        $service->content = $request->content;

        if ($service->save()) {
            return redirect('admin/services/index')->with('successMessage', 'Success!! Service created');
        } else {
            return redirect()->back()->with('errorMessage', 'Error!! Service not created');
        }
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.update', ['service' => $service, 'page_title' => 'Update Services']);
    }

    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'icon' => 'nullable|image|mimes:png,gif,svg|max:300',
            'content' => 'required|string',
        ]);

        $service = Service::find($request->id);

        // If a new image is uploaded, store it using the storeImage method from ImageController
        if ($request->hasFile('image')) {
            $imagePath = $this->imageController->storeImage($request, 'service');
            $service->image = $imagePath;
        }

        // If a new icon is uploaded, store it using the storeImage method from ImageController
        if ($request->hasFile('icon')) {
            $iconPath = $this->imageController->storeImage($request, 'service', 'icon');
            $service->icon = $iconPath;
        }

        $service->title = $request->title;
        $service->slug = SlugService::createSlug(Service::class, 'slug', $request->title);
        $service->description = $request->description;
        $service->content = $request->content;

        if ($service->save()) {
            return redirect('admin/services')->with('successMessage', 'Success!! Service updated');
        } else {
            return redirect()->back()->with('errorMessage', 'Error!! Service not updated');
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        if ($service->delete()) {
            Storage::delete('uploads/service/' . $service->image);
            Storage::delete('uploads/service/' . $service->icon);
            return redirect('admin/services')->with(['successMessage' => 'Success !! Service Deleted']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error!! Service not Deleted']);
        }
    }
}
