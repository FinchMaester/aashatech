<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class CareersController extends Controller
{
    public function index()
    {
        $data = Career::all();
        $jobapp = JobApplication::with('career')->latest()->paginate(50);
        return view('admin.careers.index', ['data' => $data, 'jobapp' => $jobapp]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'deadline' => 'required|date',
            ]);

            $career = Career::create($validatedData);

            Session::flash('success', 'Career added successfully!');
            return redirect('/admin/careers');
        } catch (QueryException $e) {
            // Handle database query exception
            Session::flash('error', 'An error occurred while adding the career.');
            return redirect('/admin/careers/create');
        } catch (\Exception $e) {
            // Handle other exceptions
            Session::flash('error', 'An error occurred.');
            return redirect('/admin/careers/create');
        }
    }

    public function create()
    {
        return view('admin.careers.create');
    }
    public function edit($id)
    {
        $data = Career::find($id);

        if (!$data) {
            return redirect()->route('Instagram.index')->with('error', 'Department not found.');
        }
        return view('admin.careers.update', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'deadline' => 'required|date',
            ]);

            $career = Career::find($id);

            if (!$career) {
                return redirect()->route('careers.index')->with('error', 'Career not found.');
            }

            $career->update($validatedData);

            Session::flash('success', 'Career updated successfully!');
            return redirect()->route('careers.index');
        } catch (QueryException $e) {
            Session::flash('error', 'An error occurred while updating the career.');
            return redirect()->route('careers.edit', $id);
        } catch (\Exception $e) {
            Session::flash('error', 'An error occurred.');
            return redirect()->route('careers.edit', $id);
        }
    }
    public function destroy($id)
    {
        try {
            $career = Career::find($id);

            if (!$career) {
                return redirect()->route('careers.index')->with('error', 'Career not found.');
            }

            $career->delete();

            Session::flash('success', 'Career deleted successfully!');
            return redirect()->route('careers.index');
        } catch (\Exception $e) {
            Session::flash('error', 'An error occurred while deleting the career.');
            return redirect()->route('careers.index');
        }
    }
}
