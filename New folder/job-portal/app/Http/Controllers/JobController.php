<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'location' => 'required',
            'deadline' => 'required|date',
            'logo' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('logo')) {
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $job = new Job;
        $job->title = $request->input('title');
        $job->company = $request->input('company');
        $job->description = $request->input('description');
        $job->qualifications = $request->input('qualifications');
        $job->location = $request->input('location');
        $job->deadline = $request->input('deadline');
        $job->logo = $fileNameToStore;
        $job->user_id = Auth::id();
        $job->save();

        return redirect('/jobs')->with('success', 'Job Posted');
    }

    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'location' => 'required',
            'deadline' => 'required|date',
            'logo' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('logo')) {
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
        }

        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->company = $request->input('company');
        $job->description = $request->input('description');
        $job->qualifications = $request->input('qualifications');
        $job->location = $request->input('location');
        $job->deadline = $request->input('deadline');
        if ($request->hasFile('logo')) {
            $job->logo = $fileNameToStore;
        }
        $job->save();

        return redirect('/jobs')->with('success', 'Job Updated');
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        if($job->logo != 'noimage.jpg'){
            Storage::delete('public/logos/'.$job->logo);
        }
        $job->delete();
        return redirect('/jobs')->with('success', 'Job Removed');
    }
}
