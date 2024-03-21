<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\Sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SitesettingController extends Controller
{
    public function index()
    {
        $sitesetting = Sitesetting::all();
        return view('admin.sitesetting.index', ['sitesettings' => $sitesetting, 'page_title' => 'Sitesettings']);
    }
    public function create()
    {
        return view('admin.sitesetting.create', ['page_title' => 'Create Sitesetting']);

    }
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'govn_name' => 'nullable|string',
                'ministry_name' => 'nullable|string',
                'department_name' => 'nullable|string',
                'office_name' => 'required|string',
                'office_address' => 'required|string',
                'office_contact' => 'required|string',
                'office_mail' => 'required|string',
                'main_logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'side_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'face_link' => 'nullable|url',
                'insta_link' => 'nullable|url',
                'linked_link' => 'nullable|url',
                'social_link' => 'nullable|url',
                'google_maps' => 'nullable|url',
                'f_page' => 'nullable|url',
                'slogan' => 'nullable',
                'desc' => 'nullable',
                'year' => 'nullable',
            ]);

            if ($request->hasFile('main_logo')) {
                $newMainLogo = time() . '.' . $request->main_logo->getClientOriginalName();
                $request->main_logo->move('uploads/sitesetting/', $newMainLogo);
            } else {
                $newMainLogo = "NoImage";
            }
            if ($request->hasFile('side_logo')) {
                $newSideLogo = time() . '.' . $request->side_logo->getClientOriginalName();
                $request->side_logo->move('uploads/sitesetting/', $newSideLogo);
            } else {
                $newSideLogo = "NoImage";
            }


            $sitesetting = new Sitesetting;

            $sitesetting->govn_name = $request->govn_name ?? '';
            $sitesetting->ministry_name = $request->ministry_name ?? '';
            $sitesetting->department_name = $request->department_name ?? '';
            $sitesetting->office_name = $request->office_name;
            $sitesetting->office_address = $request->office_address;
            $sitesetting->office_contact = $request->office_contact;
            $sitesetting->office_mail = $request->office_mail;
            $sitesetting->main_logo = $newMainLogo;
            $sitesetting->side_logo = $newSideLogo ?? '';
            $sitesetting->face_link = $request->face_link ?? '';
            $sitesetting->insta_link = $request->insta_link ?? '';
            $sitesetting->linked_link = $request->linked_link ?? '';
            $sitesetting->social_link = $request->social_link ?? '';
            $sitesetting->google_maps = $request->google_maps ?? '';
            $sitesetting->f_page = $request->f_page ?? '';
            $sitesetting->slogan = $request->slogan ?? '';
            $sitesetting->desc = $request->desc ?? '';
            $sitesetting->year = $request->year ?? '';
            // $sitesetting->save();

            if ($sitesetting->save()) {
                return redirect('admin/sitesetting/index')->with('success', 'Success !! Sitesetting Created');
            } else {
                return redirect()->back()->with('error', 'Error !! Sitesetting not created');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }

    public function edit($id)
    {
        $sitesetting = SiteSetting::find($id);
        return view('admin.sitesetting.update', ['sitesetting' => $sitesetting, 'page_title' => 'Update Sitesettings']);
    }
    public function update(Request $request, Sitesetting $sitesetting)
    {
        try {
            $validate = $request->validate([
                'govn_name' => 'nullable|string',
                'ministry_name' => 'nullable|string',
                'department_name' => 'nullable|string',
                'office_name' => 'required|string',
                'office_address' => 'required|string',
                'office_contact' => 'required|string',
                'office_mail' => 'required|string',
                'main_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'side_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'face_link' => 'nullable|url',
                'insta_link' => 'nullable|url',
                'linked_link' => 'nullable|url',
                'social_link' => 'nullable|url',
                'google_maps' => 'nullable|url',
                'f_page' => 'nullable|url',
                'slogan' => 'nullable',
                'desc' => 'nullable',
                'year' => 'nullable',

            ]);

            $sitesetting = Sitesetting::find($request->id);

            if ($request->hasFile('main_logo')) {
                $newMainLogo = time() . '.' . $request->main_logo->extension();
                $request->main_logo->move(public_path('uploads/sitesetting'), $newMainLogo);
                Storage::delete('public/uploads/sitesetting' . $sitesetting->main_logo);
                $sitesetting->main_logo = $newMainLogo;
            } else {
                unset($request['main_logo']);
            }


            if ($request->hasFile('side_logo')) {
                $newSideLogo = time() . '.' . $request->side_logo->extension();
                $request->side_logo->move(public_path('uploads/sitesetting'), $newSideLogo);
                Storage::delete('uploads/sitesetting' . $sitesetting->side_logo);
                $sitesetting->side_logo = $newSideLogo;
            } else {
                unset($request['side_logo']);
            }

            $sitesetting->govn_name = $request->govn_name ?? '';
            $sitesetting->ministry_name = $request->ministry_name ?? '';
            $sitesetting->department_name = $request->department_name ?? '';
            $sitesetting->office_name = $request->office_name;
            $sitesetting->office_address = $request->office_address;
            $sitesetting->office_contact = $request->office_contact;
            $sitesetting->office_mail = $request->office_mail;
            $sitesetting->face_link = $request->face_link ?? '';
            $sitesetting->insta_link = $request->insta_link ?? '';
            $sitesetting->linked_link = $request->linked_link ?? '';
            $sitesetting->social_link = $request->social_link ?? '';
            $sitesetting->google_maps = $request->google_maps ?? '';
            $sitesetting->f_page = $request->f_page ?? '';

            $sitesetting->slogan = $request->slogan ?? '';
            $sitesetting->desc = $request->desc ?? '';
            $sitesetting->year = $request->year ?? '';

            if ($sitesetting->save()) {
                return redirect('admin/sitesetting/index')->with('success', 'Success !! Sitesetting Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! Sitesetting not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }
    public function destroy(Sitesetting $sitesetting)
    {
        $sitesetting = Sitesetting::find(1);
        $sitesetting->delete();

        return redirect('admin/sitesetting/index')->with(['successMessage' => 'Success !! Sitesettings Deleted']);
    }
}
