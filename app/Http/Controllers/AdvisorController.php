<?php

namespace App\Http\Controllers;

use id;
use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advisors = Advisor::all();
        return view('admin.advisor.index',[
            'advisors' => $advisors,
            'page_title'=> 'Advisor'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advisor.create', [ 'page_title' =>'Create Advisor']);

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
            
            'name' => 'required|string',
            'position' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'email' => 'nullable|string',
            'company' => 'nullable|string',
            'social' => 'nullable',
        ]);

        // $imagePath = $request->file('image')->storeAs('images/advisor', Carbon::now()  . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
        $newImageName = time() . '-' . $request->name . '.' .$request->image->extension();
        $request->image->move(public_path('uploads/advisor'), $newImageName );


        $advisor = new Advisor;
            $advisor->name = $request->name;
            $advisor->position = $request->position;
            $advisor->image = $newImageName;
            $advisor->email = $request->email;
            $advisor->company = $request->company;
            $advisor->social = $request->social;
        $advisor->save();

        return redirect('admin/advisor/index')->with(['successMessage' => 'Success !! Advisor created']);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function show(Advisor $advisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advisor = Advisor::find($id);
        return view('admin.advisor.update', ['advisor' => $advisor, 'page_title' =>'Update Advisor']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advisor $advisor)
    {
        $this->validate($request, [
            
            'name' => 'required|string',
            'position' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'email' => 'nullable|string',
            'company' => 'nullable|string',
            'social' => 'nullable',
        ]);

        $advisor = Advisor::find($request->id);
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' .$request->image->extension();
            $request->image->move(public_path('uploads/advisor'), $newImageName );
                         Storage::delete('uploads/advisor' . $advisor->image);
            $advisor->image = $newImageName;
        }else{
            unset($request['image']);
        }
        
            $advisor->name = $request->name;
            $advisor->position = $request->position;
            $advisor->image = $newImageName;
            $advisor->email = $request->email;
            $advisor->company = $request->company;
            $advisor->social = $request->social;
        
        if ($advisor->save()){
            return redirect('admin/advisor/index')->with(['successMessage' => 'Success !! Advisor created']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Advisor not updated']);
        };

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $advisor = Advisor::find($id);

    if ($advisor) {
        $advisor->delete();
        return redirect('admin/advisor/index')->with(['successMessage' => 'Success !! Advisor Deleted']);
    } else {
        return redirect()->back()->with(['errorMessage' => 'Error: Advisor not found']);
    }
}
}