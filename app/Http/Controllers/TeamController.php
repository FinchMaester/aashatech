<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TeamController extends Controller
{
    protected $imageController; // Declare a property to hold the ImageController instance

    public function __construct(ImageController $imageController)
    {
        $this->imageController = $imageController;
    }

    public function index()
    {
        $teams = Team::paginate(50);
        return view('admin.team.index', ['teams' => $teams, 'page_title' =>'Team']);
    }

    public function create()
    {
        return view('admin.team.create', ['page_title' =>'Create Team']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'nullable|string',
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Update max size
            'contact_number' => 'required|string',
            'email' => 'required|string',
        ]);

        // Store the image using the storeImage method from ImageController
        $imagePath = $this->imageController->storeImage($request, 'team');

        $team = new Team;
        $team->role = $request->role ?? '';
        $team->name = $request->name;
        $team->position = $request->position;
        $team->image = $imagePath;
        $team->slug = SlugService::createSlug(Team::class,'slug', $request->name);
        $team->contact_number = $request->contact_number;
        $team->email = $request->email;
        $team->save();

        return redirect('admin/team/index')->with(['successMessage' => 'Success !! Staff created']);
    }

    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.team.update', ['team' => $team, 'page_title' =>'Update Team']);
    }

    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'role' => 'nullable|string',
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Update max size
            'contact_number' => 'required|string',
            'email' => 'required|string',
        ]);

        $team = Team::find($request->id);
        
        // If a new image is uploaded, store it using the storeImage method from ImageController
        if ($request->hasFile('image')) {
            $imagePath = $this->imageController->storeImage($request, 'team');
            $team->image = $imagePath;
        }

        $team->role = $request->role ?? '';
        $team->name = $request->name;
        $team->slug = SlugService::createSlug(Team::class,'slug', $request->name);
        $team->position = $request->position;
        $team->contact_number = $request->contact_number;
        $team->email = $request->email;

        if ($team->save()) {
            return redirect('admin/team/index')->with(['successMessage' => 'Success !! Staff Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Staff not updated']);
        }
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect('admin/team/index')->with(['successMessage' => 'Success !!Team Member Deleted']);
    }
}
