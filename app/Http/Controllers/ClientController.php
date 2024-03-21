<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ClientController extends Controller
{
    protected $imageController;

    public function __construct(ImageController $imageController)
    {
        $this->imageController = $imageController;
    }

    public function index()
    {
        
        $clients = Client::latest()->get();
        return view('admin.client.index', ['clients' => $clients, 'page_title' => 'Clients']);
    }

    public function create()
    {
        return view('admin.client.create', ['page_title' => 'Add Clients']);
    }

    public function store(Request $request, ImageController $imageController)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            // Store the image using the storeImage function from ImageController
            $path = $imageController->storeImage($request, 'client');

            $client = new Client;
            $client->title = $request->title;
            $client->slug = SlugService::createSlug(Client::class, 'slug', $request->title);
            $client->image = $path; // Store the filename in the database
            $client->save();

            return redirect('admin/client/index')->with('success', 'Success !! Client Created');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.client.update', ['client' => $client, 'page_title' => 'Update Client']);
    }

    public function update(Request $request, Client $client, ImageController $imageController)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            ]);

            $client = Client::find($request->id);

            if (!$client) {
                return redirect()->back()->with('error', 'Error !! Client not found');
            }

            if ($request->hasFile('image')) {
                // Store the image using the storeImage function from ImageController
                $path = $imageController->storeImage($request, 'client');

                // Update image field with the new filename
                $client->image = $path;
            }

            $client->title = $request->title;
            $client->slug = SlugService::createSlug(Client::class, 'slug', $request->title);

            if ($client->save()) {
                return redirect('admin/client/index')->with('success', 'Success !! Client Updated');
            } else {
                return redirect()->back()->with('error', 'Error !! Client not updated');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error !! Something went wrong');
        }
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return redirect()->back()->with('error', 'Error !! Client not found');
        }

        $client->delete();

        return redirect('admin/client/index')->with('success', 'Success !! Client Deleted');
    }
}
