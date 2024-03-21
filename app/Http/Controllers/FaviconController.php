<?php

namespace App\Http\Controllers;

use App\Models\Favicon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class FaviconController extends Controller
{
    public function index()
    {
        $icons = Favicon::all();
        return view('admin.favicon.index', [
            'icons' => $icons,
            'page_title' => 'Favicons'
        ]);
    }
    public function create()
    {
        return view('admin.favicon.create', [
            'page_title' => 'Favicons create',
        ]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'favicon_thirtyTwo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'favicon_sixteen' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'favicon_ico' => 'image|mimes:jpg,png,jpeg,gif,svg,ico|max:2048',
                'apple_touch_icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'file' => 'required|file|max:4000'
            ]);

            $directory = public_path('uploads/favicon/');
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            if ($request->hasFile('favicon_thirtyTwo')) {
                $favIconThirtyTwo = time() . '.' . $request->file('favicon_thirtyTwo')->getClientOriginalExtension();
                $request->file('favicon_thirtyTwo')->move($directory, $favIconThirtyTwo);
            } else {
                $favIconThirtyTwo = "NoFile";
            }

            if ($request->hasFile('favicon_sixteen')) {
                $favIconSixteen = time() . '.' . $request->file('favicon_sixteen')->getClientOriginalExtension();
                $request->file('favicon_sixteen')->move($directory, $favIconSixteen);
            } else {
                $favIconSixteen = "NoFile";
            }
            if ($request->hasFile('favicon_ico')) {
                $favIconIco = time() . '.' . $request->file('favicon_ico')->getClientOriginalExtension();
                $request->file('favicon_ico')->move($directory, $favIconIco);
            } else {
                $favIconIco = "NoFile";
            }

            if ($request->hasFile('apple_touch_icon')) {
                $AppleTouchIcon = time() . '.' . $request->file('apple_touch_icon')->getClientOriginalExtension();
                $request->file('apple_touch_icon')->move($directory, $AppleTouchIcon);
            } else {
                $AppleTouchIcon = "NoFile";
            }

            $postPath = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('uploads/favicon/file/'), $postPath);

            $favicon = new Favicon;
            $favicon->favicon_thirtyTwo = $favIconThirtyTwo;
            $favicon->favicon_sixteen = $favIconSixteen;
            $favicon->favicon_ico = $favIconIco;
            $favicon->apple_touch_icon = $AppleTouchIcon;
            $favicon->file = $postPath;
            $favicon->save();

            return redirect()->route('Favicon.index')->with(['successMessage' => 'Success !! Favicon Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Error occurred: ' . $e->getMessage()]);
        }
    }
    public function edit(Favicon $favicon, $id)
    {
        $favicon = Favicon::find($id);
        return view('admin.favicon.update', [
            'favicon' => $favicon,
            'page_title' => 'Update favicon'
        ]);
    }
    public function update(Request $request, Favicon $favicon)
    {
        try {
            $this->validate($request, [
                'favicon_thirtyTwo' => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
                'favicon_sixteen' => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
                // 'favicon_ico' => 'image|mimes:jpg,png,jpeg,gif,svg,ico|max:2048',
                'favicon_ico' => 'file|mimes:ico|max:2048',
                'apple_touch_icon' => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
                'file' => 'required|file|max:4000'

            ]);

            if ($request->hasFile('favicon_thirtyTwo')) {
                $favIconThirtyTwo = time() . '.' . $request->favicon_thirtyTwo->extension();
                $request->favicon_thirtyTwo->move(public_path('uploads/favicon/'), $favIconThirtyTwo);
            } else {
                $postPath = "NoFile";
            }

            if ($request->hasFile('favicon_sixteen')) {
                $favIconSixteen = time() . '.' . $request->favicon_sixteen->extension();
                $request->favicon_sixteen->move(public_path('uploads/favicon/'), $favIconSixteen);
            } else {
                $postPath = "NoFile";
            }
            if ($request->hasFile('favicon_ico')) {
                $favIconIco = time() . '.' . $request->favicon_ico->extension();
                $request->favicon_ico->move(public_path('uploads/favicon/'), $favIconIco);
            } else {
                $favIconIco = "NoFile";
            }

            if ($request->hasFile('apple_touch_icon')) {
                $AppleTouchIcon = time() . '.' . $request->apple_touch_icon->extension();
                // dd($AppleTouchIcon);
                $request->apple_touch_icon->move(public_path('uploads/favicon/'), $AppleTouchIcon);

            } else {
                $postPath = "NoFile";
            }





            if ($request->hasFile('file')) {
                $postPath = time() . '.' . $request->file->extension();
                $request->file->move(public_path('uploads/favicon/file/'), $postPath);
            } else {
                $postPath = "NoFile";
            }

            $favicon = Favicon::find($request->id);
            $favicon->favicon_thirtyTwo = $favIconThirtyTwo;
            $favicon->favicon_sixteen = $favIconSixteen;
            $favicon->favicon_ico = $favIconIco;
            $favicon->apple_touch_icon = $AppleTouchIcon;
            $favicon->file = $postPath;
            // dd($favicon);
            $favicon->save();
            return redirect()->route('Favicon.index')->with(['successMessage' => 'Success !! Favicon Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Error occurred: ' . $e->getMessage()]);
        }
    }
    public function destroy(Favicon $favicon, $id)
    {
        //
        //
        $icon = Favicon::find($id);
        $icon->delete();

        return redirect()->route('Favicon.index')->with(['successMessage' => 'Success !! Favicon Deleted']);
    }
}