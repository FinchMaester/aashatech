<?php

namespace App\Http\Controllers;

use App\Models\BackImage;
use Illuminate\Http\Request;
use App\Models\ImageHandling;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BackImageController extends Controller
{
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
            
            $compressedImagePath = ImageHandling::compressAndConvertToWebP($request, 'backimage');

            $backimage = new BackImage;

            $backimage->title = $request->title;
            $backimage->slug = SlugService::createSlug(BackImage::class, 'slug', $request->title);

            $backimage->image = $compressedImagePath;

            if ($backimage->save()) {
                return redirect('admin/backimage/index')->with('success', 'Success !! backimage Created');
            } else {
                return redirect()->back()->with('error', 'Error !! backimage not created');
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


            $backimage = BackImage::find($request->id);

            if ($request->hasFile('image')) {
                $newImageName = time() . '-' . $request->image->extension();
                $request->image->move(public_path('uploads/backimage'), $newImageName);
                Storage::delete('uploads/backimage' . $backimage->image);
                $backimage->image = $newImageName;
            } else {
                unset($request['image']);
            }


            $backimage->title = $request->title ?? '';
            $backimage->slug = SlugService::createSlug(BackImage::class, 'slug', $request->title);

            if ($backimage->save()) {
                return redirect('admin/backimage/index')->with('success', 'Success !! backimage Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! backimage not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }
    public function destroy($id)
    {
        $backimage = BackImage::find($id);

        $backimage->delete();

        return redirect('admin/backimage/index')->with(['successMessage' => 'Success !!Background Image Deleted']);
    }
}
