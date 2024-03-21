<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramPost;

class InstagramPostController extends Controller
{
    public function index()
    {
        $posts = InstagramPost::latest()->get();

        return view('admin.instagram.index', [
            'posts' => $posts,
            'page_title' => 'Instagram'
        ]);
    }

    public function create()
    {
        return view('admin.instagram.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'link' => 'required|url',
            ]);

            InstagramPost::create([
                'title' => $request->title,
                'link' => $request->link,
            ]);

            return redirect()->route('Instagram.index')->with('success', 'Instagram post added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('Instagram.index')->with('error', 'Error adding Instagram post: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $posts = InstagramPost::find($id);

        if (!$posts) {
            return redirect()->route('Instagram.index')->with('error', 'Department not found.');
        }
        return view('admin.instagram.update', ['posts' => $posts]);
    }
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'link' => 'required|url',
            ]);

            $instagramPost = InstagramPost::find($id);

            if (!$instagramPost) {
                return redirect()->route('Instagram.index')->with('error', 'Instagram post not found.');
            }

            $instagramPost->update([
                'title' => $request->title,
                'link' => $request->link,
            ]);

            return redirect()->route('Instagram.index')->with('success', 'Instagram post updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('Instagram.index')->with('error', 'Error updating Instagram post: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $instagramPost = InstagramPost::find($id);

            if (!$instagramPost) {
                return redirect()->route('Instagram.index')->with('error', 'Instagram post not found.');
            }

            $instagramPost->delete();

            return redirect()->route('Instagram.index')->with('success', 'Instagram post deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('Instagram.index')->with('error', 'Error deleting Instagram post: ' . $e->getMessage());
        }
    }


}
