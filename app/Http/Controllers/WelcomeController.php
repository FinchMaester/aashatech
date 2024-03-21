<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $welcomes = Welcome::paginate(10);
        return view('admin.welcome.index',['welcomes' => $welcomes, 'page_title' =>'Welcome Page']);
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.welcome.create', [ 'page_title' =>'Create welcome']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'content' => 'required|string',
            
        ]);
    
        // $imagePath = $request->file('image')->storeAs('images/welcome', Carbon::now()  . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
        $newImageName = time() . '-' . $request->title . '.' .$request->image->extension();
        $request->image->move(public_path('uploads/welcome/'), $newImageName );
     
        
        $welcome = new Welcome;
    
        $welcome->title = $request->title;
            $welcome->subtitle = $request->subtitle;
            $welcome->slug = SlugService::createSlug(Welcome::class,'slug',$request->title);
            $welcome->description = $request->description;
            $welcome->image = $newImageName;
            $welcome->content = $request->content;
          
        $welcome->save();
    
        return redirect('admin/welcome/index')->with(['successMessage' => 'Success !! welcome page created']);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(Welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $welcome = Welcome::find($id);
    return view('admin.welcome.update', ['welcome' => $welcome, 'page_title' =>'Update welcome page']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Welcome $welcome)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'content' => 'required|string',
            
        ]);

        $welcome = welcome::find($request->id);
            
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' .$request->image->extension();
            $request->image->move(public_path('uploads/welcome'), $newImageName );
                         Storage::delete('uploads/welcome' . $welcome->image);
            $welcome->image = $newImageName;
        }else{
            unset($request['image']);
        }

        $welcome->title = $request->title;
        $welcome->subtitle = $request->subtitle;
        $welcome->description = $request->description;
        $welcome->content = $request->content;


        if ($welcome->save()) {
            return redirect('admin/welcome/index')->with(['successMessage' => 'Success !! welcome Us Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error welcome not updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $welcome = welcome::find($id);

        $welcome->delete();
    
        return redirect('admin/welcome/index')->with(['successMessage' => 'Success !!welcome Member Deleted']);
    }
}
