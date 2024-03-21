<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Contracts\Queue\Job;

class JobApplicationController extends Controller
{


    // public function create()
    // {
    //     $careers = Career::all();
    //     return view('apply_form', compact('careers'));
    // }
    public function create($careerId)
    {
        $career = Career::find($careerId);

        if (!$career) {
            abort(404);
        }

        return view('apply_form', compact('career'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'permanent_address' => 'required|string',
            'temporary_address' => 'required|string',
            'contact_number' => 'required|numeric',
            'expertise' => 'required|array',
            'expertise.*.name' => 'required|string|max:255',
            'expertise.*.experience' => 'required|numeric',
            'preferred' => 'required|string',
            'cover_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'career_id' => 'required|exists:careers,id',
        ]);
        try {
            $resumeFile = $request->file('resume');
            $filename = uniqid() . '.' . $resumeFile->getClientOriginalExtension();
            $resumeFile->storeAs('uploads', $filename, 'public');

            JobApplication::create([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'permanent_address' => $request->input('permanent_address'),
                'temporary_address' => $request->input('temporary_address'),
                'contact_number' => $request->input('contact_number'),
                'expertise' => json_encode($request->input('expertise')),
                'preferred' => $request->input('preferred'),
                'cover_letter' => $request->input('cover_letter'),
                'resume' => 'uploads/' . $filename,
                'career_id' => $request->input('career_id'),
            ]);

            $request->session()->flash('success', 'Job application submitted successfully for job.');
            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('error', 'An error occurred while submitting the job application.');
            return redirect()->back();
        }
    }
}