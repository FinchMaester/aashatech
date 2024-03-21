<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index',[
           'videos' => $videos,
           'page_title' => 'Video Gallery'
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create',['page_title'=>'Add Videos']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'url' => 'required',
        ]);

        $video = new Video();

        $video->title= $request->title;
        $video->url = $request->url;

        $video->save();

        return redirect('admin/videos/index')->with(['successMessage' => 'Success !! Video link Created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);

        return view('admin.videos.update', ['video' => $video, 'page_title' =>'Update Video Link']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'url' => 'required',
        ]);

        $video= Video::find($request->id);

        $video->title = $request->title ?? '';
        $video->url = $request->url ?? '';

        
        if ($video->save()) {
            return redirect('admin/videos/index')->with(['successMessage' => 'Success !! Video Link updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Video link not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        return redirect('admin/videos/index')->with(['successMessage' => 'Success !!Video Link Deleted']);

    }
}
