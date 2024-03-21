<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate(2);

        return view('admin.message.index', ['messages' => $messages, 'page_title' =>'Message']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.message.create', [ 'page_title' =>'Create Message']);

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
            'name' => 'nullable|string',
            'title' => 'required|string',
        
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'description' => 'required',
        
        ]);

        // $imagePath = $request->file('image')->storeAs('images/team', Carbon::now()  . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
        $newImageName = time() . '-' . $request->title . '.' .$request->image->extension();
        $request->image->move(public_path('uploads/message'), $newImageName );


        $message = new Message;

        $message->name = $request->name ?? '';
       
            $message->title = $request->title;
            $message->image = $newImageName;
       
            $message->description = $request->description ;
        $message->save();

        return redirect('admin/message/index')->with(['successMessage' => 'Success !! Message created']);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message,$id)
    {
        $message = Message::find($id);
        return view('admin.message.update', ['message' => $message, 'page_title' =>'Update Message']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $this->validate($request, [
            'name' => 'nullable|string',
            'title' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'description' => 'required',
           
        ]);
      
            $message = Message::find($request->id);
            
            if ($request->hasFile('image')) {
                $newImageName = time() . '-' . $request->title . '.' .$request->image->extension();
                $request->image->move(public_path('uploads/message'), $newImageName );
                             Storage::delete('uploads/message' . $message->image);
                $message->image = $newImageName;
            }else{
                unset($request['image']);
            }

            $message->name = $request->name ?? '';
            $message->title = $request->title;
          
            $message->description = $request->description;

            if ($message->save()) {
                return redirect('admin/message/index')->with(['successMessage' => 'Success !! Message Updated']);
            } else {
                return redirect()->back()->with(['errorMessage' => 'Error Message not updated']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);

        $message->delete();

        return redirect('admin/message/index')->with(['successMessage' => 'Success !!Message Deleted']);
    }
}
