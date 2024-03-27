<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::paginate(10);
        return view('admin.about.index', ['abouts' => $abouts, 'page_title' => 'About Us']);


    }
    public function create()
    {
        return view('admin.about.create', ['page_title' => 'Create About Us']);

    }
    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'title' => 'required|string',
                'subtitle' => 'nullable|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'content' => 'required|string|max:200'

            ]);

            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/about'), $newImageName);





            $about = new About;

            $about->title = $request->title;
            $about->subtitle = $request->subtitle ?? '';
            $about->description = $request->description;
            $about->slug = SlugService::createSlug(About::class, 'slug', $request->title);

            $about->image = $newImageName;
            $about->content = $request->content;

            if ($about->save()) {
                return redirect('admin/about/index')->with('success', 'Success !! about Created');
            } else {
                return redirect()->back()->with('error', 'Error !! about not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.update', ['about' => $about, 'page_title' => 'Update About Us']);

    }
    public function update(Request $request, About $about)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'subtitle' => 'nullable|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'content' => 'required|string',

            ]);

            $about = About::find($request->id);

            if ($request->hasFile('image')) {
                $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/about'), $newImageName);
                Storage::delete('uploads/about' . $about->image);
                $about->image = $newImageName;
            } else {
                unset($request['image']);
            }

            $about->title = $request->title;
            $about->subtitle = $request->subtitle ?? '';
            $about->slug = SlugService::createSlug(About::class, 'slug', $request->title);

            $about->description = $request->description;
            $about->content = $request->content;


            if ($about->save()) {
                return redirect('admin/about/index')->with('success', 'Success !! about Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! about not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }
    public function destroy($id)
    {
        $about = About::find($id);

        $about->delete();

        return redirect('admin/about/index')->with(['successMessage' => 'Success !!about Member Deleted']);
    }
}
