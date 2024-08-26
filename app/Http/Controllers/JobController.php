<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    
    public function index()          // Fetch all jobs
    {
        $jobs = Job::all();       
        return response()->json($jobs); 
    }

public function store(Request $request)    // Create new job
{

    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'company' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'user_id' => 'required|exists:users,id',
    ]);
    if ($validator->fails()) {
        return response()->json([
            'error' => true,
            'messages' => $validator->errors()
        ], 422);
    }

    Job::create($request->all());

    return response()->json([
        'success' => true,
        'message' => 'Job Listing Created Successfully'
    ]);
} 

public function show($id)    // Fetch a job by ID
{
    $job = Job::with('user')->find($id);

    if (!$job) {
        return response()->json(['message' => 'Job not found'], 404);
    }

    return response()->json($job);
}


public function update(Request $request, $id)       // Update new job
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'company' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'user_id' => 'required|exists:users,id',
    ]);

    // If validation fails, return an error response
    if ($validator->fails()) {
        return response()->json([
            'error' => true,
            'messages' => $validator->errors()
        ], 422);
    }

    // Find the job listing by its ID
    $job_listings = Job::find($id);

    // Check if the job listing exists
    if (!$job_listings) {
        return response()->json([
            'error' => true,
            'message' => 'Job Listing Not Found'
        ], 404);
    }

    // Update the job listing with the validated data
    $job_listings->update($request->all());

    // Return a success response
    return response()->json([
        'success' => true,
        'message' => 'Job Listing Updated Successfully'
    ]);
}


    public function destroy($id)   // Delete a job by ID
    {
       $job_listings =  Job::destroy($id);

       if (!$job_listings) {
        return response()->json([
            'error' => true,
            'message' => 'Job Listing Not Found'
        ], 404);
    }
   else{
    return response()->json([
        'success' => true,
        'message' => 'Job Listing Deleted Successfully'
    ]);
}
    }

    public function search(Request $request)    //search jobs by title or location
{
    $query = Job::query();

    if ($request->has('title')) {
        $query->where('title', 'like', '%' . $request->query('title') . '%');
    }

    if ($request->has('location')) {
        $query->where('location', 'like', '%' . $request->query('location') . '%');
    }
    $jobs = $query->get();
    return response()->json($jobs);
}


}


