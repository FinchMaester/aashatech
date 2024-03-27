<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ImageHandling;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('getCategories')->latest()->paginate(50);
        return view('admin.post.index',['posts' => $posts, 'page_title' =>'Post']);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', [ 'page_title' =>'Create Post','categories' =>$categories]);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'description' => 'required|string',
                'file' => 'nullable|file|max:10000',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'categories' => 'required',
                'content' => 'required',
            ]);

            // Compress and convert to WebP format
            $compressedImagePath = ImageHandling::compressAndConvertToWebP($request, 'posts');

            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->file = $request->file ? $request->file->getClientOriginalName() : '';
            $post->slug = SlugService::createSlug(Post::class,'slug', $request->title);
            $post->image = $compressedImagePath;
            $post->content = $request->content;

            if ($post->save()) {
                $post->getCategories()->sync($request->categories);
                return redirect()->route('Post.index')->with(['successMessage' => 'Success!! Post created']);
            } else {
                return redirect()->back()->with(['errorMessage' => 'Error!! Post not created']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['errorMessage' => 'Error!! Something went wrong']);
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.update', ['post' => $post, 'page_title' =>'Update Posts','categories' =>$categories]);
    }

    public function update(Request $request, Post $post)
{
    try {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => 'nullable|file|max:10000',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'categories' => 'required',
            'content' => 'required',
        ]);

        // Retrieve the existing post
        $post = Post::findOrFail($request->id);

        // Compress and convert to WebP format if image is provided
        if ($request->hasFile('image')) {
            $compressedImagePath = ImageHandling::compressAndConvertToWebP($request, 'image', 15, 'uploads/post');
            $post->image = $compressedImagePath;
        }

        // Update other fields
        $post->title = $request->title;
        $post->description = $request->description;
        $post->file = $request->file ? $request->file->getClientOriginalName() : $post->file;
        $post->slug = SlugService::createSlug(Post::class,'slug', $request->title);
        $post->content = $request->content;

        // Save the changes
        if ($post->save()) {
            $post->getCategories()->sync($request->categories);
            return redirect()->route('Post.index')->with(['successMessage' => 'Success!! Post updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error!! Post not updated']);
        }
    } catch (\Exception $e) {
        return redirect()->back()->with(['errorMessage' => 'Error!! Something went wrong']);
    }
}


    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post->delete()) {
            $post->getCategories()->detach();
            Storage::delete('uploads/post/'.$post->image);
            return redirect()->route('Post.index')->with(['successMessage' => 'Success!! Post Deleted']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error!! Post not Deleted']);
        }
    }
}
