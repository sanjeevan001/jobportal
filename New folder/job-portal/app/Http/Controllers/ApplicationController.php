<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function create($jobId)
    {
        $job = Job::find($jobId);
        return view('applications.create', compact('job'));
    }

    public function store(Request $request, $jobId)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'resume' => 'required|mimes:pdf,doc,docx|max:1999',
            'cover_letter' => 'required'
        ]);

        if ($request->hasFile('resume')) {
            $fileNameWithExt = $request->file('resume')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('resume')->storeAs('public/resumes', $fileNameToStore);
        }

        $application = new Application;
        $application->name = $request->input('name');
        $application->email = $request->input('email');
        $application->phone = $request->input('phone');
        $application->resume = $fileNameToStore;
        $application->cover_letter = $request->input('cover_letter');
        $application->job_id = $jobId;
        $application->user_id = Auth::id();
        $application->save();

        return redirect('/jobs/'.$jobId)->with('success', 'Application Submitted');
    }
}
