<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobs = Job::with('employer')->paginate(4);
        // $jobs = Job::with('employer')->simplePaginate(4);
        $jobs = Job::with('employer')->latest()->simplePaginate(4);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:100',
            'salary' => 'required|integer|min:10000|max:999999',
        ]);

        $job = Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => 1,
        ]);

        // sneds mail sync
        // Mail::to($job->employer->user)->send(new JobPosted($job));

        // sends mail async
        Mail::to($job->employer->user)->queue(new JobPosted($job));
        
        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $job->load('employer');
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // Gate::authorize('update', $chirp);
        

        // if(Auth::guest()){
        //     return redirect()->route('login.create');
        // }

        // Gate::authorize('edit-job', $job);

        // if(Auth::user()->cannot('edit-job', $job)){
        //     dd('failed');
        // }

        // if(Gate::denies('edit-job', $job)){
        //     // do sth
        // }

        // if($job->employer->user->isNot(Auth::user())){
        //     abort(403);
        // }

        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {

        request()->validate([
            'title' => 'required|string|min:3|max:100',
            'salary' => 'required|integer|min:10000|max:999999',
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect()->route('jobs.show', ['job' => $job]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
