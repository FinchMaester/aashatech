<?php

namespace App\Http\Controllers;

use App\Models\Legaldocs;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LegaldocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legaldocs = Legaldocs::all();
        return view('admin.legaldocs.index', ['legaldocs' => $legaldocs, 'page_title' => 'Legal Documents']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.legaldocs.create', ['page_title' => 'Add Legal Documents']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Controllers\ImageController  $imageController
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageController $imageController)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
        ]);

        // Store the image using the storeImage function from ImageController
        $imagePath = $imageController->storeImage($request, 'legal_documents');

        $legaldoc = new Legaldocs;

        $legaldoc->title = $request->title;
        $legaldoc->slug = SlugService::createSlug(Legaldocs::class, 'slug', $request->title);
        $legaldoc->image = $imagePath;

        $legaldoc->save();

        return redirect('admin/legaldocs/index')->with(['successMessage' => 'Success !! Legal Documents Created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legaldoc = Legaldocs::find($id);

        return view('admin.legaldocs.update', ['legaldoc' => $legaldoc, 'page_title' => 'Update Legal Documents']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Http\Controllers\ImageController  $imageController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ImageController $imageController)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
        ]);

        $legaldoc = Legaldocs::find($id);

        if (!$legaldoc) {
            return redirect()->back()->with(['errorMessage' => 'Error !! Legal Documents not found']);
        }

        if ($request->hasFile('image')) {
            // Store the image using the storeImage function from ImageController
            $imagePath = $imageController->storeImage($request, 'legal_documents');

            // Delete the previous image
            // Storage::delete('uploads/legal_documents/' . $legaldoc->image);

            // Update the image field with the new filename
            $legaldoc->image = $imagePath;
        }

        $legaldoc->title = $request->title;
        $legaldoc->slug = SlugService::createSlug(Legaldocs::class, 'slug', $request->title);

        if ($legaldoc->save()) {
            return redirect('admin/legaldocs/index')->with(['successMessage' => 'Success !! Legal Documents Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error !! Legal Documents not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $legaldoc = Legaldocs::find($id);

        if (!$legaldoc) {
            return redirect()->back()->with(['errorMessage' => 'Error !! Legal Documents not found']);
        }

        // Delete the image file
        // Storage::delete('uploads/legal_documents/' . $legaldoc->image);

        $legaldoc->delete();

        return redirect('admin/legaldocs/index')->with(['successMessage' => 'Success !! Legal Documents Deleted']);
    }
}
